<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body>
					<center>

						<h3>Register Members</h3>

						<?php if($errors){ ?>
						<div class="alert alert-error"><?=$errors?></div>
						<? } ?>

						<form action="<?=base_url()?>members/register" method="post">
							<p>Username : <input name="mem_user" type="text"></p>
							<p>Password : <input name="mem_pass" type="password"></p>
							<p>Password Confirmed : <input name="mem_pass2" type="password"></p>

							<?php
						
									?></p>

									<p>School : <select id='school' name='school'>
										<option value=''>Select</option>
										<?php if($schools->num_rows() >0){
											foreach ($schools->result() as $school) { ?>
											<option value=<?=$school->sc_id;?>><?=$school->sc_name;?></option>
											<?php
										}

									}

									?>
								</select></p>
								<p>Name : <input name="mem_name" type="text"></p>
								<p>Email : <input name="mem_email" type="text"></p>
								<p>Tel : <input name="mem_tel" type="text"></p>
								<p><input type="submit" value="Register Member"></p>

							</form>
						</center>
					</body>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('tem/footer'); ?>