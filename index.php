<?php
require_once("global/libs/gfinit.php");
require_once("global/libs/gfconfig.php");
require_once("global/libs/gffunc.php");
require_once("ad/libs/cls.mysql.php");

date_default_timezone_set("Asia/Ho_Chi_Minh");
$month=date('m');
$year=date('Y');
?>
<!DOCTYPE html>
<html language='vi'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow" />
	<title>LỊCH HỌC LÁI XE</title>
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/bootstrap.min.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo ROOTHOST;?>global/css/font-awesome.min.css" type="text/css" media="all" >
	<script src="<?php echo ROOTHOST;?>global/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo ROOTHOST;?>global/js/bootstrap.min.js"></script>
</head>
<style>
table.calendar th,table.calendar td{border:#ccc 1px solid;}
table.calendar td{text-align:right;}
table.calendar .pre_month,table.calendar .nex_month{cursor:pointer;}
table.calendar td.cell{cursor:pointer;}
table.calendar td.curent{font-weight:bold;background:#bb66ff;}
table.calendar td.disable{background:#eee;color:#999;}
table.calendar td.action{background:#f00;color:#fff;font-weight: bold;cursor:pointer}
.txt_to_hour,.txt_from_hour {width:80px;}

#box_calendar {width:500px; text-align:center; margin:20px auto;}
.box{ margin:auto}
#tieude {font-weight:bold; font-size:24px;}
#frmview { text-align:center}
#frmview .form-control {
    display: inline !important; width: auto !important;
}
#frmview input[type='text'] {width:200px; margin:0 10px;}
#frmview input[type='submit'] {}
.cred {color: #f00;}
.cviolet {color: violet;}
</style>
<body>
<div class="container"><br>
	<form name="frmview" id="frmview" class="text-center" method="POST" action="#">
		<div class="box">
		<div id="tieude">LỊCH HỌC LÁI XE</div> 
		<input type="text" name="teacher" placeholder="Nhập mã giáo viên" class="form-control"/>
		<input type="text" name="student" placeholder="Nhập mã học viên" class="form-control"/>
		<input type="submit" name="cmdsave" value="Tìm kiếm" class="btn btn-primary"/>
		</div>
	</form>
	<div id="box_calendar"><div class="box">
		<table width='100%' class='calendar'>
			<thead>
				<tr>
					<th class='pre_month'><<</th>
					<th colspan='5' class='curent_month' align='center' data_month='<?php echo $month;?>' data_year='<?php echo $year;?>'>Tháng <?php echo $month.", $year";?></th>
					<th class='nex_month'>>></th>
				</tr>
				<tr>
					<th>CN</th><th>T2</th><th>T3</th><th>T4</th><th>T5</th><th>T6</th><th>T7</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table><br>
		<div><i class="fa fa-square cred"></i> Ngày đã có lịch 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<i class="fa fa-square cviolet"></i> Ngày hiện tại</div>
	</div></div>
</div>
</body></html>
<script>
$(document).ready(function(){
	getCalendar(<?php echo $month;?>,<?php echo $year;?>);
	$(window).resize(function (){resize()} )
	$('.pre_month').click(function(){
		var _month=$('.curent_month').attr('data_month');
		var _year=$('.curent_month').attr('data_year');
		_month--;
		if(_month==0){ _year--; _month=12;}		
		if(_month==13){ _year++; _month=1;}
		var _html="Tháng "+_month+", "+_year;
		$('.curent_month').html(_html);
		$('.curent_month').attr('data_month',_month);
		$('.curent_month').attr('data_year',_year);
		getCalendar(_month,_year)
	});
	$('.nex_month').click(function(){
		var _month=$('.curent_month').attr('data_month');
		var _year=$('.curent_month').attr('data_year');
		_month++;
		if(_month==13){ _year++; _month=1}		
		if(_month==0){ _year--;	_month=12}
		var _html="Tháng "+_month+", "+_year;
		$('.curent_month').html(_html);
		$('.curent_month').attr('data_month',_month);
		$('.curent_month').attr('data_year',_year);
		
		getCalendar(_month,_year)
	});
})
function getCalendar(_month,_year){
	var url='ajaxs/getCalendar.php';
	$.post(url,{'month':_month,'year':_year},function(req){
		$('table.calendar tbody').html(req);
		resize();
	})
}
function resize(){
	var _w=$('table.calendar .pre_month').width();
	$('table.calendar th').css({height:35+'px','text-align':'center'});
	$('table.calendar td').css({height:_w+'px','text-align':'center'});
}
</script>