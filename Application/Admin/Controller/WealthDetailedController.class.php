<?php
namespace Admin\Controller;
use Think\Controller;

class WealthDetailedController extends CommonController{
    public function userCapitalOffset(){
		$where = null;
	    if(I('post.')){
		    $a = I('post.account');
	        if($a == null){
			   $where = null;
			}else{
			   $userInfo = M('user')->where("account='".$a."'")->find();
			   if($userInfo){		    
					$where['uid'] = $userInfo['id'];
			   }else{
					echo "<script>alert('该帐号不存在');</script>";
					echo "<script>javascript:history.back(-1);</script>";die;
			   }
			}
		}
        $tb_new = M('store');
        $pagesize =10;
        $p = getpage($tb_new, $where, $pagesize);
        $pageshow   = $p->show();
		
 
        $userArr=$tb_new->where($where)
            ->order('id desc ')
            ->select();
        foreach ($userArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $userArr[$k]['account']=$userInfo['account'];
            $userArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'userArr'=>$userArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function userCapitalOffset_Rechange(){
            $id = I('get.id');
            $storeInfo = M('store')->where('id='.$id)->find();
            $userInfo = M('user')->where('id='.$storeInfo['uid'])->find();
            $this->assign('userInfo',$userInfo);
            $this->assign('storeInfo',$storeInfo);
            $this->display();
    }

    //挖矿分记录
    public function minerGoldRecord(){
        $where = null;
        $tb_miner_gold = M('miner_gold_log');
        $pagesize =10;
        $p = getpage($tb_miner_gold, $where, $pagesize);
        $pageshow   = $p->show();


        $minerGoldArr=$tb_miner_gold->where($where)
            ->order('id desc ')
            ->select();
        foreach ($minerGoldArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $minerGoldArr[$k]['account']=$userInfo['account'];
            $minerGoldArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'minerGoldArr'=>$minerGoldArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    //钻石分记录
    public function diamondsRecord(){
        $where = null;
        $tb_diamonds = M('diamonds_log');
        $pagesize =10;
        $p = getpage($tb_diamonds, $where, $pagesize);
        $pageshow   = $p->show();


        $diamondsArr=$tb_diamonds->where($where)
            ->order('id desc ')
            ->select();
        foreach ($diamondsArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $diamondsArr[$k]['account']=$userInfo['account'];
            $diamondsArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'diamondsArr'=>$diamondsArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function moneyRecord(){
        $where = null;
        $tb_money = M('money_log');
        $pagesize =10;
        $p = getpage($tb_money, $where, $pagesize);
        $pageshow   = $p->show();


        $moneyArr=$tb_money->where($where)
            ->order('id desc ')
            ->select();
        foreach ($moneyArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $moneyArr[$k]['account']=$userInfo['account'];
            $moneyArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'moneyArr'=>$moneyArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function minerMoneyRecord(){
        $where = null;
        $tb_miner_money = M('miner_money_log');
        $pagesize =10;
        $p = getpage($tb_miner_money, $where, $pagesize);
        $pageshow   = $p->show();


        $minerMoneyArr=$tb_miner_money->where($where)
            ->order('id desc ')
            ->select();
        foreach ($minerMoneyArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $minerMoneyArr[$k]['account']=$userInfo['account'];
            $minerMoneyArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'minerMoneyArr'=>$minerMoneyArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }
    public function moneyMinerRecord(){
        $where = null;
        $tb_money_miner = M('money_miner_log');
        $pagesize =10;
        $p = getpage($tb_money_miner, $where, $pagesize);
        $pageshow   = $p->show();


        $moneyMinerArr=$tb_money_miner->where($where)
            ->order('id desc ')
            ->select();
        foreach ($moneyMinerArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $moneyMinerArr[$k]['account']=$userInfo['account'];
            $moneyMinerArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'moneyMinerArr'=>$moneyMinerArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function reservoirRecord(){
        $where = null;
        $tb_reservoir = M('reservoir_log');
        $pagesize =10;
        $p = getpage($tb_reservoir, $where, $pagesize);
        $pageshow   = $p->show();


        $reservoirArr=$tb_reservoir->where($where)
            ->order('id desc ')
            ->select();
        foreach ($reservoirArr as $k=>$v){
            $userInfo = M('user')->where('id='.$v['uid'])->find();
            $reservoirArr[$k]['account']=$userInfo['account'];
            $reservoirArr[$k]['username']=$userInfo['username'];
        }
        $this->assign(array(
            'reservoirArr'=>$reservoirArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }
}