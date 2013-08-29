<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body>
					<center>

						<h3>Login</h3>
						<?php if($error==1){ ?>
						<p>Your Username / Password did not match.</p>
						<? } ?>
						<form action="<?=base_url()?>members/login" method="post" class="form-horizontal">
							<p>Username : <input type="text" name="mem_user"/></p>
							<p>Password : <input type="password" name="mem_pass"/></p>
							<p><input type="submit" value="Login" /></p>

						</form>

					</center>
				</body>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>