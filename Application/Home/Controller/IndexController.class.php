<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends CommonController
{
	//首页
    public function index()
    {
    	
    	$userId = session('userId');
    	$user = getUser($userId);

    	$this->assign('user', $user);
        $this->display();
    }


}