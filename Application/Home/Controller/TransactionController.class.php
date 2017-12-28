<?php
namespace Home\Controller;

use Think\Controller;

class TransactionController extends CommonController
{
    //挖矿分转现金分
    public function minerChangeMoney(){
      $this->ajaxReturn(I('post.number'));
        $id = session('userId');
        $miner_gold = I('post.miner_gold');
        $paypassword = I('post.paypassword');
        $userInfo = M('user')->where('id='.$id)->find();
        $storeInfo = M('store')->where('uid='.$id)->find();
        if(!is_numeric($miner_gold)){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '数值输入错误，请输入纯数字'
            ));
        }
        if($miner_gold<1){
          $this->ajaxReturn(array(
            'status' => 'error',
            'message' => '数值输入错误，请重新输入'
          ));
        }
        if($storeInfo['miner_gold']<$miner_gold){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '挖矿分不足'
            ));
        }
        $paypasswordT=md5(md5($paypassword).$userInfo['safety_salt']);
        if($paypasswordT!=$userInfo['safety_pw']){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '二级密码错误'
            ));
        }
        $yu=$miner_gold%1000;
        if ($yu!=0) {
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '请输入1000的倍数'
            ));
        }
        $res = M('store')->where('uid='.$id)->setDec('miner_gold',$miner_gold);
        if(!$res){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败,请重新转换'
            ));
        }
        $changeNum = $miner_gold/1000;
        $rec = M('store')->where('uid='.$id)->setInc('money',$changeNum);
        if(!$rec){
            M('store')->where('uid='.$id)->setInc('miner_gold',$miner_gold);
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败，请重新转换'
            ));
        }
        $data['uid'] = $id;
        $data['from'] = $miner_gold;
        $data['to'] = $changeNum;
        $data['time'] = time();
        $rmm = M('miner_money_log')->data($data)->add();
        if($rmm){
            $this->ajaxReturn(array(
              'status' => 'success',
              'message' => '转换成功'
            ));
        }else{
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败'
            ));
        }
    }

    //现金分转挖矿分
    public function moneyChangeMiner(){
      $this->ajaxReturn(I('post.number'));
        $id = session('userId');
        $money = I('post.money');
        $paypassword = I('post.paypassword');
        $userInfo = M('user')->where('id='.$id)->find();
        $storeInfo = M('store')->where('uid='.$id)->find();
        if(!is_numeric($money)){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '数值输入错误，请输入纯数字'
            ));
        }
        if($money<1){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '数值输入错误，请重新输入'
            ));
        }
        if($storeInfo['money']<$money){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '现金分不足'
            ));
        }
        $paypasswordT=md5(md5($paypassword).$userInfo['safety_salt']);
        if($paypasswordT!=$userInfo['safety_pw']){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '二级密码错误'
            ));
        }

        $res = M('store')->where('uid='.$id)->setDec('money',$money);
        if(!$res){
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败,请重新转换'
            ));
        }
        $changeNum = $money*1000;
        $rec = M('store')->where('uid='.$id)->setInc('miner_gold',$changeNum);
        if(!$rec){
            M('store')->where('uid='.$id)->setInc('money',$money);
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败，请重新转换'
            ));
        }
        $data['uid'] = $id;
        $data['from'] = $money;
        $data['to'] = $changeNum;
        $data['time'] = time();
        $rmm = M('money_miner_log')->data($data)->add();
        if($rmm){
            $this->ajaxReturn(array(
              'status' => 'success',
              'message' => '转换成功'
            ));
        }else{
            $this->ajaxReturn(array(
              'status' => 'error',
              'message' => '转换失败'
            ));
        }
    }

    //积分赠送
    public function scoreGiveAway()
    {
      $uid = session('userId');
      $db_store = M('store');
      $db_user = M('user');
      $db_zhuanzhang = M('zhuanzhang');
      $score_number = I('post.score_number');
      $score_account = I('post.score_account');
      $score_type = I('post.score_type');
      foreach (I('post.') as $key => $value) {
        if (empty(trim($value))) {
          $this->ajaxReturn(array(
            'status' => 'error',
            'message' => '请输入全部内容'
          ));
        }
      }
//$this->ajaxReturn($score_account);
      $friend_id = $db_user->where(array('account' => $score_account))->getField('id');
      if (empty($friend_id)) {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '该用户不存在'
        ));
      }
      if ($uid == $friend_id) {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '不能转给自己'
        ));
      }

      if ($score_type == '挖矿分') {
        $db = 'miner_gold';
      } else if ($score_type == '现金分') {
        $db = 'money';
      }

      $my_score = $db_store->where(array('uid' => $uid))->getField($db);
      if ($my_score < $score_number) {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '积分不足'
        ));
      }

      $decreaseStatus = $db_store->where(array('uid' => $uid))->setDec($db, $score_number);
      $data = [
        'uid' => $uid,
      ];
      $increaseStatus = $db_store->where(array('uid' => $friend_id))->setInc($db, $score_number);

      $data3 = [
        'from' => $uid,
        'to' => $friend_id,
        'number' => $score_number,
        'type' => $score_type
      ];
      $addStatus = $db_zhuanzhang->add($data3);

      $fathers_gold = $db_store->where(array('uid' => $uid))->getField($db);
      if ($addStatus && $decreaseStatus && $increaseStatus) {
          $this->ajaxReturn(array(
            'status' => 'success',
            'fathers_gold' => $fathers_gold,
            'score_type' => $score_type,
            'message' => '转账成功'
          ));
      } else {
        $this->ajaxReturn(array(
          'status' => 'error',
          'message' => '转账失败'
        ));
      }

    }

}
