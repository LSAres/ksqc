<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //左侧主菜单
    public function backstageSammaryPage(){
		$sp_id = session('sp_user');
		$power = M('nzspuser')->where('sp_id='.$sp_id)->getField('power');
		$this->assign('power',$power);
	
        $sp_username = session('sp_name');
        $this->assign('sp_username',$sp_username);
        $this->display();
    }

    public function outlogin(){
        session(null);
        redirect(U(MODULE_NAME.'/Login/index'));
    }
	
    public function gameNotice(){

		$this->display();
	}

}