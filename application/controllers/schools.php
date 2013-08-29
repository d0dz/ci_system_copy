<?php

class Schools extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('school_model');

		if($this->session->userdata('mem_status')!='1'){
			redirect('auth/index');
		}

	}

	function index(){

		$data['schools']=$this->school_model->get_schools();
		$this->load->view('schools/index',$data);
	}

	function school($sc_id){

		$data['school']=$this->school_model->get_school($sc_id);
		$this->load->view('schools/school',$data);
	}

	function new_school(){

		if(!empty($_POST)){

			$this->load->library('form_validation');
			$frm = $this->form_validation;

			$config=array(
				array(
					'field'=>'sc_name',
					'label'=>'ชื่อโรงเรียน',
					'rules'=>'trim|required|min_length[3]'
					),
				array(
					'field'=>'sc_address',
					'label'=>'ที่อยู่โรงเรียน',
					'rules'=>'trim|required|min_length[3]'
					),
				array(
					'field'=>'sc_tel',
					'label'=>'เบอร์โทรศัพท์',
					'rules'=>'trim|numeric|required|min_length[9]|max_length[11]'
					)
				);
			$frm->set_rules($config);
			$frm->set_message("trim","กรุณากรอกข้อมูล  %s");
			$frm->set_message("required","กรุณากรอกข้อมูล  %s");
			$frm->set_message("numeric","กรุณากรอกข้อมูลเบอร์โทรเป็นตัวเลขเท่านั้น ");
			$frm->set_message("valid_email","กรุณากรอกอีเมลล์ให้ถูกต้อง เช่น   monXX@hotmail.com");
			$frm->set_message("min_length","เบอร์โทรศัพท์ไม่น้อยกว่า 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("max_length","เบอร์โทรศัพท์ไม่เกิน 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("greater_than","กรุณาเลือก %s ");

			if ($frm->run()==false){
				$data['errors']=validation_errors();
			}else{
				$data=array(
					'sc_name'=>$_POST['sc_name'],
					'sc_address'=>$_POST['sc_address'],
					'sc_tel'=>$_POST['sc_tel']
					);
				$this->db->set('crt_date', 'NOW()', FALSE);
				$this->school_model->insert($data);
				redirect("schools","refresh");
			}
		}else{
			$data = array('errors'=>false);
		}

		$this->load->view('schools/new_school',$data);
		
	}

	function edit($sc_id){

		
		if($_POST){

				$this->load->library('form_validation');
			$frm = $this->form_validation;

			$config=array(
				array(
					'field'=>'sc_name',
					'label'=>'ชื่อโรงเรียน',
					'rules'=>'trim|required|min_length[3]'
					),
				array(
					'field'=>'sc_address',
					'label'=>'ที่อยู่โรงเรียน',
					'rules'=>'trim|required|min_length[3]'
					),
				array(
					'field'=>'sc_tel',
					'label'=>'เบอร์โทรศัพท์',
					'rules'=>'trim|numeric|required|min_length[9]|max_length[11]'
					)
				);
			$frm->set_rules($config);
			$frm->set_message("trim","กรุณากรอกข้อมูล  %s");
			$frm->set_message("required","กรุณากรอกข้อมูล  %s");
			$frm->set_message("numeric","กรุณากรอกข้อมูลเบอร์โทรเป็นตัวเลขเท่านั้น ");
			$frm->set_message("valid_email","กรุณากรอกอีเมลล์ให้ถูกต้อง เช่น   monXX@hotmail.com");
			$frm->set_message("min_length","เบอร์โทรศัพท์ไม่น้อยกว่า 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("max_length","เบอร์โทรศัพท์ไม่เกิน 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("greater_than","กรุณาเลือก %s ");

			if ($frm->run()==false){
				$data['errors']=validation_errors();
			}else{
				$data=array(
					'sc_name'=>$_POST['sc_name'],
					'sc_address'=>$_POST['sc_address'],
					'sc_tel'=>$_POST['sc_tel']
					);
				$this->db->set('crt_date', 'NOW()', FALSE);
				$this->school_model->insert($data);
				redirect("schools","refresh");
			}
		}else{
			$data = array('errors'=>false);
		}

		$data['school']=$this->school_model->get_school($sc_id);
		$this->load->view('schools/edit_school',$data);
		
	}

	function delete($sc_id){

		$this->school_model->delete($sc_id);
		redirect(base_url().'schools');
	}
}