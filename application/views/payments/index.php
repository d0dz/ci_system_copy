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
					<div class="row">
						<div class="span8">
							<p>ค้นหานักเรียน : ชื่อ , รหัส</p>
							<form class="form-search">
								<input type="text" class="input-medium search-query">
								<button type="submit" class="btn">ค้นหา</button>
							</form>
							<p>ออกใบเสร็จ เด็กชาย xxxxxxxx</p>
							<p>รหัสนักศึกษา : xxxxxx</p>
							<p><button class="btn btn-large btn-primary" type="button">เพิ่มค่าธรรมเนียม</button></p>
						
							<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">

						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อ</th>
								<th>อีเมลล์</th>
								<th>เบอร์โทร</th>
								<th>รร.</th>
								<th>ปรับแต่ง</th>
							</tr>
						</thead>
						<tbody>
							 
							<?php
							if(!isset($members)){
								
							}else{
								$no=1;
								foreach($members as $r){
								?>	

									<tr>
									<td align="center"><?=$no?></td>
									<td><!--<a href="<?=base_url()?>members/member/<?=$r['mem_id']?>">--><?=$r['mem_name']?><!--</a>--></td>
									<td><?=$r['mem_email']?></td>
									<td align = "center"><?=$r['mem_tel']?></td>
									<td align = "center"><?=$r['sc_name']?></td>

									<td align = "center">
									<?php echo anchor('members/edit/'.$r['mem_id'], '<img src="'.base_url().'../ci_system_copy/img/edit_icon.png" height="25" width="25">'); ?>&nbsp;
									<?php echo anchor('members/delete/'.$r['mem_id'], '<img src="'.base_url().'../ci_system_copy/img/delete_icon.png" height="25" width="25">',array("onclick"=>"javascript:return confirm('คุณต้องการลบหรือไม่');")) ?>

									</td>
									</tr>
									<?php
									$no++;
								}
							}
							?>
							
						</tbody>
				</table>


						</div>

						<div class="right">
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
								<p>รวมมลูค่า <span class="input-small uneditable-input">xx,xxx บาท</span></p>
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
								<p><p><button class="btn btn-large btn-primary" type="button">พิมพ์ใบเสร็จ</button></p></p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</body>

	<?php $this->load->view('tem/footer'); ?>