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
	
	public function userCapitalOffset_RechangeT(){

	}
}