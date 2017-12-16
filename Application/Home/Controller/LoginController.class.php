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
	    session('userId',360);
	    session('mobile',360);
	    $data['success']=1;
	    $this->ajaxReturn($data);
    	$mobile=I('post.mobile');
	    $psw=I('post.pwd','');

	   	$code=I('verify');
		$udb=M('user');
		$db_userlog = M('user_log');
		$usinfo=$udb->where("mobile='{$mobile}' or account='{$mobile}'")->find();
		
        if ($usinfo['lockuser']) {
            $data['msg'] = "您的账号已锁定，请联系管理员";
            $data['success']=0;
            $this->ajaxReturn($data);
        	//msg('你账号已锁定，请联系管理员');
        }

		$us_old=md5(md5($psw).$usinfo['salt']);
		if (empty($usinfo)){
            //msg("账号错误", U('Login/login'));
            $data['msg']="账号错误";
            $data['success']=0;
            $this->ajaxReturn($data);
        }
		if ($us_old != $usinfo['password']){
            //msg("密码错误", U('Login/login'));
            $data['msg']="密码错误";
            $data['success']=0;
            $this->ajaxReturn($data);
        }

		session('userId', $usinfo['userid'], 3600*3);
		session('mobile', $mobile, 3600*3);
               	
        //记录登录时间
		M('user')->where('userid='.$usinfo['userid'].'')->setField('last_login',time());
		M('user')->where('userid='.$usinfo['userid'].'')->setField('login_ip',get_client_ip());
		$uInfo = M('store')->where('uid='.$usinfo['userid'].'')->find();

		$logInfo = array(
			'uid'      => $usinfo['userid'],
			'type'     => trim('Login'),
			'time'     => time(),
			'log_ip'   => get_client_ip(),
		 );

		M('user_log')->data($logInfo)->add();
		$data['msg']="登陆成功";
		$data['success']=1;
		$this->ajaxReturn($data);
		//redirect( U('/Index/Index'));
		
	}

	public function zhuce()
	{
		if (empty( I('post.'))) die();

	    $udb=M('user');
	    $db_farm=M('nzusfarm');
	    $arr=I('post.'); 
        //========判断查出来的父级id是否为空============
        $recommend_ren=trim($arr['recommend_ren']); 
        $data=$udb->where("account='".$recommend_ren."'")->find(); 

        if(empty($data)) msg('推荐人不存在');
            //========判断新的账号名是否已经存在============
        $account=trim($arr['account']); 
        $data2=$udb->where("account='".$account."'")->find(); 
        if(!empty($data2)) msg('账号名已经存在，请重新输入');

        // 姓名是否填写
        $username=trim($arr['username']);
        if(!empty($data2)) msg('忘记填写姓名啦');
            

           //判断手机号是否有重复
        $post_mobile = trim($arr['mobile']);
        $mobileInfo = $udb->where('mobile="'.$post_mobile.'"')->find();
        if(!empty($data2)) msg('该手机号已注册请换个号码');

/*	$sms_code = I('post.sms_code');
      $trade_code= session('trade_code');
      if ($sms_code != $trade_code||$sms_code==null) {
        echo "<script>alert('短信验证码错误');history.back(-1);</script>;";
        exit();
      }*/
        //========判断两次输入的一级密码是否一致============
        if(trim($arr['password'])!== trim($arr['passwordr'])) msg('两次一级密码不一样');
             
        //========判断两次输入的二级密码是否一致============
        if(trim($arr['two_password'])!== trim($arr['two_passwordr'])) msg('两次二级密码不一样');

        //=============登录密码加密==============
        $salt= substr(md5(time()),0,3);
        $password=md5(md5(trim($arr['passwordr'])).$salt);
        

        //=============安全密码加密==============
        $two_salt= substr(md5(time()),0,3);
        $two_password=md5(md5(trim($arr['two_passwordr'])).$two_salt);

       $registerInfo=array(
            'account'        => trim($arr['account']),
            'parent_id'      => $data['userid'],
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
			'last_login'	 => 0,
			'area_1' 		 => 1,
			'area_2' 		 => 0,
			'area_3' 		 => 0,
			'area_4' 		 => 0,
			'area_5' 		 => 0,
        );
  
        //========向user表添加信息=======
        $zhuce=$udb->data($registerInfo)->add();  
        //=========检查刚才添加的是否有值============
        $check_zhuce=$udb->where("account='".$registerInfo['account']."'")->find();
        if(!$check_zhuce){
            msg('注册失败，请重新注册');
        }
        $userid=$check_zhuce['userid'];
        $information['uid'] = $userid;
        $information['diamonds']=300;
        $res = M('store')->data($information)->add();
        if(!$res){
            msg('仓库创建出错，请联系管理员');
        }
        for($i=1;$i<=12;$i++){
            $informationT['uid']=$userid;
            $informationT['layer_id'] = $i;
            $informationT['tool_id'] = 0;
            $informationT['tool_count']= 0;
            $informationT['tool_user_time']= 0;
            $informationT['is_open']= 0;
            $informationT['open_time'] = 0;
            M('iron_layer')->data($informationT)->add();
        }
        if(!empty($data2)) msg('注册成功', U('Regus/login'));
	}

	//用户退出 
	public function logout(){
        $userid=session('userid');
        if (empty($userid)) {
            redirect(U('Mobile/Index/login'));
		}

		session('userid',null);
		session('mobile',null);

		//if ($browser == 'pc') {
		redirect(U('Pc/Index/login'));
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