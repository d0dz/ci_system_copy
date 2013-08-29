<?php $this->load->view('tem/header'); ?>

<div id="wrapper">
	<div class="row">
		<div class="span12">
			<div class="well">
			<center>
			<form action="<?=base_url()?>students/new_student" method="post">
			<p>ชื่อ : <input name="std_name" type="text" /></p>
			<!-- <p>รหัสนักเรียน : <input name="std_number" type="text" /></p> -->
			<p>อีเมลล์ : <input name="std_email" type="text" /></p>
			<p>โทรศัพท์ : <input name="std_tel" type="text" /></p>
			<!-- <p>ที่อยู่ : <textarea name="std_address"></textarea></p>
			<p>ชั้น : <select name="std_address">
						<option value="a1">อนุบาล 1</option>
						<option value="a2">อนุบาล 2</option>
						<option value="a3">อนุบาล 3</option>
						<option value="p1">ประถมศึกษาปีที่ 1</option>
						<option value="p2">ประถมศึกษาปีที่ 2</option>
						<option value="p3">ประถมศึกษาปีที่ 3</option>
						<option value="p4">ประถมศึกษาปีที่ 4</option>
						<option value="p5">ประถมศึกษาปีที่ 5</option>
						<option value="p6">ประถมศึกษาปีที่ 6</option>
					</select></p>
			<p>ห้อง : <select name="std_address">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
					</select></p>
			<p>รูป : <input name="std_pic" type="text" /></p>
			<p>ชื่อบิดา : <input name="std_fname" type="text" /></p>
			<p>เบอร์โทรบิดา : <input name="std_ftel" type="text" /></p>
			<p>ชื่อมารดา : <input name="std_mname" type="text" /></p>
			<p>เบอร์โทรมารดา : <input name="std_mtel" type="text" /></p>
			<p>ที่อยู่บิดามารดา : <textarea name="std_parentsaddress"></textarea></p> -->

			<p><input type="submit" value="Add Student" /></p>
			</form>
			</center>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('tem/footer'); ?>