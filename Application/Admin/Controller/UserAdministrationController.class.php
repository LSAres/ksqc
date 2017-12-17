<?php
namespace Admin\Controller;
use Think\Controller;
class UserAdministrationController extends CommonController {
    public function administrationPage(){
//        $start_time = strtotime(I('start_time'));
//        $end_time = strtotime(I('end_time'));
//
//        if($start_time && $end_time){
//            $where['time'] = array('between',"$start_time,$end_time");
//        }
//        $tb_user=M('user');
//
//        if(I('condition')){
//            $we = I('condition');
//            $value=trim(I('text'));
//            if($we=="username"){
//                $where[$we] =array('like',"%$value%");
//            }else {
//                $where[$we] = $value;
//            }
//        }
//
//        $pagesize =10;
//        $p = getpage($tb_user, $where, $pagesize);
//        $pageshow   = $p->show();
//
//        $userArr=$tb_user->where($where)
//            ->field('userid,account,username,lockuser,time,parent_id,identity_card,phone')
//            ->order('userid desc ')
//            ->select();
//
//        $this->assign(array(
//            'userArr'=>$userArr,
//            'pageshow'=>$pageshow,
//        ));
//        $this->display();
//        $this->display();
    }

}