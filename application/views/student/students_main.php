<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body id="dt_example" class="ex_highlight_row">

					
					<?php 
					
							/*echo "<center>";
							echo "<h4>";
							 foreach($query as $row){}
								echo 'ยินดีต้อนรับ  : '. $row->sc_name;
								echo '<br>';
								//echo 'ผู้ใช้งาน : คุณ'.$row->mem_name;
								echo "<h4>";
								echo"</center>";*/
								?>

								<style>
									.right
									{
										float:right;

									}
								</style>

								<div class="right"><?php echo anchor('students/insert', '<img src="'.base_url().'../ci_system_copy/img/add_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/insert">เพิ่มรายการ</a></div>
								<!-- <div class="right"><?php echo anchor("students/insert", "<img src='".base_url()."img/icon/add_icon.png'  width='35' height='35' title='เพิ่มข้อมูล'>เพิ่มข้อมูลนักเรียน"). "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp"; ?>  -->
								<center>



									<h3>ข้อมูลนักเรียน</h3>


									<table cellpadding="0" cellspacing="0" border="0" class="display" id="example2" width="100%">
										<thead>
											<tr>
												<th>ลำดับ</th>
												<th>ชื่อ - นามสกุล</th>
												<th>รหัสนักเรียน</th>
												<th>ชั้น</th>
												<th>ห้อง</th>
												<th>ปรับแต่ง</th>
											</tr>
										</thead>
										<tbody>	
											<?php 

											$no = 1;
											if (!isset($query)) {
												echo "<tr><td colspan='6' align='center'>---no data--</td></tr>";



											} else foreach($query as $row){

												echo "<tr>";
												echo "<td align='center'>".$no."</td>";

					//echo "<td>";

					//echo "</td>";
												echo "<td> " .$row->std_antecedent.$row->std_name ."</td>";
												echo "<td>". $row->std_number ."</td>";
												echo "<td align='center'>". $row->class_name . "</td>";
												echo "<td align='center'>". $row->std_room ."</td>";
												echo "<td>";
												echo anchor("students/edit/".$row->std_id,"<img src='".base_url()."../ci_system_copy/img/edit_icon.png'  width='25' height='25' title='แก้ไขข้อมูล'>") . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp";
												echo anchor("students/del/".$row->std_id, "<img src='".base_url()."../ci_system_copy/img/delete_icon.png'  width='25' height='25' title='ลบข้อมูล'>",array("onclick"=>"javascript:return confirm('คุณต้องการลบหรือไม่');"));
												echo "</td>";
												echo "</tr>";
												$no++;
											}?>
										</tbody>
			<!-- <tfoot>
					<tr>
						<th>&nbsp</th>
						<th>&nbsp</th>
						<th>&nbsp</th>
						<th>&nbsp</th>
						<th>&nbsp</th>
						<th>&nbsp</th>
									
									
					</tr>
				</tfoot> -->
			</table>
			
		</center>
	</body>
</div>
</div>
</div>
</div>

<?php $this->load->view('tem/footer'); ?>