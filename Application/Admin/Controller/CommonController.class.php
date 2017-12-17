<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
	public function _initialize(){
		   if(!session('sp_user')){
		          $this->redirect('Admin/Login/index');
		   }
		 
	}
	
	public function power(){
		$sp_id =session('sp_user');
		$power = M('nzspuser')->where('sp_id='.$sp_id)->getField('power');
		if($power==0){
			 echo "<script>alert('您无权限执行此操作');</script>";
             echo "<script>javascript:history.back(-1);</script>";die;
		}
	}

	//图片上传
	/**
		$path存放的文件夹
	*/
	public function _imgupload($path){
	$config = array(    
		'maxSize'    =>    3145728,
		'rootPath'   =>  './Public/',
		'savePath'   =>    "/{$path}/",
		'saveName'   =>    array('uniqid',''),
		'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
		'autoSub'    =>    true,
		'subName'    =>    array('date','Ymd')
	);
	 return  new \Think\Upload($config);
	}


}

