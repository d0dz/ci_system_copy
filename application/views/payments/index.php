<?php $this->load->view('tem/header'); ?>
<style>
	.right
	{
		float:right;

	}
</style>

<body id="dt_example" class="ex_highlight_row">
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="well">
					<center><div><h3>ออกใบเสร็จ</h3></div></center>
					<div class="row">
						<div class="span8">

							<p>ค้นหานักเรียน : ชื่อ , รหัส</p>

							<form action="<?php echo site_url('payments/search_keyword');?>" method = "post" class="form-search">
								<input type="text" name = "keyword" class="input-medium search-query">
								<button type="submit" class="btn">ค้นหา</button>
							</form>
							<?php
							if(!isset($key)){
								

							}

							else if($key == null) {
								echo "ไม่มีนักเรียนชื่อนี้";

							}else{
								foreach($key as $row){
									?>
									<table>
										<tr>
											<td><h4><?php echo $row->std_antecedent?>&nbsp;</h4></td>
											<td><h4><?php echo $row->std_name?>&nbsp;&nbsp;&nbsp;</h4></td>
											<td><h4>รหัสนักเรียน&nbsp;&nbsp;</h4></td>
											<td><h4><?php echo $row->std_number?></h4></td>
										</tr>
									</table>

									<?php   
								}
							}
							?>

							<div><input class="btn2 btn-large btn-primary" name="addfee" type="button" value="เพิ่มค่าธรรมเนียม"/></div><br>

							<div id="dialog" style="display:none;">

								<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
									<thead>
										<tr>
											<th>ลำดับ</th>
											<th>รายการ</th>
											<th>จำนวน(บาท)</th>
											<th>เลือกรายการ</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

										<?php
										if(!isset($fee)){
											
										}else{
											$no=1;
											foreach($fee as $r){
												?>	

												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$r['fee_name']?></td>
													<td align = "center"><?=$r['fee_amount']?></td>
													<td align = "center">
													<input type="checkbox" id="feechk_<?=$r['fee_id'];?>" value='check'>
										
													
													</td>
													<td>
														<input type="hidden" value='<?=$r['fee_id'];?>'>	
													</td>
												</tr>
												<?php
												$no++;
											}
										}
										?>

									</tbody>
								</table>

							</div>  <!-- end dialog -->


							<table cellpadding="0" cellspacing="0" border="0" class="display" width="100%" id="mainTable">
								<caption><h4>ชื่อรายการ</h4></caption>
								<thead>
									<tr>
										<th>รายการที่</th>
										<th>ชื่อรายการ</th>
										<th>จำนวน</th>
										<th>ราคา</th>
									</tr>
								</thead>
								<tbody class="table table-hover">
	
								</tbody>
							</table>


						</div>

						<div class="4" style="float: right;">
							<p><?php  
								$_month_name = array("01"=>"มกราคม",  "02"=>"กุมภาพันธ์",  "03"=>"มีนาคม",    
									"04"=>"เมษายน",  "05"=>"พฤษภาคม",  "06"=>"มิถุนายน",    
									"07"=>"กรกฎาคม",  "08"=>"สิงหาคม",  "09"=>"กันยายน",    
									"10"=>"ตุลาคม", "11"=>"พฤศจิกายน",  "12"=>"ธันวาคม"); 

								$vardate=date('Y-m-d');
								$yy=date('Y');
								$mm =date('m');$dd=date('d'); 
								if ($dd<10){
									$dd=substr($dd,1,2);
								}
								$date=$dd ." ".$_month_name[$mm]."  ".$yy+= 543;
								echo $date;
								?></p>

								<p>เลขที่ออกใบเสร็จ : Auto</p>
								<p><h4>รวมมลูค่า : <span id='sumTxt'></span></h4></p>
								<p>ปีการศึกษา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ภาคเรียนที่</p>
								<p>
									<select class="span2">
										<option>- -</option>
										<option><?=$yy+5?></option>
										<option><?=$yy+4?></option>
										<option><?=$yy+3?></option>
										<option><?=$yy+2?></option>
										<option><?=$yy+1?></option>
										<option><?=$yy?></option>
										<option><?=$yy-1?></option>
										<option><?=$yy-2?></option>
										<option><?=$yy-3?></option>
										<option><?=$yy-4?></option>
										<option><?=$yy-5?></option>
										<!-- <option>m</option> -->
									</select>

									<select class="span1">
										<option>- -</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
								</p>
								<p><button class="btn btn-large btn-primary" type="button">พิมพ์ใบเสร็จ</button></p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</body>

	<?php $this->load->view('tem/footer'); ?>