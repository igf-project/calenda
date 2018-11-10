<?php
session_start();
require_once("../../../global/libs/gfinit.php");
require_once("../../../global/libs/gfconfig.php");
require_once("../../libs/cls.mysql.php");
require_once("../../libs/cls.user.php");
require_once("../../libs/cls.permission.php");
$objuser=new CLS_USER;
$obj_permission=new CLS_PERMISSION;
$gid=isset($_GET['gid'])?(int)$_GET['gid']:0;
// Check quyền
if(!$objuser->isLogin()) die("E01");
if(!$objuser->permission()) die('E02');

$name='';$intro='';
if($gid>0){
	$objuser->getListGroup(" AND id=$gid");
	$r=$objuser->Fetch_Assoc();
	$name=$r['name'];
	$intro=$r['intro'];
}
?>
<form id="frm-register" class="form-horizontal"  name="frm-register" method="" action="" enctype="multipart/form-data">
	<?php if($gid>0):?>
		<input type="hidden" name="txt_gid" id="txt_gid" value="<?php echo $gid;?>">
		<input type="hidden" name="cmd_update">
	<?php endif; ?>
	<div class="form-group">
		<div class="col-md-12">
			<label>Tên :</label>
			<input type="text" id="txt_name" name="txt_name" class="form-control" value="<?php echo $name;?>" placeholder="Tên nhóm" required>
		</div>
	</div>
	<label>Giới thiệu :</label>
	<textarea class="form-control" id="txt_intro" name="txt_intro" rows=5><?php echo $intro;?></textarea><br>
	<div class="clearfix"></div><br>
	<button type="button" class="btn btn-primary" id="cmd_save"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
	<button type="button" class="btn btn-default" id="cmd_cancel"><i class="fa fa-undo" aria-hidden="true"></i> Hủy</button>
</form>
<div class="clearfix"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cmd_save').click(function(){
			var data = $('#frm-register').serializeArray();
			var url='ajaxs/user/process_add_group.php'; 
			$.post(url,data,function(req){
				if(req=='E01'){showMess('Bạn chưa đăng nhập, xin vui lòng đăng nhập!','error');}
				if(req=='E03'){showMess('Không có quyền thêm danh mục con cho nhóm này!','error');}
				else {
					$('.user_group_list').html(req);
					showMess('Success!','success');
				}
			});
		});
		$('#cmd_cancel').click(function(){
			$('#myModalPopup .modal-header .modal-title').html('Sửa thông tin người dùng');
			$('#myModalPopup .modal-body').html('<p>Loadding...</p>');
			$('#myModalPopup').modal('hide');
		});
	})
</script>