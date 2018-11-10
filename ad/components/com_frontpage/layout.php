<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$month=date('m');
$year=date('Y');
$uid = '';
$PERMISSION = $UserLogin->getInfo('isroot');
if($PERMISSION!=1) {
	$uid = $UserLogin->getInfo('id');
	$fullname = $UserLogin->getInfo('lastname').' '.$UserLogin->getInfo('firstname');
}?>
<div class="body">
	<div class='col-md-12 body_col_right'>
		<div class='row'>
			<div class="com_header color">
				<i class="fa fa-list" aria-hidden="true"></i> Lịch giảng dạy
			</div>
		</div>
		<div class='row'>
			<div class="col-md-4"><div class='row'>
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
			</table>
			</div></div>
			<div class="col-md-6">
				<br><br><br><br>
				<div>GHI CHÚ:</div><br>
				<div><i class="fa fa-square cred"></i> Ngày đã có lịch</div><br>
				<div><i class="fa fa-square cviolet"></i> Ngày hiện tại</div>
			</div>
		</div>
	</div>
	
</div>
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