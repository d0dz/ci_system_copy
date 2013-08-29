<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<?php if(!isset($student)){ ?>
				<? }else{ ?>

				<p><?=$student['std_name'] ?></p>
				<p><?=$student['std_email'] ?></p>
				<p><?=$student['std_tel'] ?></p>

				<? } ?>
				
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>