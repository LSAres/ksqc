<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
         $this->display();
	}
		
	//验证码
	public function verify(){
		ob_clean();
		$config =    array(
		'codeSet' =>  '0123456789',   
		'fontSize'    =>    30,    // 验证码字体大小   
		'length'      =>    4,     // 验证码位数    
		'fontttf'     =>   '5.ttf',
		'useCurve'    => false,
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}
	
	
	public function Logout(){
		session('sp_user',null);
		session('sp_admin',null);
		session(null);
		redirect(U(MODULE_NAME.'/Login/index'));
	}

	//登陆验证
	public function idcheck(){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';

		if(!IS_POST){
			redirect(U(MODULE_NAME.'/login/index'));
		}
		$uname=I('post.id');
		$psw=I('post.password');
		$spdb=M('nzspuser');
		$usinfo=$spdb->where("sp_username='$uname'")->find();
		$code=I('post.verify');
		$verify = new \Think\Verify(); 

		if(!$verify->check($code)){
		 	echo '<script>alert("验证码错误");location.href="'.U(MODULE_NAME.'/login/index').'"</script>';
			exit();
	     }
		if($usinfo && !empty($usinfo)){
			//判断是否锁定
			 if($usinfo['sp_lock']){
				echo "<script>alert('用户锁定')</script>";
			    echo "<script>javascript:history.back(-1);</script>";
				return;
			} 
			$us_old=md5(md5($psw).$usinfo['sp_salt']);
			if($us_old == $usinfo['sp_password']){
				//写放session
                session('sp_name',$usinfo['sp_username'],3600);
				session('sp_user',$usinfo['sp_id'],3600);
//				$sp_logintime_array = M('nzspuser')->where()->getField('sp_logintime',true);
//				$sp_logintime = max($sp_logintime_array);
//				$now_login=time();
//				if (date('Ymd',$sp_logintime) != date('Ymd',$now_login)){
//					if ($sp_logintime<$now_login){
//						$this->record();
//					}
//				}
				if($usinfo['sp_id'] == 1||$usinfo['sp_id'] == 1||$usinfo['sp_id'] == 1){
					session('sp_admin','1',3600);	
				}
				$lgdata['sp_logintime'] = time(); 
				$lgdata['sp_loginip'] = get_client_ip(); 
				$spdb->where("sp_id ='$usinfo[sp_id]'")->save($lgdata);
       		  echo '<script>alert("登陆成功");</script>';
          	  echo "<script>window.location.href='".U('Admin/index/backstageSammaryPage')."';</script>";
			}else{
				echo '<script>alert("密码错误")</script>';
				echo '<script>javascript:history.back(-1);</script>';
				exit;
			}
		}else{
			echo '<script>alert("账号错误")</script>';
			echo '<script>javascript:history.back(-1);</script>';
		}
	}
	
	public function record(){
		$transaction_sum = M('transaction')->where()->sum('money');
		
		$gold_sum = M('store')->where()->sum('gold');
		$bonus_sum = M('store')->where()->sum('bonus');
		$buycar_money_sum = M('store')->where()->sum('buycar_money');
		$fee_sum = M('withdraw')->where()->sum('charge');
		$now_time = time();
		$data['transaction_sum']=$transaction_sum;
		$data['gold_sum']=$gold_sum;
		$data['bonus_sum']=$bonus_sum;
		$data['buycar_money_sum']=$buycar_money_sum;
		$data['fee_sum']=$fee_sum;
		$data['time']=$now_time;
		M('data')->data($data)->add();
	}



}
