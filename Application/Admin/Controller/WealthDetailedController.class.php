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

    //修改个人财富，并将操作记录到数据库中
    public function userCapitalOffset_RechangeT(){
        $id = I('post.id');
        $miner_gold = I('post.miner_gold');
        $diamonds = I('post.diamonds');
        $money = I('post.money');
        $brand = I('post.brand');
        if(!$id){
            echo "<script>alert('系统错误');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        if($miner_gold<0){
            echo "<script>alert('挖矿分数量不可为负');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        if($diamonds<0){
            echo "<script>alert('钻石分数量不可为负');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        if($money<0){
            echo "<script>alert('现金分数量不可为负');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        if($brand<0){
            echo "<script>alert('牌照分数量不可为负');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
        $storeInfo = M('store')->where('id='.$id)->find();
        $sp_id = session('sp_user');
        if($storeInfo['miner_gold']!=$miner_gold){
            if($storeInfo['miner_gold']>$miner_gold){
                $num = $storeInfo['miner_gold']-$miner_gold;
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="挖矿分减少";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
            if($miner_gold>$storeInfo['miner_gold']){
                $num = $miner_gold-$storeInfo['miner_gold'];
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="挖矿分增加";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
        }
        if($storeInfo['diamonds']!=$diamonds){
            if($storeInfo['diamonds']>$diamonds){
                $num = $storeInfo['diamonds']-$diamonds;
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="钻石分减少";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
            if($diamonds>$storeInfo['diamonds']){
                $num = $diamonds-$storeInfo['diamonds'];
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="钻石分增加";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
        }
        if($storeInfo['money']!=$money){
            if($storeInfo['money']>$money){
                $num = $storeInfo['money']-$money;
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="现金分减少";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
            if($money>$storeInfo['money']){
                $num = $money-$storeInfo['money'];
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="现金分增加";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
        }
        if($storeInfo['brand']!=$brand){
            if($storeInfo['brand']>$brand){
                $num = $storeInfo['brand']-$brand;
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="牌照分减少";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
            if($brand>$storeInfo['brand']){
                $num = $brand-$storeInfo['brand'];
                $kk['sp_id']=$sp_id;
                $kk['userid']=$storeInfo['uid'];
                $kk['num']=$num;
                $kk['type']="牌照分增加";
                $kk['time']=time();
                M('capital')->data($kk)->add();
            }
        }

        $res = M('store')->where('id='.$id)->setField('miner_gold',$miner_gold);
        $rec = M('store')->where('id='.$id)->setField('diamonds',$diamonds);
        $rem = M('store')->where('id='.$id)->setField('money',$money);
        $rek = M('store')->where('id='.$id)->setField('brand',$brand);

        //暂不写入管理员操作日志
//        $nn['sp_id']=$sp_id;
//        $nn['userid']=$storeInfo['uid'];
//        $nn['type']="积分冲减";
//        $nn['time']=time();
//        $rnn=M('management_operation')->data($nn)->add();
        if($res&&$rec){
            echo "<script>alert('修改成功');location.href='".U('WealthDetailed/userCapitalOffset')."'</script>";
            exit();
        }else{
            echo "<script>alert('修改成功');location.href='".U('WealthDetailed/userCapitalOffset')."'</script>";
            exit();
        }
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