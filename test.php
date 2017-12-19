<?php
/*============================开始你的表演===============================*/

//连接数据库
date_default_timezone_set('Asia/Shanghai');
$mysql_database = 'ksqc';
$link = connect();

$rowAll = fetchAll('SELECT * FROM `nb_store`');
$all_minergold = 0;
$start = strtotime(date('Y-m-d', time()));
foreach ($rowAll as $key => $value) {
    //今天没买道具
    if ($value['last_buytool_time'] < $start) {
        continue;
    } else {
        $all_minergold += $value['today_buytool_minergold'];
    }
}
//获得今日所有玩家购买工具的挖矿分1%
$fenHong = intval($all_minergold/100);

print_r($rowAll);




//=============================以下为工具函数==============================
function connect(){
    $host="localhost";
    $username="root";
    $password="root";
    $dbName="ksqc";
    $charset = "utf8";
    //连接mysql
    $link=@mysql_connect($host,$username,$password) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());
    //设置字符集
    mysql_set_charset($charset);
    //打开指定的数据库
    mysql_select_db($dbName)or die('指定的数据库打开失败');    
    return $link;
}


function fetchAll($sql){
    $arr=array();
    if($res=mysql_query($sql)){
        if(mysql_num_rows($res)>0){
            while($row=mysql_fetch_assoc($res)){
                $arr[]=$row;
            };
            return $arr;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


/**
 * 更新操作
 * @param string $table 要更新的表的表名
 * @param array $arr    要更新的字段和值所组成的数组
 * @param str  $where    更新条件
 * @return int  $rows 返回受影响的行数
 *
 */
//update 表名 set 字段名='值',字段名='值',字段名='值' where ......
function update($table,$arr,$where=null){
    $str='';
    foreach($arr as $key=>$val){
        $str.=$key.'="'.$val.'",';
    }
    //更新的字段和值
    $str=substr($str,0,-1);
    //更新的条件
    $where=$where?'where '.$where:'';
    //更新的SQL语句
    $sql="update $table set $str $where";
    //执行更新
    if(mysql_query($sql)){
        if($rows=mysql_affected_rows()>0){
            return $rows;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function insert($table,$arr){
    //字段1,字段2,....
    $keys=join(',',array_keys($arr));
    //'值1','值2',....
    $values='"'.join('","',array_values($arr)).'"';
    //插入的SQL语句
    $sql="insert into {$table}({$keys}) values({$values})";
    //执行sql,返回最后一条记录的主键ID
    if(mysql_query($sql)){
        if(mysql_affected_rows()>0){
             return mysql_insert_id();
        }else{
            return false;
        }
    }else{
        return false;
    }
}

// function writeTxt($result){
// 	if (is_array($result)) {
// 		$str = implode('-----', $result);
// 	} else {
// 		$str = $result;
// 	}
// 	$fp = @fopen(dirname(__FILE__)."/123.txt", "a+");
// 	fwrite($fp, " $str \n");
// 	fclose($fp);
// 	exit;
// }

?>