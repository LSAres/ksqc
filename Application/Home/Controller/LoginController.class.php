<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //用户登陆
	public function login(){
		$this->display();
	}

	//用户注册
	public function regist(){
		$this->display();
	}


	//登陆验证
	public function testid(){

		!IS_POST ? false : die;
	    	
    	$mobile = I('post.telephone');
	    $psw = I('post.password','');

	   	$code = I('verify');
		$udb = M('user');

		$db_userlog = M('user_log');
		$usinfo = $udb->where("mobile='{$mobile}' or account='{$mobile}'")->find();
		
        if ($usinfo['lockuser']) {
        	msg('你账号已锁定，请联系管理员');
        }

		$us_old = md5(md5($psw).$usinfo['salt']);
		if (empty($usinfo)) msg("账号错误", U('Login/login'));
		if ($us_old != $usinfo['password']) msg("密码错误", U('Login/login'));

		session('userId', $usinfo['id'], 3600*3);
		session('mobile', $mobile, 3600*3);
               	
        //记录登录时间
        M('user')->where('id='.$usinfo['id'].'')->save(array('last_login' => time(), 'login_ip' => get_client_ip()));

		$logInfo = array(
			'uid'      => $usinfo['id'],
			'type'     => trim('Login'),
			'time'     => time(),
			'log_ip'   => get_client_ip(),
		 );

		$db_userlog->data($logInfo)->add();
		redirect( U('/Index/Index'));
		
	}

	public function zhuce()
	{
		if (empty( I('post.'))) die();

	    $udb = M('user');
	   	$store = M('store');
		$layer = M('layer');
	    $arr = I('post.'); 
        //========判断查出来的父级id是否为空============
        $parent_id = trim($arr['parent_id']); 
        $data = $udb->where("account='".$parent_id."'")->find(); 

        if(empty($data)) msg('推荐人不存在');
            //========判断新的账号名是否已经存在============
        $account = trim($arr['account']); 
        $data2 = $udb->where("account='".$account."'")->find(); 
        if(!empty($data2)) msg('账号名已经存在，请重新输入');

        // 姓名是否填写
        $username=trim($arr['username']);
        if(!empty($username)) msg('忘记填写姓名啦');
            

           //判断手机号是否有重复
        $post_mobile = trim($arr['mobile']);
        $mobileInfo = $udb->where('mobile="'.$post_mobile.'"')->find();
        if(!empty($mobileInfo)) msg('该手机号已注册请换个号码');

/*	$sms_code = I('post.sms_code');
      $trade_code= session('trade_code');
      if ($sms_code != $trade_code||$sms_code==null) {
        echo "<script>alert('短信验证码错误');history.back(-1);</script>;";
        exit();
      }*/
        //========判断两次输入的一级密码是否一致============
        if(trim($arr['password']) !== trim($arr['passwordr'])) msg('两次一级密码不一样');
             
        //========判断两次输入的二级密码是否一致============
        if(trim($arr['two_password']) !== trim($arr['two_passwordr'])) msg('两次二级密码不一样');

        //=============登录密码加密==============
        $salt = substr(md5(time()),0,3);
        $password = md5(md5(trim($arr['passwordr'])).$salt);
        

        //=============安全密码加密==============
        $two_salt = substr(md5(time()),0,3);
        $two_password = md5(md5(trim($arr['two_passwordr'])).$two_salt);

        //添加用户
       $userInfo = array(
            'account'        => trim($arr['account']),
            'parent_id'      => $data['id'],
            'username'       => trim($arr['username']),
            'sex'            => trim($arr['sex']),
            'mobile'         => trim($arr['mobile']),
            'alipay'         => trim($arr['alipay']), 
            'password'       => $password,
            'salt'           => $salt,
            'safety_pw'      => $two_password,
            'safety_salt'    => $two_salt,
			'lockuser'		 => 0,
            'add_time'		 => time(),
            'ip'			 => get_client_ip(),
			'last_login'	 => 0
        );
        $uid = $udb->data($userInfo)->add();

        //创建仓库		从水库拨10元转10000挖矿分做启动资金 此处缺少水库记录
        $user_store = [
        	'uid' => $uid,
        	'miner_gold' => 10000,
        	'diamonds' => 300,
        	'money' => ,
        	'brand' => ,
        	'case' => 0,
        	'prize_ticket' => 0
        ];
        $store->add($user_store);

        //插入矿层
        for ($i = 1; $i < 13; $i + +) { 
        	//第一层免费开放
        	if ($i === 1) {
        		$layer_data = [
	        		'uid' => $uid,
	        		'layer_id' => $i,
	        		'tool_id' => 0,
	        		'tool_count' => 0,
	        		'tool_use_time' => 0,
	        		'is_open' => 1,
	        		'open_time' => time(),
	        	];
        	} else {
	        	$layer_data = [
	        		'uid' => $uid,
	        		'layer_id' => $i,
	        		'tool_id' => 0,
	        		'tool_count' => 0,
	        		'tool_use_time' => 0,
	        		'is_open' => 0,
	        		'open_time' => 0,
	        	];
        	}
        	$layer->add($layer_data);
        }

        //=========检查刚才添加的是否有值============
        $check_zhuce=$udb->where("account='".$userInfo['account']."'")->find();
        $userid=$check_zhuce['userid'];
       
        if(!empty($data2)) msg('注册成功', U('Regus/login'));
	}

	//用户退出 
	public function logout(){
        $userid = session('userId');
        if (empty($userid)) {
            redirect(U('Index/login'));
		}

		session('userId',null);
		session('mobile',null);

		//if ($browser == 'pc') {
		redirect(U('Index/login'));
		// } else {
		// 	redirect(U('Mobile/Index/login'));
		// }
	}

    //验证码
	public function verify(){
		ob_clean();
		$config       =    array(
		'codeSet'     =>  '0123456789',   
		'fontSize'    =>    30,    // 验证码字体大小   
		'length'      =>    4,     // 验证码位数    
		//'fontttf'     =>   '4.ttf',
		'useCurve'    => false,
		'useNoise'	  => false
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}

}