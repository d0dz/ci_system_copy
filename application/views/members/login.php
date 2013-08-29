<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body>
					<center>

						<h3>Login</h3>
						<?=  isset($message) ? $message : "";?>
						<?php echo validation_errors();?>
							<?php echo form_open('auth/verifyUser'); ?>

							<input type="text" name="mem_user" placeholder="Username"/></br>

							<input type="password" name="mem_pass" placeholder="Password"/></br>

							<input type="submit" value="Login" name="submit" class="btn btn-primary"/> 

							<?php echo form_close(); ?>

					</center>
				</body>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>