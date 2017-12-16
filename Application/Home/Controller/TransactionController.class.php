<?php
namespace Home\Controller;

use Think\Controller;

class TransactionController extends CommonController
{
    //挖矿分转现金分
    public function minerChangeMoney(){
        $id = session('userId');
        $miner_gold = I('post.miner_gold');
        $paypassword = I('post.paypassword');
        $userInfo = M('user')->where('id='.$id)->find();
        $storeInfo = M('store')->where('uid='.$id)->find();
        if(!is_numeric($miner_gold)){
            msg('数值输入错误，请输入纯数字');
        }
        if($miner_gold<1){
            msg('数值输入错误，请重新输入');
        }
        if($storeInfo['miner_gold']<$miner_gold){
            msg('挖矿分不足');
        }
        $paypasswordT=md5(md5($paypassword).$userInfo['safety_salt']);
        if($paypasswordT!=$userInfo['safety_pw']){
            msg('二级密码错误');
        }
        $yu=$miner_gold%1000;
        if ($yu!=0) {
            msg('请输入1000的倍数');
        }
        $res = M('store')->where('uid='.$id)->setDec('miner_gold',$miner_gold);
        if(!$res){
            msg('转换失败,请重新转换');
        }
        $changeNum = $miner_gold/1000;
        $rec = M('store')->where('uid='.$id)->setInc('money',$changeNum);
        if(!$rec){
            M('store')->where('uid='.$id)->setInc('miner_gold',$miner_gold);
            msg('转换失败，请重新转换');
        }
        $data['uid'] = $id;
        $data['from'] = $miner_gold;
        $data['to'] = $changeNum;
        $data['time'] = time();
        $rmm = M('miner_money_log')->data($data)->add();
        if($rmm){
            msg('转换成功');
        }else{
            msg('转换失败');
        }
    }

    //现金分转挖矿分
    public function moneyChangeMiner(){
        $id = session('userId');
        $money = I('post.money');
        $paypassword = I('post.paypassword');
        $userInfo = M('user')->where('id='.$id)->find();
        $storeInfo = M('store')->where('uid='.$id)->find();
        if(!is_numeric($money)){
            msg('数值输入错误，请输入纯数字');
        }
        if($money<1){
            msg('数值输入错误，请重新输入');
        }
        if($storeInfo['money']<$money){
            msg('现金分不足');
        }
        $paypasswordT=md5(md5($paypassword).$userInfo['safety_salt']);
        if($paypasswordT!=$userInfo['safety_pw']){
            msg('二级密码错误');
        }

        $res = M('store')->where('uid='.$id)->setDec('money',$money);
        if(!$res){
            msg('转换失败,请重新转换');
        }
        $changeNum = $money*1000;
        $rec = M('store')->where('uid='.$id)->setInc('miner_gold',$changeNum);
        if(!$rec){
            M('store')->where('uid='.$id)->setInc('money',$money);
            msg('转换失败，请重新转换');
        }
        $data['uid'] = $id;
        $data['from'] = $money;
        $data['to'] = $changeNum;
        $data['time'] = time();
        $rmm = M('money_miner_log')->data($data)->add();
        if($rmm){
            msg('转换成功');
        }else{
            msg('转换失败');
        }
    }
}