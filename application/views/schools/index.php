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
<div class="right"><?php echo anchor('schools/new_school/', '<img src="'.base_url().'../ci_system/img/add_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>schools/new_school">เพิ่มข้อมูลโรงเรียน</a></div>

				
		
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อ</th>
								<th>ที่อยู่</th>
								<th>เบอร์โทร</th>
								<th>ปรับแต่ง</th>
							</tr>
						</thead>
						<tbody>
							 
							<?php
							if(!isset($schools)){
								
							}else{
								$no=1;
								foreach($schools as $r){
								?>	

									<tr>
									<td align="center"><?=$no?></td>
									<td><!--<a href="<?=base_url()?>schools/school/<?=$r['sc_id']?>">--><?=$r['sc_name']?><!--</a>--></td>
									<td><?=$r['sc_address']?></td>
									<td align = "center"><?=$r['sc_tel']?></td>

									<td align = "center">
									<?php echo anchor('schools/edit/'.$r['sc_id'], '<img src="'.base_url().'../ci_system/img/edit_icon.png" height="25" width="25">'); ?>&nbsp;
									<?php echo anchor('schools/delete/'.$r['sc_id'], '<img src="'.base_url().'../ci_system/img/delete_icon.png" height="25" width="25">',array("onclick"=>"javascript:return confirm('คุณต้องการลบหรือไม่');")); ?>

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