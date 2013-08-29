<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(). 'css/bootstrap.css' ?>"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/datatable/media/css/jquery.dataTables.css">

	<script type="text/javascript" src="<?= base_url(); ?>vendors/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendors/datatable/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').dataTable();
		});
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
		<div class="span12">

			<?php if($this->session->userdata('mem_status')=='1'){ ?>
			<?php echo anchor('students/', '<img src="'.base_url().'../ci_system_copy/img/User-Group-icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/">ข้อมูลนักเรียน</a>
			<?php echo anchor('members/', '<img src="'.base_url().'../ci_system_copy/img/user1.png" height="35" width="35">'); ?><a href="<?=base_url()?>members/">ข้อมูลอาจารย์</a>
			<?php echo anchor('schools/', '<img src="'.base_url().'../ci_system_copy/img/school_icon_512.png" height="35" width="35">'); ?><a href="<?=base_url()?>schools/">ข้อมูลโรงเรียน</a>
			<?php echo anchor('auth/logout/', '<img src="'.base_url().'../ci_system_copy/img/logout_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>auth/logout">Logout</a>
			<? }else if($this->session->userdata('mem_status')=='2') { ?>
			<?php echo anchor('students/', '<img src="'.base_url().'../ci_system_copy/img/User-Group-icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/">ข้อมูลนักเรียน</a>
			<?php echo anchor('members/', '<img src="'.base_url().'../ci_system_copy/img/user1.png" height="35" width="35">'); ?><a href="<?=base_url()?>members/">ข้อมูลอาจารย์</a>
			<?php echo anchor('auth/logout/', '<img src="'.base_url().'../ci_system_copy/img/logout_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>auth/logout">Logout</a>

			<?}else{?>
			
			<? } ?>
		</div>				
	</div>
