<nav class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
		<button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
		<a href="<?php echo ROOTHOST_ADMIN;?>" class="navbar-brand"><i class="fa fa-calendar" aria-hidden="true"></i>  CALENDAR</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse" menu="">
		<div class="pull-right user_module" style="padding-top:8px; padding-right:10px;">
			<div class="btn-group form-profile bright">
			</div>
			<div class="btn-group form-profile ">
				<div class="action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<a href="#" id="nav_registry" ><span class='avatar-small'><i class="fa fa-user fa-2" aria-hidden="true"></i></span> <?php echo $UserLogin->getInfo('lastname').' '.$UserLogin->getInfo('firstname');?> </a><i class="fa fa-caret-down" aria-hidden="true"></i>
				</div>
				<ul class="dropdown-menu pull-right">
					<li><a href="<?php echo ROOTHOST_ADMIN;?>profile"><i class="fa fa-info-circle"></i> Thông tin tài khoản</a></li>
					<li><a href="<?php echo ROOTHOST_ADMIN;?>logout" rel="nofollow,noindex"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>