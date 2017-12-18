<?php
namespace Home\Controller;
use Think\Controller;
class BaoxiangController extends CommonController
{
	/**
	 * [getBaoxiang 抽取宝箱 手动挖矿时调用]
	 * @param  [type] $area [矿区id 煤铁铜银金分别对应12345]
	 * @return [type]       [boolean]
	 */
	public function getBaoxiang($areaIndex)
	{
		if (empty($areaIndex)) die(0);
		//概率1%
		if (mt_rand(1, 100) != 1) {
			$this->ajaxReturn(true);
		}

		$db_reservoir = $db_reservoir;
		$store = M('store');
		$baoxiang = M('baoxiang');
		$uid = session('userId');

		//今天是否从水库拨2%进入当前矿区宝箱池	有则跳过，无则拨入
		$area = [1 => 'coal_baoxiang', 2 => 'iron_baoxiang', 3 => 'copper_baoxiang', 4 => 'silver_baoxiang', 5 => 'gold_baoxiang'];
		$name = $area[$areaIndex];
		$last_update_time = $db_reservoir->where(array('id' => 1))->getField($name.'_updatetime');
		$today = today();
		if ($last_update_time < $today['start']) {
			//算出2%
			$reservoir = $db_reservoir->where(array('id' => 1))->getField('reservoir');
			//防止前期无水库资金报错
			if (empty($reservoir)) die(0);

			$miner_gold = $reservoir * 0.2;
			//从水库减去2%
			$db_reservoir->where(array('id' => 1))->setDec('reservoir', $miner_gold);
			$data1 = [
				'uid' => $uid,
				'reservoir' => $miner_gold,
				'type' => '0',
				'note' => date('Y-m-d H:i', $today['start']).'从水库拨出'.$miner_gold.'挖矿金到'.$name,
				'time' => time()
			];
			M('reservoir_log')->add($data1);
			//加到对应宝箱池
			$db_reservoir->where(array('id' => 1))->setInc($name, $miner_gold);
			$data2 = [
				'uid' => $uid,
				'reservoir' => $miner_gold,
				'type' => '1',
				'note' => date('Y-m-d H:i', $today['start']).'从水库拨入'.$miner_gold.'挖矿金到'.$name,
				'time' => time()
			];
			M('reservoir_log')->add($data2);
		}

		//本矿区可用宝箱奖励总额
		$this_area_minerGold = $db_reservoir->where(array('id' => 1))->getField($name);
		//随机分给
		$baoxiang_minerGold = intval(($this_area_minerGold/20).mt_rand(0, $this_area_minerGold/5));
		//如果可用挖矿分不够->die
		if ($baoxiang_minerGold > $this_area_minerGold) {
			$this->ajaxReturn(0);
		}
		//宝箱总额中减去
		$db_reservoir->where(array('id' => 1))->setDec($name, $baoxiang_minerGold);
		//加到用户名下
		$db_store->where('id' => $uid)->setInc('case', 1);
		$data3 = [
			'uid' => $uid,
			'get_time' => time(),
			'open_time' => 0,
			'miner_gold' => $baoxiang_minerGold,
			'status' => 0,
		];
		$baoxiang->add($data3);

		$this->ajaxReturn(false);
	}

	//开箱
    public function openBaoxiang()
    {
    	$uid = session('userId');
    	$db_baoxiang = M('baoxiang');
    	$db_miner_gold_log = M('miner_gold_log');
    	$db_diamonds_log = M('diamonds_log');
    	$user = getUser($uid);
    	$store = getStore($uid);

    	$baoxiang_count = $store->where(array('id' => $uid))->getField('case');
    	if ($baoxiang_count < 1) die(0);
    	//取出一个宝箱
    	$baoxiang = $db_baoxiang->where(array('uid' => $uid))->find();
    	if (empty($baoxiang) || empty($baoxiang)) die(0);
    	if ($store['diamonds'] < C('key_price')) {
    		msg('抱歉，钻石分不足');
    	}
    	//开箱，获得箱内分数
    	$store->where(array('id' => $baoxiang['id']))->setDec('case', 1);
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