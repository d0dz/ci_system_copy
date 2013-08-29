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
<div class="right"><?php echo anchor('members/register/', '<img src="'.base_url().'../ci_system_copy/img/add_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>members/register">เพิ่มช้อมูลอาจารย์</a></div>
				
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
			</body>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('tem/footer'); ?>