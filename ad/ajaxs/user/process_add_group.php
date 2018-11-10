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
if(!$objuser->isLogin()) die("E01");
if(!$objuser->permission()) die('E02');

$gid=isset($_POST['txt_gid'])?(int)$_POST['txt_gid']:0;
$name=isset($_POST['txt_name'])?addslashes($_POST['txt_name']):'';
$intro=isset($_POST['txt_intro'])?addslashes($_POST['txt_intro']):'';

if(isset($_POST['cmd_update'])){
	$sql="UPDATE `tbl_user_group` SET `name`='$name',`intro`='$intro' WHERE id='$gid'";
	$objdata->Query($sql);
}else{
	$sql="INSERT INTO tbl_user_group(`name`,`intro`) VALUES ('$name','$intro')";
	$objdata->Query($sql);
}
$objuser->getGroupUser(0);
?>