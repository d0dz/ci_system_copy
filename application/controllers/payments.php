<?php 

class Payments extends CI_Controller{

	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

		$this->load->model('students_model');
		$this->load->model('fee_model');
	}

	function index(){
		$data['fee']=$this->fee_model->get_fee();
		$this->load->view('payments/index',$data);
	}

	function search_keyword(){

		$keyword = $this->input->post('keyword');
		$data['key'] = $this->students_model->search($keyword);
		$this->load->view('payments/index',$data);
	}
 }
