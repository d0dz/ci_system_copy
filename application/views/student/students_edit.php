<?php $this->load->view('tem/header'); ?>
 
<div id="wrapper">
    <div class="row">
        <div class="span12">
            <div class="well">
 
                 
                <center>

							<?php echo form_open("students/edit/".$this->uri->segment(3)); ?>
							<div id="stylized" class="myform">
								
								<?php foreach($query as $rs){}	 ?>					
							
							<table width="1276" align="center">

								<tr>
								  <td height="48" colspan="4" class="style1" ><p>ข้อมูลส่วนตัวนักเรียน</p></td>
							  </tr>
								<tr>
								  <td height="24" ><div align="right">คำนำหน้า : </div></td>
								  <td><?php 
								 
								 

								 	$options = array(
                  							'none'  => 'กรุณาเลือกคำนำหน้า',
                 							'เด็กชาย'    => 'เด็กชาย',
                  							'เด็กหญิง'   => 'เด็กหญิง',                  							
                							);
									echo form_dropdown('txt_antecedent', $options );
									
									
								 
								 ?>
                                    <span class="style1">*</span> </td>
								  <td><div align="right">ชื่อ - นามสกุล : </div></td>
								  <td><input type="text" name="txt_name" value="<?php echo $rs->std_name ;?>">
                                    <span class="style1">*</span><br><?php echo form_error("txt_name", "<font color='error'>", "</font>"); ?> </td>
							  </tr>
								<tr>
									<td width="313" height="24" >
										<div align="right">รหัสนักเรียน :
								  </div></td>
								  <td width="397">  
								    
								    <input  type="text" name="txt_number" value="<?php echo $rs->std_number ;?>"/>
                                      <span class="style1">*</span><br><?php echo form_error("txt_number", "<font color='error'>", "</font>"); ?> </td>
									<td width="245"><div align="right">เบอร์โทรศัพท์ : </div></td>
									<td width="301"><input type="text" name="txt_tel" value="<?php echo $rs->std_tel ;?>"/>
                                      <span class="style1">*</span><br><?php echo form_error("txt_tel", "<font color='error'>", "</font>"); ?>
									</td>
							  </tr>
								<tr>
                                  <td height="24"><div align="right">อีเมลล์ : </div></td>
                                  <td><input type="text" name="txt_email" value="<?php echo $rs->std_email ;?>"/>
                                    <span class="style1">*</span><br><?php echo form_error("txt_email", "<font color='error'>", "</font>"); ?><br></td>
                                  <td><div align="right">ชั้นเรียน :</div></td>
                                  <td><?php 
								 
								 	$options = array(
                  							'none'  => 'กรุณาเลือกชั้นเรียน',
                 							'1'    => 'อนุบาล 1',
                  							'2'   => 'อนุบาล 2', 
                  							'3'    => 'อนุบาล 3',
                  							'4'   => 'ประถมศึกษาปีที่ 1',
                  							'5'   => 'ประถมศึกษาปีที่ 2',
                  							'6'   => 'ประถมศึกษาปีที่ 3',
                  							'7'   => 'ประถมศึกษาปีที่ 4',
                  							'8'   => 'ประถมศึกษาปีที่ 5',
                  							'9'   => 'ประถมศึกษาปีที่ 6',
                  							'10'   => 'มัธยมศึกษาปีที่ 1',
                  							'11'   => 'มัธยมศึกษาปีที่ 2',
                  							'12'   => 'มัธยมศึกษาปีที่ 3',
                  							'13'   => 'มัธยมศึกษาปีที่ 4',
                  							'14'   => 'มัธยมศึกษาปีที่ 5',
                  							'15'   => 'มัธยมศึกษาปีที่ 6',                  							
                							);
									echo form_dropdown('txt_class', $options );
								 
								 ?>
                                    <span class="style1">*</span> </td>
							  </tr>
									<tr>
									  <td height="24"><div align="right">รูปภาพนักเรียน : </div></td>
									  <td><?php echo anchor("upload","อัพโหลดรูปภาพนักเรียน");?></td>
									  <td><div align="right">ห้องเรียน :</div></td>
									  <td><input type="text" name="txt_room" value="<?php echo $rs->std_room ;?>">
                                        <span class="style1">*</span> <br><?php echo form_error("txt_room", "<font color='error'>", "</font>"); ?> </td>
							  		</tr>
									<tr>
									  <td height="24"><div align="right"></div></td>
									  <td colspan="2"><div align="center"></div></td>
									  <td>&nbsp;</td>
							  		</tr>
									<tr>
									  <td height="37" colspan="4"><p>ข้อมูลผู้ปกครอง</p></td>
								    </tr>
									<tr>
									  <td height="21"><div align="right">ชื่อ - นามสกุล บิดา : </div></td>
									  <td><input type="text" name="txt_fname" value="<?php echo $rs->std_fname ;?>">
                                        <span class="style1">*</span><br><?php echo form_error("txt_fname", "<font color='error'>", "</font>"); ?> </td>
									  <td><div align="right">เบอร์โทรศัพท์ :</div></td>
									  <td><input type="text" name="txt_ftel" value="<?php echo $rs->std_ftel ;?>"><br>
								      <?php echo form_error("txt_ftel", "<font color='error'>", "</font>"); ?> </td>
							  		</tr>
									<tr>
									  <td height="21"><div align="right">ชื่อ - นามสกุล มารดา : </div></td>
									  <td><input type="text" name="txt_mname" value="<?php echo $rs->std_mname ;?>">
                                        <span class="style1">*</span><br><?php echo form_error("txt_mname", "<font color='error'>", "</font"); ?> </td>
									  <td><div align="right">เบอร์โทรศัพท์ : </div></td>
									  <td><input type="text" name="txt_mtel" value="<?php echo $rs->std_mtel ;?>"/><br>
                                        <?php echo form_error("txt_mtel", "<font color='error'>", "</font>"); ?> </td>
							  		</tr>
									<tr>
									  <td height="21"><div align="right"></div></td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							  		</tr>
									<tr>
									  <td height="39" colspan="4"><p>ข้อมูลที่อยู่ที่สามารถติดต่อได้สะดวก</p></td>
								    </tr>
									<tr>
									  <td height="21"><div align="right">ที่อยู่ : </div></td>
									  <td><textarea name="txt_address" value=""><?php echo $rs->std_parentaddress ;?></textarea>
								      <span class="style1">*</span><br><?php echo form_error("txt_address", "<font color='error'>", "</font>"); ?> </td>
									  <td>&nbsp;</td>
									  <td>&nbsp;
								      </td>
							  		</tr><tr>
									  <td height="21"><div align="right">จังหวัด : </div></td>
									  <td><input type="text" name="txt_provice" value="<?php echo $rs->std_provice ;?>"/>
								      <span class="style1">*</span><br><?php echo form_error("txt_provice", "<font color='error'>", "</font>"); ?></td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							  		</tr>
									<tr>
									  <td height="21"><div align="right">รหัสไปรณีย์ : </div></td>
									  <td><input type="text" name="txt_zipcode" value="<?php echo $rs->std_zipcode ;?>"/>
								      <span class="style1">*</span><br><?php echo form_error("txt_zipcode", "<font color='error'>", "</font>"); ?></td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							  		</tr>
									<tr>
									  <td height="21">&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
							  </tr>
									<tr>
									  <td height="33" colspan="4">
								        <div align="center">
							          <input class="btn large btn-primary" id="bts" type="submit" name="btsave"  value="บันทึก">
							          &nbsp;<?php echo anchor("students","ยกเลิก",'class="btn large btn-primary"');?></div></td>
								    </tr>
									
						  </table>

									<?php echo form_close(); ?>
						  </center>
					</body>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('tem/footer'); ?>