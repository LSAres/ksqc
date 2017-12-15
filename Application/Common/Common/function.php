<?php
/**
 * [msg 提示信息]
 * @param  [string] $message [提示信息]
 * @param  string $url     [url]
 */
function msg($message, $url = '') {
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	if (empty($url)) {
        echo '<script>alert("'.$message.'");javascript:history.back(-1);</script>';die;
	} else {
		echo '<script>alert("'.$message.'");</script><script>window.location.href='.$url.'</script>';die;
	}
}

/**
 * [getUser 获取用户信息]
 * @param  [type] $userId [userId]
 * @return [type]         [array]
 */
function getUser($userId) {
	$user = M('user')->where(array('id' => $userId))->find();
	return $user;
}