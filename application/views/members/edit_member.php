<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">

				
				<center>

					<?php if($success==1){?>

					<div class="alert alert-success">Update Success!</div>
					<? } ?>

					<form action="<?=base_url()?>members/edit/<?=$member['mem_id']?>" method="post">

						<p>ชื่อ : <input name="mem_name" type="text" value="<?=$member['mem_name']?>"></p>
						<p>อีเมลล์ : <input name="mem_email" type="text" value="<?=$member['mem_email']?>"></p>
						<p>โทรศัพท์ : <input name="mem_tel" type="text" value="<?=$member['mem_tel']?>"></p>
						
						<p>School : <select id='school' name='school'>

							<!-- <option value=''>Select</option> -->
							<?php if($schools->num_rows() >0){
								foreach ($schools->result() as $school) {
									$chk = $school->sc_id == $member['sc_id'] ? 'selected="true"' : "";

									?>
									<option value='<?=$school->sc_id;?>' <?=$chk;?> ><?=$school->sc_name;?></option>
									<?php
								}

							}

							?></select>
							
						</p>
						
						
						<input type="submit" value="Edit Member">
					</form>
				</center>


			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>