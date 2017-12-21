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
 * [json格式响应ajax请求]
 */
function json($arr) {
	header('Content-Type:application/json; charset=utf-8');
	exit(json_encode($data));
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
 * [getUser 获取指定层信息]
 * @param  [type] $userId [userId]
 * @return [type] $layer [layer]
 */
function getLayer($userId, $layer) {
	$layer = M('coal_layer')->where(array('uid' => $userId, 'layer_id' => $layer))->find();
	return $layer;
}

/**
 * [area 开发新矿区所需消耗物品]
 * 共5大区，煤矿自动开启，所有只有四条
 * @return [type] [array]
 */
function area($index)
{
	$arr = [
		1 => ['miner_num' => 0,'erect' =>0,'brand_num' => 0],
		2 => ['miner_num' => 5000000,'erect' =>10,'brand_num' => 800],
		3 => ['miner_num' => 20000000,'erect' =>12,'brand_num' => 2000],
		4 => ['miner_num' => 50000000,'erect' =>15,'brand_num' => 5000],
		5 => ['miner_num' => 100000000,'erect' =>20,'brand_num' => 10000],
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
		1 => ['id' => 1, 'miner_gold' => 3000, 'start' => 1, 'end' => 11, 'name' => '十字镐', 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//11.6
		2 => ['id' => 2, 'miner_gold' => 6000, 'start' => 1, 'end' => 23, 'name' => '电钻', 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//23.6
		3 => ['id' => 3, 'miner_gold' => 12000, 'start' => 1, 'end' => 44, 'name' => '小型挖矿机', 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//44.6
		4 => ['id' => 4, 'miner_gold' => 25000, 'start' => 1, 'end' => 97, 'name' => '大型挖矿机', 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//97.2
		5 => ['id' => 5, 'miner_gold' => 50000, 'start' => 1, 'end' => 194, 'name' => '炸药', 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],	//194.4
	];
	if (empty($index)) {
			return $arr;
	} else {
		return $arr[$index];
	}
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

/**
 * [today 今天的时间范围时间戳]
 * @return [type] [array]
 */
function today()
{
	$res['start'] = strtotime(date('Y-m-d', time()));
	$res['end'] = strtotime(date('Y-m-d', time()))+86400;
	return $res;
}

/**
 * TODO 基础分页的相同代码封装，使前台的代码更少
 * @param $m 模型，引用传递
 * @param $where 查询条件
 * @param int $pagesize 每页查询条数
 * @return \Think\Page
 */
function getpage(&$m,$where,$pagesize=10){
    $m1=clone $m;//浅复制一个模型
    $count = $m->where($where)->count();//连惯操作后会对join等操作进行重置
    $m=$m1;//为保持在为定的连惯操作，浅复制一个模型
    $p=new Think\Page($count,$pagesize);
    $p->lastSuffix=false;
    $p->setConfig(array('header'=>'条记录','prev'=>'上一页','next'=>'下一页','first'=>'首页','last'=>'末页','theme'=>' %totalRow% %header% %nowPage%/%totalPage% 页 %upPage% %downPage% %first%  %prePage%  %linkPage%  %nextPage% %end%'));
    $p->setConfig('prev','上一页');
    $p->setConfig('next','下一页');
    $p->setConfig('last','末页');
    $p->setConfig('first','首页');
    $p->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');

    $p->parameter=I('get.');

    $m->limit($p->firstRow,$p->listRows);

    return $p;
}

function jdRelation($son_count){
	$arr = [
		3 => 5,
		4 => 6,
		5 => 7,
		6 => 8,
		7 => 9,
		8 => 10,
		9 => 11,
		10 => 12
	];
	return $arr[$son_count];
}

/**
 * 对二维数组进行排序
 * 模拟 数据表记录按字段排序
 *
 * <code>
 *  @list_order($list, $get['orderKey'], $get['orderType']);
 * </code>
 * @param array $array 要排序的数组
 * @param string $orderKey 排序关键字/字段
 * @param string $orderType 排序方式，'asc':升序，'desc':降序
 * @param string $orderValueType 排序字段值类型，'number':数字，'string':字符串
 * @link http://www.cnblogs.com/52php/p/5668809.html
 */
function list_order(&$array, $orderKey, $orderType = 'asc', $orderValueType = 'string') {
    if (is_array($array)) {
        $orderArr = array();
        foreach ($array as $val) {
            $orderArr[] = $val[$orderKey];
        }
        $orderType = ($orderType == 'asc') ? SORT_ASC : SORT_DESC;
        $orderValueType = ($orderValueType == 'string') ? SORT_STRING : SORT_NUMERIC;
        $result = array_multisort($orderArr, $orderType, $orderValueType, $array);
				return $result;
    }
}
