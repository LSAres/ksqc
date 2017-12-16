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

    //开启铁矿区矿层
    public function openlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        if($storeInfo['miner_gold']<$consume_miner_gold){
           msg('挖矿分不足，无法开启新矿层');
        }

    }


}