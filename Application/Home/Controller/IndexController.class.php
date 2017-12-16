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

    //游戏主界面
    public function farm(){
//        $userId = session('userId');
//        $user =  getUser($userId);
//        $storeInfo = M('store')->where('uid='.$userId)->find();
//        $this->assign('storeInfo',$storeInfo);
//        $this->assign('user',$userId);
        $this->display();
    }

    //签到，每天奖励1钻石分
    public function sign(){
        $userId=session('userId');
        $userInfo = M('user')->where('id='.$userId)->find();
        $storeInfo = M('store')->where('uid='.$userId)->find();
        if($userInfo['sign_status']){
            msg('今日已签到！');
        }
        $res = M('store')->where('uid='.$userId)->setInc('diamonds',1);
        $rcc=0;
        if($res){
            $data['uid']=$userId;
            $data['time'] = time();
            $rcc = M('sign')->data($data)->add();
        }
        if($rcc){
            msg('签到成功');
        }else{
            msg('签到失败');
        }
    }

    //开启矿区
    public function open_mine_area(){
        $userId = session('userId');
        $mine_id = I('post.mine_id');
        $userInfo = M('user')->where('id='.$userId)->find();
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $open_consume = area($mine_id);
        if($userInfo['area_'.$mine_id]){
            msg('该矿区已经开启，不可重复开启');
        }
        $erect_num = M('user')->where('parent_id='.$userId)->count();   //查询此人直推人数
        if($storeInfo['miner_gold']<$open_consume['miner_num']||$storeInfo['brand']<$open_consume['brand_num']||$erect_num<$open_consume['erect']){
            msg('不满足该矿区开启条件');
        }
        $res = M('store')->wehre('uid='.$userId)->setDec('miner_gold',$open_consume['miner_num']);
        $rec = M('store')->where('uid='.$userId)->setDec('brand',$open_consume['brand_num']);
        $open_status=0;
        if($res&&$rec){
            $open_status=M('user')->wehre('id='.$userId)->setField('area_'.$mine_id,1);
            if($open_status) {
                msg('开启成功');
            }else{
                msg('开启失败');
            }
        }else{
            msg('开启失败');
        }
    }

    //开启煤矿区矿层
    public function opencoallayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        $condition['u_id']=$userId;
        $condition['layer_id']=$layer_id;
        $is_open = M('coal_layer')->where($condition)->getField('is_open'); //查询该矿层是否已开启
        if($is_open){
            msg('该层已开启');
        }
        if($storeInfo['miner_gold']<$consume_miner_gold){
           msg('挖矿分不足，无法开启新矿层');
        }
        $res = M('store')->where('uid='.$userId)->setDec('miner_gold',$consume_miner_gold);
        if(!$res){
            msg('开启失败');
        }
        $information['is_open']=1;
        $information['open_time']=time();
        $rcc = M('coal_layer')->where($condition)->save($information);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }

    }

    //开启铁矿区矿层
    public function openironlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        $condition['u_id']=$userId;
        $condition['layer_id']=$layer_id;
        $is_open = M('iron_layer')->where($condition)->getField('is_open'); //查询该矿层是否已开启
        if($is_open){
            msg('该层已开启');
        }
        if($storeInfo['miner_gold']<$consume_miner_gold){
            msg('挖矿分不足，无法开启新矿层');
        }
        $res = M('store')->where('uid='.$userId)->setDec('miner_gold',$consume_miner_gold);
        if(!$res){
            msg('开启失败');
        }
        $information['is_open']=1;
        $information['open_time']=time();
        $rcc = M('iron_layer')->where($condition)->save($information);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }

    }

    //开启铜矿区矿层
    public function opencopperlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        $condition['u_id']=$userId;
        $condition['layer_id']=$layer_id;
        $is_open = M('copper_layer')->where($condition)->getField('is_open'); //查询该矿层是否已开启
        if($is_open){
            msg('该层已开启');
        }
        if($storeInfo['miner_gold']<$consume_miner_gold){
            msg('挖矿分不足，无法开启新矿层');
        }
        $res = M('store')->where('uid='.$userId)->setDec('miner_gold',$consume_miner_gold);
        if(!$res){
            msg('开启失败');
        }
        $information['is_open']=1;
        $information['open_time']=time();
        $rcc = M('copper_layer')->where($condition)->save($information);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }

    }

    //开启银矿区矿层
    public function opensilverlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        $condition['u_id']=$userId;
        $condition['layer_id']=$layer_id;
        $is_open = M('silver_layer')->where($condition)->getField('is_open'); //查询该矿层是否已开启
        if($is_open){
            msg('该层已开启');
        }
        if($storeInfo['miner_gold']<$consume_miner_gold){
            msg('挖矿分不足，无法开启新矿层');
        }
        $res = M('store')->where('uid='.$userId)->setDec('miner_gold',$consume_miner_gold);
        if(!$res){
            msg('开启失败');
        }
        $information['is_open']=1;
        $information['open_time']=time();
        $rcc = M('silver_layer')->where($condition)->save($information);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }

    }

    //开启金矿区矿层
    public function opengoldlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $consume_miner_gold = area1($layer_id);
        $condition['u_id']=$userId;
        $condition['layer_id']=$layer_id;
        $is_open = M('gold_layer')->where($condition)->getField('is_open'); //查询该矿层是否已开启
        if($is_open){
            msg('该层已开启');
        }
        if($storeInfo['miner_gold']<$consume_miner_gold){
            msg('挖矿分不足，无法开启新矿层');
        }
        $res = M('store')->where('uid='.$userId)->setDec('miner_gold',$consume_miner_gold);
        if(!$res){
            msg('开启失败');
        }
        $information['is_open']=1;
        $information['open_time']=time();
        $rcc = M('gold_layer')->where($condition)->save($information);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }

    }


}