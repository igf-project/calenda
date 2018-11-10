<?php
if($UserLogin->isLogin()) {
	$PERMISSION = $UserLogin->getInfo('isroot');
}?>
<div id="left_sidebar">
	<div class="sidebar_top"></div>
	<div class="sidebar_body">
		<a href="<?php echo ROOTHOST_ADMIN;?>" class='toggle' data-toggle="tooltip" data-placement="right" data-original-title="Trang Admin"><i class="fa fa-desktop" aria-hidden="true"></i> <span>Trang Admin <i class="fa fa-caret-left pull-right toggle" aria-hidden="true"></i></span></a>
		<a href="<?php echo ROOTHOST_ADMIN;?>schedule" title="Lịch học"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Lịch học</span></a>
		<a href="<?php echo ROOTHOST_ADMIN;?>members" title="Học viên"><i class="fa fa-user" aria-hidden="true"></i> <span>Học viên</span></a>
		<?php if($UserLogin->permission()): ?>
			<a href="<?php echo ROOTHOST_ADMIN;?>user" title="Giáo viên"><i class="fa fa-user-secret" aria-hidden="true"></i> <span>Giáo viên</span></a>
			<a href="<?php echo ROOTHOST_ADMIN;?>course" title="Khóa học"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span>Khóa học</span></a>
		<?php endif; ?>
		<a href="<?php echo ROOTHOST_ADMIN;?>report" title="Báo cáo"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Báo cáo</span></a>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
		
		//left_sidebar_toggle();
		var _w=$('#left_sidebar').outerWidth();
		$('#site_body').css({'margin-left':_w+'px'});
		$('#left_sidebar .fa-caret-left').click(function(){
			left_sidebar_toggle();
			return false;
		})
		function left_sidebar_toggle(){
		var _w=$('#left_sidebar').outerWidth();
		if(_w>50){
			$('#left_sidebar').css({'width':'50px'})
			$('#left_sidebar .sidebar_body').addClass('text-center');
			$('#left_sidebar .toggle i').removeClass('fa-caret-left');
			$('#left_sidebar .toggle i').addClass('fa-caret-right');
			$('#left_sidebar a span').hide();
			$('#site_body').css({'margin-left':'50px'});
		}else{
			$('#left_sidebar').css({'width':'220px'})
			$('#left_sidebar .sidebar_body').removeClass('text-center');
			$('#left_sidebar .toggle i').removeClass('fa-caret-right');
			$('#left_sidebar .toggle i').addClass('fa-caret-left');
			$('#left_sidebar a span').show();
			$('#site_body').css({'margin-left':'220px'});
		}
	}
	})
</script>