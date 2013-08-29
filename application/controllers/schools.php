<?php

class Schools extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('school_model');

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

	}

	function index(){

		// if($this->session->userdata('mem_id')){

		// }else{
		// 	redirect('members/login');
		// }

		$data['schools']=$this->school_model->get_schools();
		$this->load->view('schools/index',$data);
	}

	function school($sc_id){

		// if($this->session->userdata('mem_id')){

		// }else{
		// 	redirect('members/login');
		// }

		$data['school']=$this->school_model->get_school($sc_id);
		$this->load->view('schools/school',$data);
	}

	function new_school(){

		// if($this->session->userdata('mem_id')){

		// }else{
		// 	redirect('members/login');
		// }

		// echo var_dump($_POST);
		if(!empty($_POST)){
			$data=array(
				'sc_name'=>$_POST['sc_name'],
				'sc_address'=>$_POST['sc_address'],
				'sc_tel'=>$_POST['sc_tel']
			);
			$this->db->set('crt_date', 'NOW()', FALSE);
			$this->school_model->insert($data);
			redirect("schools","refresh");
		}else{
			// echo "error";
			// redirect("students","refresh");
			$this->load->view('schools/new_school');
		}
	}

	function edit($sc_id){

		// if($this->session->userdata('mem_id')){

		// }else{
		// 	redirect('members/login');
		// }

		$data['success']=0;
		if($_POST){
			$data=array(
				'sc_name'=>$_POST['sc_name'],
				'sc_address'=>$_POST['sc_address'],
				'sc_tel'=>$_POST['sc_tel']
			);
			$this->db->set('crt_date', 'NOW()', FALSE);
			$this->school_model->update($sc_id,$data);
			$data['success']=1;
			
		}
		$data['school']=$this->school_model->get_school($sc_id);
		$this->load->view('schools/edit_school',$data);
		
	}

	function delete($sc_id){

		// if($this->session->userdata('mem_id')){

		// }else{
		// 	redirect('members/login');
		// }

		$this->school_model->delete($sc_id);
		redirect(base_url().'schools');
	}
}