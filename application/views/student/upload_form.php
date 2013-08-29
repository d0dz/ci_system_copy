<DOCTYPE HTML>
	<HTML>
		<HEAD>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendors/datatable/media/css/jquery.dataTables.css">
			<script type="text/javascript" src="<?= base_url(); ?>vendors/jquery.js"></script>
			<script type="text/javascript" src="<?= base_url(); ?>vendors/datatable/media/js/jquery.dataTables.min.js"></script>
			<style type="text/css">
				<!--
				.style1 {color: #FF0000}
				-->
			</style>

			<title>ระบบบริหารโรงเรียน</title>
			
		</head>
		<body>
			<br>
			<div class ="container" >
				<div class ="rows" >
					<div class ="span12">
						<div class="well">
							<center>
								<H1>ระบบบริหารโรงเรียน</H1>
							</center>
						</div>
					</div>
				</div>
			</div>

<div class ="container" >
				<div class ="rows" >
					<div class ="span12">
						<div class="well">

<?php echo form_open_multipart("upload/upload_file")?>

	<div align="center"></div>
	<div align="center">
	   อัพโหลดรูปภาพนักเรียน : <input type="file" name="picture" size="20"/>
	  &nbsp;
	    <input type="submit" name="bt" value="อัพโหลด"/>
  
      <?php echo form_close();?>
  
  </div>
					  </div>
				  </div>
				  </div>
			  </div>

</body>
</html>