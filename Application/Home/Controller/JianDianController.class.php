<?php
namespace Home\Controller;
use Think\Controller;
class JianDianController extends CommonController
{
	//查询是否可领取见点奖
	public function jd_select()
	{
		$uid = session('userId');
		$db_store = M('store');
		$db_user = M('user');

		$available_money = $db_store->where(array('uid' => $uid))->getField('available_money');
		if ($available_money > 0) {	//有可领取的见点奖
			json(array(
				'status' => 1,
				'message' => '可显示领取'
			));
		}
	}

	//领取操作
	public function jd_get()
	{
		$uid = session('userId');
		$db_store = M('store');
		$db_user = M('user');

		$available_money = $db_store->where(array('uid' => $uid))->getField('available_money');
		if ($available_money == 0) {	//没有可领取的见点奖
			json(array(
				'status' => 0,
				'message' => '暂无可领取的见点奖'  //请求这里可进行封号操作
			));
		}

		$add_time = $db_user->where(array('id' => $uid))->getField('add_time');	//我的注册时间
		$end_time = $add_time + 864000;
		$zhitui_count = $db_user->where(array('parent_id' => $uid, 'add_time' => array('lt', $end_time)))->count();
		if (time() < $end_time && $zhitui_count < 3) {
			json(array(
				'status' => 0,
				'message' => '抱歉您不满足领取条件(注册十日内直推三人)'
			));
		}

		if (time() > $end_time && $zhitui_count <= 3) {
			json(array(
				'status' => 0,
				'message' => '抱歉您不满足领取条件(若超过十日之后才推荐满三人，见点奖励从满三人之后加入的会员开始计算)'
			));
		}

		if ($zhitui_count < 3) {
			$get_money = $available_money - 30;
		} else {
			$get_money = $available_money;
		}

		$s1 = $db_store->where(array('uid' => $uid))->setInc('money', $get_money);
		$s2 = $db_store->where(array('uid' => $uid))->setField('available_money', 0);
		$db_money_log = M('money_log');
		$data1 = [
			'uid' => $uid,
			'money' => $get_money,
			'type' => 1,
			'note' => '领取见点奖'.$get_money.'现金分',
			'time' => time()
		];
		$s3 = $db_money_log->add($data1);

		if (!empty($s1) && !empty($s2) !empty($s3)) {
			json(array(
				'status' => 1,
				'message' => '恭喜您领取见点奖成功'
			));
		}
	}
}