<?php
namespace Admin\Controller;
use Think\Controller;
class ParameterProbabilityController extends CommonController{
    public function functionValueResetPage(){
        if(!I('post.')){
            $parameterInfo = M('function_parameters')->where('id=1')->find();
            $this->assign('parameterInfo',$parameterInfo);
            $this->display();
        }else{
            $t=I('post.');
            foreach($t as $v){
                if($v == ''){
                    echo "<script>alert('任何参数不可为空');</script>";
                    echo "<script>javascript:history.back(-1);</script>";die;
                }
            }
            $fund_fee = I('post.fund_fee');
            $bonus_fee = I('post.bonus_fee');
            $cash_fee = I('post.cash_fee');
            $declaration_fee = I('post.declaration_fee');
            $res = M('function_parameters')->where('id=1')->setField('fund_fee',$fund_fee);
            $rea = M('function_parameters')->where('id=1')->setField('bonus_fee',$bonus_fee);
            $reb = M('function_parameters')->where('id=1')->setField('cash_fee',$cash_fee);
            $rec = M('function_parameters')->where('id=1')->setField('declaration_fee',$declaration_fee);
            echo "<script>alert('修改成功');</script>";
            echo "<script>window.location.href='".U('ParameterProbability/functionValueResetPage')."'</script>";

        }
    }

    public function helpDocumentList(){
        $where = null;
        $tb_helpintroduce = M('helpintroduce');
        $pagesize =10;
        $p = getpage($tb_helpintroduce, $where, $pagesize);
        $pageshow   = $p->show();

        $helpArr=$tb_helpintroduce->where($where)
            ->field('id,Title,content,time')
            ->order('id desc ')
            ->select();

        $this->assign(array(
            'helpArr'=>$helpArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
    }

    public function addHelpDocument(){
        $this->display();
    }

    public function addhelpintroduce(){
        $t=I('post.');
        foreach($t as $v){
            if($v == ''){
                echo "<script>alert('请确认输入完成');</script>";
                echo "<script>javascript:history.back(-1);</script>";die;
            }
        }
        $Title = I('post.Title');
        $content = I('post.content');
        $data['Title'] = $Title;
        $data['content'] = $content;
        $data['time'] = time();
        $res = M('helpintroduce')->data($data)->add();
        if($res){
            echo "<script>alert('添加成功');</script>";
            echo "<script>window.location.href='".U('ParameterProbability/helpdocumentList')."'</script>";
        }else{
            echo "<script>alert('添加失败');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }

    public function edithelpintroduce(){
        $id = I('post.id');
        $content = I('post.content');
        $res = M('helpintroduce')->where('id='.$id)->setField('content',$content);
        if($res){
            echo "<script>alert('修改成功');</script>";
            echo "<script>window.location.href='".U('ParameterProbability/helpdocumentList')."'</script>";
        }else{
            echo "<script>alert('修改失败');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }
    public function deletehelpintroduce(){
        $id = I('get.id');
        $res = M('helpintroduce')->where('id='.$id)->delete();
        if($res){
            echo "<script>alert('删除成功');</script>";
            echo "<script>window.location.href='".U('ParameterProbability/helpdocumentList')."'</script>";
        }else{
            echo "<script>alert('删除失败');</script>";
            echo "<script>javascript:history.back(-1);</script>";die;
        }
    }
	
	public function capitalLogPage(){
		$where = null;
        $tb_helpintroduce = M('capital');
        $pagesize =10;
        $p = getpage($tb_helpintroduce, $where, $pagesize);
        $pageshow   = $p->show();

        $helpArr=$tb_helpintroduce->where($where)
            ->order('id desc ')
            ->select();
		foreach($helpArr as $k=>$v){
			$sp_name = M('nzspuser')->where('sp_id='.$v['sp_id'])->getField('sp_username');
			$account = M('user')->where('userid='.$v['userid'])->getField('account');
			$helpArr[$k]['sp_name']=$sp_name;
			$helpArr[$k]['account']=$account;
		}
        $this->assign(array(
            'helpArr'=>$helpArr,
            'pageshow'=>$pageshow,
        ));
        $this->display();
	}
}
