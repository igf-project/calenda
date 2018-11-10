<?php
session_start();
require_once("../../../global/libs/gfinit.php");
require_once("../../../global/libs/gfconfig.php");
require_once("../../libs/cls.mysql.php");
require_once("../../libs/cls.user.php");
require_once("../../libs/cls.permission.php");
$objuser=new CLS_USER;
$obj_permission=new CLS_PERMISSION;
$objdata=new CLS_MYSQL;
 if(!$objuser->isLogin()){
	die("E01");
} 
$userid=isset($_POST['userid'])?(int)$_POST['userid']:0;
$sql="DELETE FROM `tbl_user` WHERE `id`=$userid";
if($objdata->Query($sql)){}
else{die('E04');}
?>