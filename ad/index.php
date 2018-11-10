<?php
session_start();
define("isHOME",true);
require_once("../global/libs/gfinit.php");
require_once("../global/libs/gfconfig.php");
require_once("../global/libs/gffunc.php");
require_once("libs/cls.mysql.php");
require_once("libs/cls.user.php");
require_once("libs/cls.course.php");
require_once("libs/cls.schedule.php");
$UserLogin = new CLS_USER();
?>
<!DOCTYPE html>
<html language='vi'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<link rel="shortcut icon" href="images/igf_logo.ico">
	<link rel="apple-touch-icon" href="images/igf_logo.ico">
	<link rel="apple-touch-icon" sizes="72x72" href="images/igf_logo.ico">
	<link rel="apple-touch-icon" sizes="114x114" href="images/igf_logo.ico">
	<title>IGF CELENDAR - CONTROL PANEL</title>
	<link rel="shortcut icon" href="<?php echo ROOTHOST;?>global/img/igf_logo.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/bootstrap.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/font-awesome.min.css" type="text/css" media="all" >
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/select2.min.css" type="text/css" media="all" >
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/bootstrap-multiselect.css" type="text/css" media="all" >
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/bootstrap-datetimepicker.min.css" type="text/css" media="all" >
	<link rel="stylesheet" href="<?php echo ROOTHOST_ADMIN;?>css/style.min.css?v=1" type="text/css" />
	<link rel="stylesheet" href="<?php echo ROOTHOST_ADMIN;?>css/style.responsive.min.css?v=1" type="text/css" />
	<script src="<?php echo ROOTHOST;?>global/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/bootstrap.min.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/select2.min.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/bootstrap-multiselect.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/moment.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/bootstrap-datetimepicker.min.js"></script>
	
	<script src="<?php echo ROOTHOST_ADMIN;?>js/script.min.js"></script>
	<script>	
		var _w=0;
		$(document).ready(function(){
			_w=$(window).height();
			$('.body_body').css({'min-height':(_w-51)+'px'})
		})
		function showMess(mess,type){
			var _title='';var _html="";
			switch(type){
				case 'error': 
				_title="<span>Lỗi</span>"; 
				_html="<p class='alert alert-danger'>"+mess+"</p>";
				break;
				case 'alert': 
				_title="<span>Cảnh báo</span>"; 
				_html="<p class='alert alert-warning'>"+mess+"</p>";
				break;
				default:  
				_title="<span>Thông báo</span>"; 
				_html="<p class='alert alert-info'>"+mess+"</p>";	
				break;
			}
			$('#myModalPopup .modal-dialog').addClass('modal-sm');
			$('#myModalPopup .modal-header .modal-title').html(_title);
			$('#myModalPopup .modal-body').html(_html);
			$('#myModalPopup').modal('show');
		}
	</script>
</head>
<body>
	<div id="notification" style="display: none;"></div>
	<?php
	if(!$UserLogin->isLogin()){
		include_once(COM_PATH."com_user/task/login.php");
	}else{
		?>
		<div class='container-fluid' id="wapper">
			<div id="site_header">
				<?php include_once('modules/mod_main_nav/layout.php');?>
			</div>
			<div id="site_body">
				<div class="body_top"></div>
				<div class="body_body">
					<?php 
					$com=isset($_GET['com'])?$_GET['com']:'frontpage';
					if(!is_file(COM_PATH.'com_'.$com.'/layout.php')){$com='frontpage';}
					include_once(COM_PATH.'com_'.$com.'/layout.php');
					?>
				</div>
			</div>
		</div>
		<div id="myModalPopup" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"></h3>
					</div>
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<?php include_once('modules/mod_left_sidebar/layout.php');?>
		<?php 
	} ?>
</body>
</html>