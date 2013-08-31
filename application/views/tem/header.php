<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/bootstrap.css' ?>"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/datatable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/datatable/media/css/jquery.dataTables2.css">
	<link rel="stylesheet" href="<?= base_url(); ?>css/ui-lightness/jquery-ui-1.10.3.custom.css">

	<script type="text/javascript" src="<?= base_url(); ?>vendors/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendors/datatable/media/js/jquery.dataTables.js"></script>	
	<script src="<?= base_url(); ?>js/jquery-ui-1.10.3.custom.js"></script>
	<script src="<?= base_url(); ?>js/jquery-ui-1.10.3.custom.min.js"></script>
	
	<script type="text/javascript" charset="utf-8">
	var oTable;
	var mainTable;
		$(document).ready(function() {
			oTable = $('#example').dataTable(
				{
				"aoColumns": [ 
					null,
					null,
					null,
					null,
					{ "bSortable":    false }
				]
			});
			mainTable = $('#mainTable').dataTable();


$(".btn2").click(function () {   //เมื่อมีการคลิก class aa (ปุ่มเราถูกตั้งชื่อ class ว่า aa)
	$( "#dialog" ).dialog("open");  //คลิกปุ่มแล้ว ให้เปิด dialog ขึ้นมาโดยdialog มาจาก <div id=”dialog”  ที่โค๊ดด้านล่าง
});

$(document).ready(function() {
			$('#example2').dataTable();
		});

$("#dialog").dialog({
	title: "รายการค่าธรรมเนียม",
	bgiframe: true,
	autoOpen: false, //ให้เปิดเมื่อต้องการเท่านั้น
	height: '500',
	width: '50%',
	resizable: false, //สั่งให้ไม่สามารถย่อขยายได้
	modal: true , //สั่งให้มีฉากเบลอๆด้านหลัง dialog

	buttons: {
			OK: function() {
				addRow();
				clearCheck();
				$( this ).dialog( "close" );
			},
			
			close: function() {

                jQuery('#dialog').dialog('close');
				
			}
		
		}
	});

});



function amountTxtChange(){
	var sum = 0;
	
	$.each(mainTable.fnGetNodes(), function(index, value) {

		sum += $("#" + value.cells[2].childNodes[0].id).val() *  value.cells[3].childNodes[0].nodeValue;
	});

	$("#sumTxt").text(sum +"บาท") ;
}

		function addRow(){

			$.each(oTable.fnGetNodes(), function(index, value) {

			     if(value.cells[3].childNodes[1].checked==true){
			     	$('#mainTable').dataTable().fnAddData( [
					    mainTable.fnGetData().length + 1,
					    value.cells[1].childNodes[0].nodeValue,
					    "<input type='text' onblur='amountTxtChange();' class='amountTxt' id='"+value.cells[4].childNodes[1].attributes["value"].value+"' value='1'>",
					    value.cells[2].childNodes[0].nodeValue,
					    ]
					  );
			     }
			     	
			});

		}

		function clearCheck(){
			$.each(oTable.fnGetNodes(), function(index, value) {

			     if(value.cells[3].childNodes[1].checked==true){
			     	value.cells[3].childNodes[1].checked=false;
			     }
			     	
			});
		}


	</script>

	<meta charset="utf-8">
	<title></title>
</head>
<div class="container">
	<div class="row">
		<div class="span12">

			<div class="well">
				<center><h1>ระบบบริหารโรงเรียน</h1></center>
			</div>
		</div>
		<style>
			.right
			{
				float:right;

			}
		</style>
		<div class="span12">

			<?php if($this->session->userdata('mem_status')=='1'){ ?>
			<?php echo anchor('students/', '<img src="'.base_url().'../ci_system_copy/img/User-Group-icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/">ข้อมูลนักเรียน</a>
			<?php echo anchor('members/', '<img src="'.base_url().'../ci_system_copy/img/user1.png" height="35" width="35">'); ?><a href="<?=base_url()?>members/">ข้อมูลอาจารย์</a>
			<?php echo anchor('schools/', '<img src="'.base_url().'../ci_system_copy/img/school_icon_512.png" height="35" width="35">'); ?><a href="<?=base_url()?>schools/">ข้อมูลโรงเรียน</a>
			<div class="right"><?php echo anchor('auth/logout/', '<img src="'.base_url().'../ci_system_copy/img/logout_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>auth/logout">Logout</a></div>
			<? }else if($this->session->userdata('mem_status')=='2') { ?>
			<?php echo anchor('students/', '<img src="'.base_url().'../ci_system_copy/img/User-Group-icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/">ข้อมูลนักเรียน</a>
			<?php echo anchor('members/', '<img src="'.base_url().'../ci_system_copy/img/user1.png" height="35" width="35">'); ?><a href="<?=base_url()?>members/">ข้อมูลอาจารย์</a>
			<?php echo anchor('fee/', '<img src="'.base_url().'../ci_system_copy/img/bill_of_document.png" height="35" width="35">'); ?><a href="<?=base_url()?>fee/">ค่าธรรมเนียม</a>
			<?php echo anchor('payments/', '<img src="'.base_url().'../ci_system_copy/img/cash_register_256.png" height="35" width="35">'); ?><a href="<?=base_url()?>payments/">จ่ายเงิน</a>
			<div class="right"><?php echo anchor('auth/logout/', '<img src="'.base_url().'../ci_system_copy/img/logout_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>auth/logout">Logout</a></div>
			

			<?}else{?>
			
			<? } ?>
		</div>				
	</div>
