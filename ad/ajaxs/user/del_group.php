<?php
session_start();
require_once("../../../global/libs/gfinit.php");
require_once("../../../global/libs/gfconfig.php");
require_once("../../libs/cls.mysql.php");
require_once("../../libs/cls.user.php");
$objuser=new CLS_USER;
$objdata=new CLS_MYSQL;
/*if(!$objuser->isLogin()){
	die("E01");
}*/
$id=isset($_GET['id'])?(int)$_GET['id']:0;
$objuser->getListGroup(" AND id=$id");
$r=$objuser->Fetch_Assoc();
if($r['isroot']==1) die('E02');
$sql="DELETE FROM tbl_user_group WHERE id='$id'";
$objdata->Exec($sql);
$objuser->getGroupUser(0);
?>