<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{
	public function _initialize(){

        $userId = session('userId');;
        $mobile = session('mobile');;
        if(empty($userId) || empty($mobile)) {
            redirect(U('Login/login'));
        } else {
            session('userId', $userId, 3600*3);
            session('mobile', $mobile, 3600*3);
        }
        
    }

    public function area()
    {
    	$arr = [
    		1 => ['miner_num' => 5000000,'brand_num' => 800],
    		2 => ['miner_num' => 20000000,'brand_num' => 2000],
    		3 => ['miner_num' => 50000000,'brand_num' => 5000],
    		4 => ['miner_num' => 100000000,'brand_num' => 10000],
    	];
        return $arr;
    }
}