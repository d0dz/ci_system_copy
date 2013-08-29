<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
			<center>

			<?php if($errors){ ?>
						<div class="alert alert-error"><?=$errors?></div>
						<? } ?>
			<form action="<?=base_url()?>schools/new_school" method="post">
			<p>ชื่อโรงเรียน : <input name="sc_name" type="text" /></p>
			<p>ที่อยู่: <textarea name="sc_address" textarea rows="5"></textarea></p>
			<p>โทรศัพท์ : <input name="sc_tel" type="text" /></p>

			
			

			<p><input type="submit" value="Add School" /></p>
			</form>
			</center>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>