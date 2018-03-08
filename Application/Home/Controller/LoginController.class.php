<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //用户登陆
	public function login(){
        $zhuce = I('get.zhuce') ? I('get.zhuce') : 0;
        $fMobile = I('get.fMobile');
        $this->assign('zhuce', $zhuce);
        $this->assign('fMobile', $fMobile);
		$this->display();
	}

    //视频，二维码
    public function exhibition(){
        $zhuce = I('get.zhuce') ? I('get.zhuce') : 0;
        $fMobile = I('get.fMobile');
        // $this->assign('zhuce', $zhuce);
        // $this->assign('fMobile', $fMobile);
        $this->assign('registUrl', U('Login/login', array('zhuce' => $zhuce, 'fMobile' => $fMobile)));
        $this->display();
    }


	//登陆验证
	public function testid(){
    	$account=trim(I('post.account'));
	    $pwd=trim(I('post.pwd'));

	   	$code=I('verify');
		$udb=M('user');
		$db_userlog = M('user_log');

		$usinfo=$udb->where("account='{$account}'")->find();
        if ($usinfo['lockuser']) {
            $data['msg'] = "您的账号已锁定，请联系管理员";
            $data['success']=0;
            $this->ajaxReturn($data);
        	//msg('你账号已锁定，请联系管理员');
        }

		$us_old=md5(md5($pwd).$usinfo['salt']);
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

		session('userId', $usinfo['id'], 3600*3);
		session('account', $account, 3600*3);
             	
        //记录登录时间
		M('user')->where('id='.$usinfo['id'].'')->setField('last_login',time());
		M('user')->where('id='.$usinfo['id'].'')->setField('login_ip',get_client_ip());
		$uInfo = M('store')->where('uid='.$usinfo['id'].'')->find();

		$logInfo = array(
			'uid'      => $usinfo['id'],
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
	    $arr=I('post.');
        //========判断查出来的父级id是否为空============
        $recommend_ren=trim($arr['leadMobile']);
        $data=$udb->where("account='".$recommend_ren."'")->find();

        if(empty($data)){
            $return['msg']="注册链接不正确，请勿更改";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('上级不存在');
        }
            //========判断新的账号名是否已经存在============
        $account=trim($arr['mobile']);
        $data2=$udb->where("account='".$account."'")->find(); 
        if(!empty($data2)){
            $return['msg'] = "账号名已经存在，请重新输入";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('账号名已经存在，请重新输入');
        }

        // 姓名是否填写
        $username=trim($arr['realname']);
        if(!empty($data2)){
            $return['msg']="忘记填写姓名啦";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            // msg('忘记填写姓名啦');
        }
            

           //判断手机号是否有重复
        $post_mobile = trim($arr['mobile']);
        $mobileInfo = $udb->where('mobile="'.$post_mobile.'"')->find();
        if(!empty($mobileInfo)){
            $return['msg'] = "该手机号已注册，请换个手机号";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('该手机号已注册请换个号码');
        }

/*	$sms_code = I('post.sms_code');
      $trade_code= session('trade_code');
      if ($sms_code != $trade_code||$sms_code==null) {
        echo "<script>alert('短信验证码错误');history.back(-1);</script>;";
        exit();
      }*/
        //========判断两次输入的一级密码是否一致============
        if(trim($arr['pwd'])!== trim($arr['payPwd'])){
            $return['msg'] = "两次一级密码不一样";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('两次一级密码不一样');
        }
             
        //========判断两次输入的二级密码是否一致============
        if(trim($arr['two_pwd'])!== trim($arr['two_payPwd'])){
            $return['msg'] = "两次二级密码不一样";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('两次二级密码不一样');
        }

        //=============登录密码加密==============
        $salt= substr(md5(time()),0,3);
        $password=md5(md5(trim($arr['pwd'])).$salt);
        

        //=============安全密码加密==============
        $two_salt= substr(md5(time()),0,3);
        $two_password=md5(md5(trim($arr['two_pwd'])).$two_salt);

       $registerInfo=array(
            'account'        => trim($arr['mobile']),
            'parent_id'      => $data['id'],
            'username'       => trim($arr['realname']),
            'sex'            => 1,//trim($arr['sex']),
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
			// 'area_1' 		 => 1,
			// 'area_2' 		 => 0,
			// 'area_3' 		 => 0,
			// 'area_4' 		 => 0,
			// 'area_5' 		 => 0,
        );
  
        //========向user表添加信息=======
        $zhuce=$udb->data($registerInfo)->add();  
        //=========检查刚才添加的是否有值============
        $check_zhuce=$udb->where("account='".$registerInfo['account']."'")->find();
        if(!$check_zhuce){
            $return['msg'] = "注册失败，请重新注册";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('注册失败，请重新注册');
        }
        $userid=$check_zhuce['id'];
        $information['uid'] = $userid;
        $information['diamonds']=300;
        $res = M('store')->data($information)->add();
        if(!$res){
            $return['msg'] = "仓库创建出错，请联系管理员";
            $return['errcode'] = 2;
            $this->ajaxReturn($return);
            //msg('仓库创建出错，请联系管理员');
        }
        for($i=1;$i<=12;$i++){
            $informationT['uid']=$userid;
            $informationT['layer_id'] = $i;
            $informationT['tool_id'] = 0;
            $informationT['tool_count']= 0;
            $informationT['tool_user_time']= 0;
            $informationT['is_open']= 0;
            $informationT['open_time'] = 0;
            M('coal_layer')->data($informationT)->add();
        }
        if(!empty($zhuce)){
            $return['msg'] = "注册成功";
            $return['errcode'] = 10000;
            $return['url'] = U('Login/login');
            $this->ajaxReturn($return);
            //msg('注册成功', U('Regus/login'));
        }
	}

	//用户退出 
	public function logout(){
        $userid=session('userId');
        if (empty($userid)) {
            redirect(U('Login/login'));
		}

		session('userid',null);
		session('mobile',null);

		//if ($browser == 'pc') {
		redirect(U('Login/login'));
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