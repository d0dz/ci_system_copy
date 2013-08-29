<?php

class Members extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('member_model');

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

	}

	function index(){

		$data['members']=$this->member_model->get_members();
		$this->load->view('members/index',$data);
	}




	function member($mem_id){
		
		$data['member']=$this->member_model->get_member($mem_id);
		$this->load->view('members/member',$data);
	}


	function register(){

		if(!empty($_POST)){

			$this->load->library('form_validation');
			$frm = $this->form_validation;

			$config=array(
				array(
					'field'=>'mem_user',
					'label'=>'Username',
					'rules'=>'trim|required|min_length[3]|is_unique[sc_member.mem_user]'
					),
				array(
					'field'=>'mem_pass',
					'label'=>'Password',
					'rules'=>'trim|required|min_length[3]'
					),
				array(
					'field'=>'mem_pass2',
					'label'=>'Password Confirmed',
					'rules'=>'trim|required|min_length[3]|matches[mem_pass]'
					),
				array(
					'field'=>'mem_name',
					'label'=>'Name',
					'rules'=>'trim|required|min_length[3]|max_length[100]|is_unique[sc_member.mem_name]'
					),
				array(
					'field'=>'mem_email',
					'label'=>'Email',
					'rules'=>'trim|required|is_unique[sc_member.mem_email]|valid_email'
					),
				array(
					'field'=>'mem_tel',
					'label'=>'Tel',
					'rules'=>'trim|numeric|required||max_length[11]|is_unique[sc_member.mem_tel]'
					)
				);

			$frm->set_rules($config);
			$frm->set_message("trim","กรุณากรอกข้อมูล  %s");
			$frm->set_message("required","กรุณากรอกข้อมูล  %s");
			$frm->set_message("numeric","กรุณากรอกข้อมูลเป็นตัวเลขเท่านั้น ");
			$frm->set_message("valid_email","กรุณากรอกอีเมลล์ให้ถูกต้อง เช่น   monXX@hotmail.com");
			$frm->set_message("min_length","เบอร์โทรศัพท์ไม่น้อยกว่า 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("max_length","เบอร์โทรศัพท์ไม่เกิน 10 ตัว  เช่น 087627XXXX");
			$frm->set_message("greater_than","กรุณาเลือก %s ");
			// $this->load->library('form_validation');
			// $this->form_validation->set_rules($config);
			if($frm->run() == FALSE){
				$data['errors']=validation_errors();
				// $this->load->view('members/register',$config);
			}else{

				$data=array(
					'mem_user'=>$_POST['mem_user'],
					'mem_pass'=>sha1($_POST['mem_pass']),
					'mem_name'=>$_POST['mem_name'],
					'mem_email'=>$_POST['mem_email'],
					'mem_tel'=>$_POST['mem_tel'],
					'sc_id'=>$_POST['school'],
					'mem_status'=>2
					);

				$this->load->model('member_model');
				$this->db->set('crt_date', 'NOW()', FALSE);
				$memid=$this->member_model->create_member($data);
				$this->session->set_userdata('mem_id',$memid);

				redirect('members');
			}
		}else{
			$data = array('errors'=>false);
		}

		$data['schools'] = $this->member_model->get_school();
		$this->load->helper('form');
		$this->load->view('members/register',$data);
	}

	function edit($mem_id){

		if($_POST){

			$this->load->library('form_validation');
			$frm = $this->form_validation;

			$config=array(
				
				array(
					'field'=>'mem_name',
					'label'=>'Name',
					'rules'=>'trim|required|min_length[3]|max_length[100]'
					),
				array(
					'field'=>'mem_email',
					'label'=>'Email',
					'rules'=>'trim|required|valid_email'
					),
				array(
					'field'=>'mem_tel',
					'label'=>'Tel',
					'rules'=>'trim|numeric|required|min_length[10]|max_length[11]'
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
					'mem_name'=>$_POST['mem_name'],
					'mem_email'=>$_POST['mem_email'],
					'mem_tel'=>$_POST['mem_tel'],
					'sc_id'=>$_POST['school']
					);
				$this->db->set('crt_date', 'NOW()', FALSE);
				$this->member_model->update($mem_id,$data);
				redirect('members/index');
			}

		}else{
			$data = array('errors'=>false);
		}
		$data['schools'] = $this->member_model->get_school();
		$data['member']=$this->member_model->get_member($mem_id);
		$this->load->view('members/edit_member',$data);	
	}

	function delete($mem_id){

		$this->member_model->delete($mem_id);
		redirect(base_url().'members');
	}
}