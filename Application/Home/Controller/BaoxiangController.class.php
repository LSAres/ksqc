<?php
namespace Home\Controller;

use Think\Controller;

class BaoxiangController extends CommonController
{
	//首页
    public function openBaoxiang()
    {
    	$uid = session('userId');
    	$db_baoxiang = M('baoxiang');
    	$db_miner_gold_log = M('miner_gold_log');
    	$db_diamonds_log = M('diamonds_log');

    	$user = getUser($uid);
    	$store = getStore($uid);
    	//取出一个宝箱
    	$baoxiang = $db_baoxiang->where(array('uid'))->find();

    	if (empty($baoxiang) || empty($baoxiang)) die(0);
    	if ($store['diamonds'] < C('key_price')) {
    		msg('抱歉，钻石分不足');
    	}

    	//开箱，获得箱内分数
    	$miner_gold = $db_baoxiang->where(array('id' => $baoxiang['id']))->getField('miner_gold');
    	//修改宝箱状态
    	$my_case = $db_baoxiang->where(array('id' => $baoxiang['id']))->save(array('open_time' => time(), 'status' => 1));
    	//添加到我的挖矿分
    	$store->where(array('uid' => $uid))->setInc('miner_gold', $miner_gold);
    	//挖矿分记录
    	$data1 = [
    		'uid' => $uid,
    		'miner_money' => $miner_gold,
    		'type' => 1,
    		'note' => '开启宝箱,获得'.$miner_gold.'挖矿分',
    		'time' => time()
    	];
    	$db_miner_gold_log->add($data1);

    	//减去钻石分，插入消费记录
    	$store->where(array('uid' => $uid))->setDec('diamonds', C('key_price'));
    	$data2 = [
    		'uid' => $uid,
    		'diamonds' => $miner_gold,
    		'type' => 0,
    		'note' => '开启宝箱,消耗'.$miner_gold.'钻石分',
    		'time' => time()
    	];
    	$db_diamonds_log->add($data2);
    }
}