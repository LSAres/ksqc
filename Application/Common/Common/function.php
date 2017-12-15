<?php
/**
 * [msg 提示信息]
 * @param  [string] $message [提示信息]
 * @param  string $url     [url]
 */
function msg($message, $url = '') {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	if (empty($url)) {
        echo '<script>alert("'.$message.'");javascript:history.back(-1);</script>';die;
	} else {
		echo '<script>alert("'.$message.'");</script><script>window.location.href='.$url.'</script>';die;
	}
}

/**
 * [getUser 获取用户信息]
 * @param  [type] $userId [userId]
 * @return [type]         [array]
 */
function getUser($userId) {
	$user = M('user')->where(array('id' => $userId))->find();
	return $user;
}

/**
 * [getUser 获取仓库信息]
 * @param  [type] $userId [userId]
 * @return [type]         [array]
 */
function getStore($userId) {
	$store = M('store')->where(array('uid' => $userId))->find();
	return $store;
}

/**
 * [area 开发新矿区所需消耗物品]
 * 共5大区，煤矿自动开启，所有只有四条
 * @return [type] [array]
 */
function area($index)
{
	$arr = [
		1 => ['miner_num' => 0,'brand_num' => 0],
		2 => ['miner_num' => 5000000,'brand_num' => 800],
		3 => ['miner_num' => 20000000,'brand_num' => 2000],
		4 => ['miner_num' => 50000000,'brand_num' => 5000],
		5 => ['miner_num' => 100000000,'brand_num' => 10000],
	];
    return $arr[$index];
}

/**
 * [tool 工具(十字镐,电钻,小型挖矿机,大型挖矿机,炸药)]
 * @param  [type] $index [key]
 * @return [type]        [array]
 */
function tool($index)
{
	$arr = [
		1 => ['miner_gold' => 3000, 'start' => 1, 'end' => 11],		//11.6
		2 => ['miner_gold' => 6000, 'start' => 1, 'end' => 23],		//23.6
		3 => ['miner_gold' => 12000, 'start' => 1, 'end' => 44],		//44.6
		4 => ['miner_gold' => 25000, 'start' => 1, 'end' => 97],		//97.2
		5 => ['miner_gold' => 50000, 'start' => 1, 'end' => 194],	//194.4
	];
    return $arr[$index];
}

/**
 * [area1 矿区1 里面的12层开启所需的挖矿分]
 * @param  [type] $index [key]
 * @return [type]        [array]
 */
function area1($index)
{
	$arr = [
		1 => 0,
		2 => 20000,
		3 => 30000,
		4 => 40000,
		5 => 50000,
		6 => 60000,
		7 => 70000,
		8 => 80000,
		9 => 90000,
		10 => 100000,
		11 => 110000,
		12 => 120000,
	];
	return $arr[$index];
}