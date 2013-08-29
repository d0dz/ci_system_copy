<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body>
					 
					 <?php 
					
							echo "<center>";
							echo "<h4>";
							 foreach($query as $row){}
								echo 'ยินดีต้อนรับ  : '. $row->sc_name;
								echo '<br>';
								//echo 'ผู้ใช้งาน : คุณ'.$row->mem_name;
								echo "<h4>";
						echo"</center>";
					?>
					 
				
<h5><center> ค่าธรรมเนียม </center></h5>



</body>
				</div>
			</div>
		</div>
	</div>


<?php $this->load->view('tem/footer'); ?>