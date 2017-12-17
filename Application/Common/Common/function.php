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