<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController
{
    //首页
    public function index()
    {
      $this->display();
    }
    //游戏主界面
    public function farm(){
        $tool = tool();
        $uid = session('userId');
        //用户
        $user = getUser($uid);
        //仓库信息
        $store = getStore($uid);
        //宝箱
        $db_baoxiang = M('baoxiang');
        //查询直系好友
        $friend_list = getFriend($uid);
        //获取挖矿分记录
        $miner_list = getMinerList($uid);
        //获取现金分记录
        $money_list = getMoneyList($uid);
        //获取钻石分记录
        $diamonds_list = getDiamondsList($uid);
        //兑换工具记录
        $tools_log = M('tools')->where(array('uid' => $uid))->select();
        //挖矿分兑换现金分记录
        $miner_money_list = M('miner_money_log')->where(array('uid' => $uid))->select();
        //现金分兑换挖矿分记录
        $money_miner_list = M('money_miner_log')->where(array('uid' => $uid))->select();
        //获取可开启宝箱数量
        $baoxiang_count = $db_baoxiang->where(array('uid' => $uid, 'status' => 0))->count();
        //获取可开启宝箱数量
        $baoxiang_list = $db_baoxiang->where(array('uid' => $uid, 'status' => 1))->select();
        //查询矿层
        $layer_count = M(session('area'))->where(array('uid' => $uid, 'is_open' => 1))->count();
        //查询全部层数剩余时间
        $second_list = array();
        for ($i=1; $i < 13; $i++) {
            $result = $this->syTime($i);
            $second = $result['second'] ? $result['second'] : 0;
            array_push($second_list, $second * 1000);
        }
        $this->assign('second_list', json_encode($second_list));

        $this->assign('tool', $tool);
        $this->assign('store', $store);
        $this->assign('user', $user);
        $this->assign('tools_log', $tools_log);
        $this->assign('friend_list',$friend_list);
        $this->assign('miner_list',$miner_list);
        $this->assign('money_list',$money_list);
        $this->assign('diamonds_list',$diamonds_list);
        $this->assign('miner_money_list',$miner_money_list);
        $this->assign('money_miner_list',$money_miner_list);
        $this->assign('baoxiang_count', $baoxiang_count);
        $this->assign('baoxiang_list', $baoxiang_list);
        $this->assign('layer_count', $layer_count);
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
    //推荐人
    public function tuijian()
    {
        $uid = session('userId');
        $db_user = M('user');
        $db_money_log = M('money_log');
        $userInfo = $db_user->where(array('id' => $uid))->find();
        if (!empty($userInfo)) die(0);
        $parent = I('post.mobile');
        $parent_id = $db_user->where(array('mobile' => $parent))->gitField('id');
        if (empty($parent_id)) {
            msg('该用户不存在');
        } else {
            $db_user->where(array('id' => $uid))->setInc('son_count', 1);
            $db_user->where(array('id' => $uid))->save(array('parent_id' => $parent_id));
        }
        //给上级推荐人100现金分
        $db_store = M('store');
        $db_store->where(array('id' => $parent_id))->setInc('money', C('parent_money'));
        $data = [
            'uid' => $parent_id,
            'money' => C('parent_money'),
            'type' => 1,
            'note' => '获得推荐奖金,uid-'.$uid,
            'time' => time()
        ];
        $db_money_log->add($data);
        //返利、见点
        $next_id = $parent_id;
        for ($i = 1; $i < 13; $i++) {
            //见点奖，最多12层
            $nextUser = getUser($next_id);
            //直推三人及以上可返利代数
            if ($nextUser['con_count'] >= 3) {
                $nextUser['con_count'] = jdRelation($nextUser['con_count']);
            }
            if ($nextUser['con_count'] >= $i) {
                $db_user->where(array('id' => $next_id))->setInc('money', C('jiandian'));
                $data1 = [
                    'uid' => $next_id,
                    'money' => C('jiandian'),
                    'type' => 1,
                    'note' => '获得第'.$nextUser['con_count'].'代见点奖'.C('jiandian').'现金分,uid-'.$uid,
                    'time' => time()
                ];
                $db_money_log->add($data1);
            }
            $next_id = $nextUser['parent_id'];
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
    //开启矿区矿层
    public function openironlayer(){
        $userId = session('userId');
        $layer_id = I('post.layer_id');
        $storeInfo = M('store')->where('uid='.$userId)->find();
        $userInfo = M('user')->where('uid='.$userId)->find();
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
        //返给上级33%现金分
        $fanli_money = $consume_miner_gold['brand_num'] * 0.33;
        $status_f = M('store')->where(array('uid' => $userInfo['parent_id']))->setInc('money', $fanli_money);
        $data = [
            'uid' => $userId,
            'money' => $fanli_money,
            'type' => 1,
            'note' => '开铁矿区给上级返利'.$fanli_money.'现金分',
            'time' => time()
        ];
        M('money_log')->add($data);
        if($rcc && $status_f){
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
        $userInfo = M('user')->where('uid='.$userId)->find();
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
        //返给上级33%现金分
        $fanli_money = $consume_miner_gold['brand_num'] * 0.33;
        $status_f = M('store')->where(array('uid' => $userInfo['parent_id']))->setInc('money', $fanli_money);
        $data = [
            'uid' => $userId,
            'money' => $fanli_money,
            'type' => 1,
            'note' => '开铜矿区给上级返利'.$fanli_money.'现金分',
            'time' => time()
        ];
        M('money_log')->add($data);
        if($rcc && $status_f){
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
        $userInfo = M('user')->where('uid='.$userId)->find();
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
        //返给上级33%现金分
        $fanli_money = $consume_miner_gold['brand_num'] * 0.33;
        $status_f = M('store')->where(array('uid' => $userInfo['parent_id']))->setInc('money', $fanli_money);
        $data = [
            'uid' => $userId,
            'money' => $fanli_money,
            'type' => 1,
            'note' => '开银矿区给上级返利'.$fanli_money.'现金分',
            'time' => time()
        ];
        M('money_log')->add($data);
        if($rcc && $status_f){
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
        $userInfo = M('user')->where('uid='.$userId)->find();
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
        //返给上级33%现金分
        $fanli_money = $consume_miner_gold['brand_num'] * 0.33;
        $status_f = M('store')->where(array('uid' => $userInfo['parent_id']))->setInc('money', $fanli_money);
        $data = [
            'uid' => $userId,
            'money' => $fanli_money,
            'type' => 1,
            'note' => '开金矿区给上级返利'.$fanli_money.'现金分',
            'time' => time()
        ];
        M('money_log')->add($data);
        if($rcc){
            msg('矿层开启成功');
        }else{
            M('store')->where('uid='.$userId)->setInc('miner_gold',$consume_miner_gold);
            msg('矿层开启失败');
        }
    }
    //领取10元水库奖励并提拨70元进入水库
    public function getReservoir()
    {
        $userId = session('userId');
        $reservoir = M('reservoir');
        $reservoir_log = M('reservoir_log');
        $store = M('store');
        $userInfo = $store->where(array('uid' => $userId))->find();
        if ($userInfo['is_get_reservoir']) {
            msg('抱歉您已领取过水库奖励');
        }
        //提拨70
        $this->newsTibo();
        //水库减10元分给用户挖矿金  10元=10000挖矿金
        $s1 = $store->where(array('uid' => $userId))->save(array('is_get_reservoir' => 1));
        $s2 = $reservoir->where(array('id' => 1))->setDec('reservoir', 10);
        $s3 = $store->where(array('uid' => $userId))->setInc('miner_gold', 10000);
        $data['uid'] = $userId;
        $data['reservoir'] = 10;
        $data['type'] = 0;
        $data['note'] = '拨出10元给新用户作为挖矿金';
        $data['time'] = time();
        $s4 = $reservoir_log->add($data);
        if ($s1 && $s2 && $s3 && $s4) {
            msg('恭喜您领取成功');
        } else {
            msg('领取失败');
        }
    }
    //新用户提拨70元进入水库
    public function newsTibo()
    {
        $userId = session('userId');
        $reservoir = M('reservoir');
        $reservoir_log = M('reservoir_log');
        $store = M('store');
        $reservoir->where(array('id' => 1))->setInc('reservoir', 70);
        $data['uid'] = $userId;
        $data['reservoir'] = 70;
        $data['type'] = 1;
        $data['note'] = '新用户提拨70元';
        $data['time'] = time();
        $reservoir_log->add($data);
    }

    //手动挖矿
    public function Manual()
    {
        $uid = session('userId');
        $layer = I('post.layer', 0);
        $db_tools = M('tools');
        $db_store = M('store');
        $db_miner_log = M('miner_log');
        $db_miner_gold_log = M('miner_gold_log');
        if ($layer < 1 || $layer > 12) die(0);
        //正在自动挖矿中禁止手动挖矿
        $tools = $db_tools->where(array('uid' => $uid, 'area' => session('area'), 'layer_id' => $layer, 'is_get' => 0))->order('is_default desc, end_time asc')->select();
        $time = time();
        $work_time = 0;
        $s = 0;
        foreach ($tools as $key => &$value) {
            if ($time < $value['end_time'] && $value['is_get'] == 0) {
                $s = 1;
                break;
            }
        }
        
        // if ($s) {
        //     $this->ajaxReturn(array(
        //         'status' => 'error',
        //         'message' => '请等待自动挖矿完成'
        //     ));
        // }

        //正在挖矿中禁止再次挖矿
        $max_record_id = $db_miner_log->max('id');
        $last_record = $db_miner_log->where(array('id' => $max_record_id))->find();

        if (!empty($last_record)) {
            if (time() - $last_record['time'] < 10) {
                $this->ajaxReturn(array(
                    'status' => 'error',
                    'message' => '请等待本次挖矿完毕'
                ));
            }
        }


        //挖矿
        $score = mt_rand(0, 3);
        $db_store->where(array('uid' => $uid))->setInc('miner_gold', $score);
        $data = [
            'uid' => $uid,
            'miner_gold' => $score,
            'type' => 1,    //0减 1加
            'note' => '手动挖矿,获得'.$score.'挖矿分',
            'time' => time()
        ];
        $db_miner_gold_log->add($data);
        $data1 = [
            'uid' => $uid,
            'miner' => $score,
            'type' => 0,    //0手动 1自动
            'note' => '手动挖矿,获得'.$score.'挖矿分',
            'time' => time()
        ];
        $db_miner_log->add($data1);
        $fathers_gold = $db_store->where(array('uid' => $uid))->getField('miner_gold');
        $this->ajaxReturn(array(
            'status' => 'success',
            'fathers_gold' => $fathers_gold,
            'score' => $score
        ));
    }

    //购买道具 升级
    public function buyTool()
    {
        $layer = I('post.layer', 0);
        $tool_id = I('post.tool_id');
        if ($layer < 1 || $layer > 12) die(0);
        if ($tool_id < 1 || $tool_id > 5) die(0);
        $uid = session('userId');
        $tool = tool();
        $store = getStore($uid);
        if ($store['miner_gold'] < $tool[$tool_id]['miner_gold']) {
          $this->ajaxReturn(array(
            'status' => 'error',
            'message' => '挖矿分不足'
          ));
        }
        //如果要限制最多能买5个工具
        $db_tools = M('tools');
        $tool_count = $db_tools->where(array('uid' => $uid, 'area' => session('area') ,'layer_id' => $layer, 'is_get' => 0))->count();
        if ($tool_count >= 5) {
          $this->ajaxReturn(array(
            'status' => 'error',
            'message' => '最多能升五级'
          ));
        }
        //如果要限制每种工具只能买一个
        $this_tool_is_extens = $db_tools->where(array('uid' => $uid, 'area' => session('area'), 'layer_id' => $layer, 'tool_id' => $tool_id, 'is_get' => 0))->find();
        if (!empty($this_tool_is_extens)) {
          $this->ajaxReturn(array(
            'status' => 'error',
            'message' => '每种工具只能购买一次'
          ));
        }
        //购买
        $db_store = M('store');
        $db_miner_gold_log = M('miner_gold_log');
        $s1 = $db_store->where(array('uid' => $uid))->setDec('miner_gold', $tool[$tool_id]['miner_gold']);
        $last_tool = $db_tools->where(array('uid' => $uid, 'layer_id' => $layer, 'is_get' => 0))->order('end_time desc')->select();
        if (empty($last_tool)) {
            $this_time = time() + 3600;
        } else {
            if ($last_tool[0]['end_time'] > time()) {
                $this_time = $last_tool[0]['end_time'] + 3600;
            } else {
                $this_time = time() + 3600;
            }
        }
        //添加记录
        $now = time();
        $data_tools = [
          'uid' => $uid,
          'area' => session('area'),
          'layer_id' => $layer,
          'tool_id' => $tool_id,
          'end_time' => $this_time,
          'buy_time' => $now,
          'stop_time' => 0,
          'is_get' => 0
        ];
        $s2 = $db_tools->add($data_tools);
        //扣分记录
        $data = [
          'uid' => $uid,
          'miner_gold' => $tool[$tool_id]['miner_gold'],
          'type' => 0,
          'note' => '购买'.$tool[$tool_id]['name'].'花费'.$tool[$tool_id]['miner_gold'].'挖矿分',
          'time' => time()
        ];
        $s3 = $db_miner_gold_log->add($data);
        //10%分给宝箱池
        $db_reservoir = M('reservoir');
        $db_reservoir_log = M('reservoir_log');
        $final_score = intval($tool[$tool_id]['miner_gold']/10);
        $s4 = $db_reservoir->where(array('id' => 1))->setInc('coal_baoxiang', $final_score);
        $s5 = $db_reservoir->where(array('id' => 1))->save(array('coal_baoxiang_updatetime' => time()));
        $data1 = [
          'uid' => $uid,
          'reservoir' => $final_score,
          'type' => 1,
          'note' => '矿层升级10%回流作为宝箱红利，挖矿分'.$final_score,
          'time' =>time()
        ];
        $s6 = $db_reservoir_log->add($data1);
        //购买道具时更新次此字段用于12点分红
        $s7 = $db_store->where(array('uid' => $uid))->setInc('today_buytool_minergold', $tool[$tool_id]['miner_gold']);
        $s8 = $db_store->where(array('uid' => $uid))->save(array('last_buytool_time' => time()));
//看看哪里没成功
// $this->ajaxReturn(array(
//     's1' => $s1,
//     's2' => $s2,
//     's3' => $s3,
//     's4' => $s4,
//     's5' => $s5,
//     's6' => $s6,
//     's7' => $s7,
//     's8' => $s8,
//));
        if ($s1 && $s2 && $s3 && $s4 && $s5 && $s6 && $s7 && $s8) {
            $fathers_gold = $db_store->where(array('uid' => $uid))->getField('miner_gold');
            $this->ajaxReturn(array(
                'status' => 'success',
                'fathers_gold' => $fathers_gold,
                'message' => '购买成功'
            ));
        } else {
            $this->ajaxReturn(array(
                'status' => 'error',
                'message' => '购买失败'
            ));
        }
    }
    //设置默认工具
    public function setDefaultTool()
    {
      $layer = I('post.layer', 0);
      $tool_id = I('post.tool_id');
      if ($layer < 1 || $layer > 12) die(0);
      if ($tool_id < 1 || $tool_id > 5) die(0);
      $uid = session('userId');
      $db_tools = M('tools');
      //移除其他默认工具
      $last_default = $db_tools->where(array('uid' => $uid, 'area' => session('area') ,'layer_id' => $layer, 'is_defaule' => 1))->getField('id');
      $status_1 = $db_tools->where(array('id' => $last_default['id']))->save(array('is_default' => 0));
      //更改当前工具为默认工具
      $status_2 = $db_tools->where(array('uid' => $uid, 'layer_id' => $layer))->save(array('is_default' => 1));
      if (!empty($status_1) && !empty($status_2)) {
        $this->ajaxReturn(array('status' => 'success', 'message' => '购买成功'));
      } else {
        $this->ajaxReturn(array('status' => 'error', 'message' => '购买失败'));
      }
    }

    /**查询本层哪些计时结束了可以领取
     * @return id(array)
     */
    public function toolsCheckOut()
    {
      $layer = I('post.layer', 0);
      $this->ajaxReturn($this->syTime($layer));
    }

    //计时结束后领取挖矿分
    public function getMinerGold()
    {
      $layer = I('post.layer', 0);
      $tool_id = I('post.tool_id');;
      $uid = session('userId');
      $db_tools = M('tools');
      $store = M('store');
      $db_miner_gold_log = M('miner_gold_log');
      if ($tool_id < 1 || $tool_id > 5) die(0);
      $this_row = $db_tools->where(array('uid' => $uid, 'area' => session('area'), 'layer_id' => $layer, 'tool_id' => $tool_id, 'is_get' => 0))->find();
      $second = time() - $this_row['buy_time'];
      if ($second < 3600) {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '还没到领取时间'
        ));
      }
      if ($this_row['is_get'] == 1) {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '领取过了'
        ));
      }
      //计算可以领取多少分
      $all_tools = tool();
      $this_tool = $all_tools[$this_row['tool_id']];
      $persent = (mt_rand($this_tool['start'], $this_tool['end'])) / 100;
      $final_score = intval(1200 * ($persent + 1));
      //加分、记录
      $db_tools->where(array('id' => $this_row['id']))->save(array('is_get' => 1, 'get_time' => time(), 'miner_gold' => $final_score));
      $store->where(array('uid' => $uid))->setInc('miner_gold', $final_score);
      $data = [
        'uid' => $uid,
        'miner_gold' => $final_score,
        'type' => 1,
        'note' => '自动挖矿1小时,收获'.$final_score.'挖矿分',
        'time' => time()
      ];
      $db_miner_gold_log->add($data);
      $fathers_gold = $store->where(array('uid' => $uid))->getField('miner_gold');
      $this->ajaxReturn(array(
        'status' => 'success',
        'miner_gold' => $final_score,
        'fathers_gold' => $fathers_gold,
        'message' => '领取成功，领了'.$final_score.'挖矿分'
      ));
    }

    //获取某层剩余时间
    public function syTime($layer)
    {
      $uid = session('userId');
      $db_tools = M('tools');
      $tools = $db_tools->where(array('uid' => $uid, 'area' => session('area'), 'layer_id' => $layer, 'is_get' => 0))->order('is_default desc, end_time asc')->select();

      $time = time();
      $work_time = 0;
      $hours = 0;
      $second = 0;

      foreach ($tools as $key => &$value) {

        // $value['buy_time'] = date('Y-m-d H:i:s', $value['buy_time']);
        // $value['end_time'] = date('Y-m-d H:i:s', $value['end_time']);
        
        // if (!empty($value['stop_time'])) {
        //     $addtime = 3600 - ($value['stop_time'] - $value['start_time']);
        // } else {
        //     $addtime = 3600;
        // }
        
        if ($time > $value['end_time'] && $value['is_get'] == 0) {
            $value['is_pass'] = 1;
        } else {
            $value['is_pass'] = 0;
            $hours++;
            if (!empty($value['stop_time'])) {
                $second += 3600 - ($value['stop_time'] - $value['buy_time']);
            } else {
                $second += 3600;
            }
        }
      }

      $now = time();
      foreach ($tools as $key => &$value) {
          if ($value['is_pass'] == 0) {
            if (!empty($value['stop_time'])) {
                $final_second = $value['stop_time'] + $second - $now;
            } else {
                $final_second = $value['buy_time'] + $second - $now;
            }
            break;
          }
      }
      //如果要按照工具顺序排列
      $new_arr = arraySequence($tools, 'tool_id', 'SORT_ASC');
      return array(
        'list' => $new_arr,
        'hours' => $hours,
        'second' => $final_second
      );
    }
}