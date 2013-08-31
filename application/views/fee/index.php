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

					<!--<?php 
						
						if(!isset($fee)){
								
					
				    	}else foreach($fee as $row){}
				    		echo "<center>";
				    		echo "<h4>";
				    		//echo 'ยินดีต้อนรับ  : '. $row->sc_name;
				    		echo 'ยินดีต้อนรับ  : '. $row['sc_name'];
				    		
							echo "<h4>";
							echo"</center>";
						
						
							
					?>-->



<div class="right"><?php echo anchor('fee/new_fee/', '<img src="'.base_url().'../ci_system_copy/img/add_icon.png" height="35" width="35">'); ?><a href="<?=base_url()?>fee/new_fee">เพิ่มรายการ</a></div>

				
		<center><h3>ข้อมูลค่าธรรมเนียม</h3></center>
					<table cellpadding="0" cellspacing="0" border="0" class="display" id="example2" width="100%">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รายการ</th>
								<th>จำนวน(บาท)</th>
								<th>ปรับแต่ง</th>
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
									<td><?=$r['fee_name']?><!--</a>--></td>
									<td><?=$r['fee_amount']?></td>
									<td align = "center">
									<?php echo anchor('fee/edit/'.$r['fee_id'], '<img src="'.base_url().'../ci_system_copy/img/edit_icon.png" height="25" width="25">'); ?>&nbsp;
									<?php echo anchor('fee/delete/'.$r['fee_id'], '<img src="'.base_url().'../ci_system_copy/img/delete_icon.png" height="25" width="25">',array("onclick"=>"javascript:return confirm('คุณต้องการลบหรือไม่');")); ?>

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