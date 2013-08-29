<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<?php if(!isset($school)){ ?>
				<? }else{ ?>

				<p><?=$school['sc_name'] ?></p>
				<p><?=$school['sc_address'] ?></p>
				<p><?=$school['sc_tel'] ?></p>

				<? } ?>
				
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>