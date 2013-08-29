<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<?php if(!isset($member)){ ?>
				<? }else{ ?>

				<p><?=$member['mem_name'] ?></p>
				<p><?=$member['mem_email'] ?></p>
				<p><?=$member['mem_tel'] ?></p>

				<? } ?>
				
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>