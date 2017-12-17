<?php
namespace Admin\Controller;
use Think\Controller;
class UserAdministrationController extends CommonController {
    public function administrationPage(){
        $start_time = strtotime(I('start_time'));
        $end_time = strtotime(I('end_time'));

        if($start_time && $end_time){
            $where['time'] = array('between',"$start_time,$end_time");
        }
        $tb_user=M('user');

        if(I('condition')){
            $we = I('condition');
            $value=trim(I('text'));
            if($we=="username"){
                $where[$we] =array('like',"%$value%");
            }else {
                $where[$we] = $value;
            }
        }

        $pagesize =10;
        $p = getpage($tb_user, $where, $pagesize);
        $pageshow   = $p->show();

        $userArr=$tb_user->where($where)
            ->field('id,account,username,lockuser,add_time,parent_id')
            ->order('id desc ')
            ->select();
        $this->assign(array(
            'userArr'=>$userArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function updatelockuser(){
        $id = I('get.userid');
        $userInfo = M('user')->where('id='.$id)->find();
        $res=0;
        if($userInfo['lockuser']==1){
            $res = M('user')->where('id='.$id)->setField('lockuser',0);
        }
        if($userInfo['lockuser']==0){
            $res = M('user')->where('id='.$id)->setField('lockuser',2);
        }
        if($userInfo['lockuser']==2){
            $res = M('user')->where('id='.$id)->setField('lockuser',1);
        }

        if($res){
            echo "<script>alert('修改状态成功');</script>";
            echo "<script>window.location.href='".U('UserAdministration/administrationPage')."'</script>";
        }else{
            echo "<script>alert('修改状态失败，请重新操作');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }

    public function updateUserDataPage(){
        $id = I('get.userid');
        $userInfo = M('user')->where('id='.$id)->find();
        $this->assign('userInfo',$userInfo);
        $this->display();
    }

    //接收修改的用户资料
    public function edituserInfo(){
        $userid = I('post.userid');
        $username = I('post.username');
        $account = I('post.account');
        $password = I('post.password');
        $paypassword = I('post.paypassword');
        if($username==null&&$account==null&&$password==null&&$paypassword==null){
            echo "<script>alert('无任何修改');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        if($username!=null){
            $data['username']=$username;
        }
        if($account!=null){
            $data['account']=$account;
        }
        if($password!=null){
            //=============登录密码加密==============
            $salt= substr(md5(time()),0,3);
            $password=md5(md5(trim($password)).$salt);
            $data['salt']=$salt;
            $data['password']=$password;
        }
        if($paypassword!=null){
            //=============安全密码加密==============
            $two_salt= substr(md5(time()),0,3);
            $two_password=md5(md5(trim($paypassword)).$two_salt);
            $data['safety_salt'] = $two_salt;
            $data['safety_pw'] = $two_password;
        }

        //向用户表修改用户资料
        $res = M('user')->where('id='.$userid)->save($data);
        if($res){
            echo "<script>alert('修改成功');</script>";
            echo "<script>window.location.href='".U('UserAdministration/administrationPage')."'</script>";
        }else{
            echo "<script>alert('修改失败');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }

    public function deleteuser(){
        $userid = I('get.userid');
        if(!$userid){
            echo "<script>alert('系统错误，请重新操作');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        $res = M('user')->where('id='.$userid)->delete();
        $rec = M('store')->where('uid='.$userid)->delete();
        $rem = M('coal_layer')->where('uid='.$userid)->delete();
        if($res){
            echo "<script>alert('删除成功');</script>";
            echo "<script>window.location.href='".U('UserAdministration/administrationPage')."'</script>";
        }else{
            echo "<script>alert('删除失败');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }

}