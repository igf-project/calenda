<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$month=date('m');
$year=date('Y');
?>
<link href="http://hoangtucoc.com/simsodep/templates/igf/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
<style>
table.calendar th,table.calendar td{border:#ccc 1px solid;}
table.calendar td{text-align:right;}
table.calendar .pre_month,table.calendar .nex_month{cursor:pointer;}
table.calendar td.cell{cursor:pointer;}
table.calendar td.curent{font-weight:bold;background:#bb66ff;}
table.calendar td.disable{background:#eee;color:#999;}
table.calendar td.action{background:#f00;color:#fff;}
</style>
<div class='col-md-6'>
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
</div>
<script src='http://hoangtucoc.com/simsodep/templates/igf/js/jquery-1.11.3.min.js'></script>
<script src='http://hoangtucoc.com/simsodep/templates/igf/bootstrap/js/bootstrap.min.js'></script>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sự kiện</h4>
      </div>
      <div class="modal-body">
      </div>
    </div>
  </div>
</div>