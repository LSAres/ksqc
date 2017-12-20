<?php
namespace Home\Controller;

use Think\Controller;

class PersonalCenterController extends CommonController
{
    //个人设置
    public function personalSetting()
    {

    }

    //兑换记录
    public function duihuan()
    {
        $uid = session('userId');
        $db_miner_money_log = M('miner_money_log');
        $db_money_miner_log = M('money_miner_log');

        $result1 = $db_miner_money_log->where(array('uid' => $uid))->select();
        $result2 = $db_money_miner_log->where(array('uid' => $uid))->select();

        $final_result = array_merge($result1, $result2);
        $order_result = list_order($final_result, 'time', 'desc', 'number');

        $this->ajaxReturn($order_result);
    }

    //挖矿记录
    public function miner()
    {
        $uid = session('userId');
        $db_miner_log = M('miner_log');
        $result = $db_miner_log->where(array('uid' => $uid))->select();
        $this->ajaxReturn($result);
    }


    //现金记录
    public function money()
    {
        $uid = session('userId');
        $db_money = M('money');
        $result = $db_money->where(array('uid' => $uid))->select();
        $this->ajaxReturn($result);   
    }

    //钻石记录
    public function diamonds()
    {
        $uid = session('userId');
        $db_diamonds_log = M('diamonds_log');
        $result = $db_diamonds_log->where(array('uid' => $uid))->select();
        $this->ajaxReturn($result);
    }
}