<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
	public function _initialize(){

        $userId = session('userId');
        $account = session('account');
        //矿区
        $area = session('area');
        if(empty($userId) || empty($account)) {
            redirect(U('Login/login'));
        } else {
            session('userId', $userId, 3600*3);
            session('account', $account, 3600*3);
            session('area', $area, 3600*3);
        }
        if (empty($area)) {
            $area = 'coal_layer';
            session('area', $area, 3600*3);
        }
    }
}