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
 * [getUser 获取好友信息]
 * @param  [type] $userId [userId]
 * @return [type]         [array]
 */
function getFriend($userId) {
    $friend_list = M('user')->where(array('parent_id' => $userId))->select();
    return $friend_list;
}

/**
 * [getUser 获取挖矿分记录]
 * @param  [type] $userId [userId]
 * @return [type]         [array]
 */
function getMinerList($userId) {
    $miner_list = M('miner_log')->where(array('uid' => $userId))->select();
    return $miner_list;
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
		1 => ['id' => 1, 'miner_gold' => C('tool_1_miner_gold'), 'start' => C('tool_1_start'), 'end' => C('tool_1_end'), 'name' => C('tool_1_name'), 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513846444807&di=e421e41458593b22c06cdbbaf3913187&imgtype=0&src=http%3A%2F%2Fimg.go007.com%2F2016%2F11%2F28%2F2319362d1cae2da6_0.jpg'],		//11.6
		2 => ['id' => 2, 'miner_gold' => C('tool_2_miner_gold'), 'start' => C('tool_2_start'), 'end' => C('tool_2_end'), 'name' => C('tool_2_name'), 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//23.6
		3 => ['id' => 3, 'miner_gold' => C('tool_3_miner_gold'), 'start' => C('tool_3_start'), 'end' => C('tool_3_end'), 'name' => C('tool_3_name'), 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//44.6
		4 => ['id' => 4, 'miner_gold' => C('tool_4_miner_gold'), 'start' => C('tool_4_start'), 'end' => C('tool_4_end'), 'name' => C('tool_4_name'), 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],		//97.2
		5 => ['id' => 5, 'miner_gold' => C('tool_5_miner_gold'), 'start' => C('tool_5_start'), 'end' => C('tool_5_end'), 'name' => C('tool_5_name'), 'img' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513753946&di=53688a070cf6fd319cfe131f7536677b&imgtype=jpg&er=1&src=http%3A%2F%2Fjoymepic.joyme.com%2Farticle%2Fuploads%2F20174%2F181495090990669871.jpeg'],	//194.4
	];
	if (empty($index)) {
			return $arr;
	} else {
		return $arr[$index];
	}
}

/**
 * [tool 商城衣服(衣服一号,衣服二号,衣服三号)]
 * @param  [type] $index [key]
 * @return [type]        [array]
 */
function clothes($index)
{
    $arr = [
        1 => ['id' => 1, 'clothes_name' => C('clothes_1_name'), 'clothes_price' => C('clothes_1_price')],		//11.6
        2 => ['id' => 2, 'clothes_name' => C('clothes_2_name'), 'clothes_price' => C('clothes_2_price')],		//23.6
        3 => ['id' => 3, 'clothes_name' => C('clothes_3_name'), 'clothes_price' => C('clothes_3_price')],		//44.6
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
		1 => C('consume_1'),
		2 => C('consume_2'),
		3 => C('consume_3'),
		4 => C('consume_4'),
		5 => C('consume_5'),
		6 => C('consume_6'),
		7 => C('consume_7'),
		8 => C('consume_8'),
		9 => C('consume_9'),
		10 => C('consume_10'),
		11 => C('consume_11'),
		12 => C('consume_12'),
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
 * 二维数组根据字段进行排序
 * @params array $array 需要排序的数组
 * @params string $field 排序的字段
 * @params string $sort 排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
 */
 function arraySequence($array, $field, $sort = 'SORT_DESC')
{
    $arrSort = array();
    foreach ($array as $uniqid => $row) {
        foreach ($row as $key => $value) {
            $arrSort[$key][$uniqid] = $value;
        }
    }
    array_multisort($arrSort[$field], constant($sort), $array);
    return $array;
}

