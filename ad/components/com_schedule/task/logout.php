<?php
defined("isHOME") or die("Can't acess this page, please come back!");
global $UserLogin;
$UserLogin->LOGOUT();
echo '<script language="javascript">window.location="index.php"</script>';
?>