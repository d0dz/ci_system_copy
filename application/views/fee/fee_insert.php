<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body>
					<center>

						<?php echo form_open(""); ?>
							<div id="stylized" class="myform">
								
							
							<table width="526" align="center">

								<tr>
								  <td height="48" colspan="2" class="style1" ><p>เพิ่มรายการ</p></td>
							  </tr>
								<tr>
								  <td width="157" height="24" ><div align="right">ชื่อรายการ : </div></td>
								  <td width="357"><input  type="text" name="txt_name" value="<?php echo set_value("txt_name"); ?>"/><br><?php echo form_error("txt_name", "<font color='error'>", "</font>"); ?> </td>
							  </tr>
								<tr>
								  <td><div align="right">จำนวน (บาท): </div></td>
								  <td><input type="text" name="txt_amount" value="<?php echo set_value("txt_amount"); ?>">
                                      <span class="style1">*</span><br>
                                      <?php echo form_error("txt_amount", "<font color='error'>", "</font>"); ?> </td>
							  </tr>
									<tr>
									  <td height="33" colspan="2">
								        <div align="center">
							          <input id="bts" type="submit" name="btsave"  value="บันทึก">
							          &nbsp;<?php echo anchor("fee","ยกเลิก");?></div></td>
								    </tr>
									
						  </table>

									<?php echo form_close(); ?>
						
						
						
						
				</body>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('tem/footer'); ?>