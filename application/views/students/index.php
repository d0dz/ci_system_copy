<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
				<body id="dt_example" class="ex_highlight_row">

				<style>
.right
{
float:right;

}
</style>
<div class="right"><?php echo anchor('students/new_student/', '<img src="'.base_url().'../ci_system/img/add_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>students/new_student">เพิ่มข้อมูลนักเรียน</a></div>

				
		
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อ</th>
								<th>อีเมลล์</th>
								<th>เบอร์โทร</th>
								<th>ปรับแต่ง</th>
							</tr>
						</thead>
						<tbody>
							 
							<?php
							if(!isset($students)){
								
							}else{
								$no=1;
								foreach($students as $r){
								?>	

									<tr>
									<td align="center"><?=$no?></td>
									<td><a href="<?=base_url()?>students/student/<?=$r['std_id']?>"><?=$r['std_name']?></a></td>
									<td><?=$r['std_email']?></td>
									<td align = "center"><?=$r['std_tel']?></td>

									<td align = "center">
									<?php echo anchor('students/edit/'.$r['std_id'], '<img src="'.base_url().'../ci_system/img/edit_icon.png" height="25" width="25">'); ?>&nbsp;
									<?php echo anchor('students/delete/'.$r['std_id'], '<img src="'.base_url().'../ci_system/img/delete_icon.png" height="25" width="25">'); ?>

									</td>
									</tr>
									<?php
									$no++;
								}
							}
							?>
							
						</tbody>
				</table>
			</body>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('tem/footer'); ?>