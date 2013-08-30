<?php

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');


	}

	function index(){
		if($this->session->userdata('logged_in'))
			redirect('members');
		$this->load->view('members/login');

	}

	public function checkLogin(){
		if($this->session->userdata('logged_in'))
			redirect('members');
		$this->load->view('members/login');

	}

	function verifyUser(){
		if($this->session->userdata('logged_in'))
			redirect('members');
		
		$this->form_validation->set_rules('mem_user', 'Username','required');
		$this->form_validation->set_rules('mem_pass', 'Password','required');

		if($this->form_validation->run() == false){
			$this->form_validation->set_message('mem_user','Incorrect Username or Password . Please try agin');
			$this->load->view('members/login');
		}else{

			$mem_user = $this->input->post('mem_user');
			$mem_pass = $this->input->post('mem_pass');
			$result = $this->login_model->login($mem_user,$mem_pass);

			if($result != false){
				$sess_array = array();
				$sess_array = array(
					'mem_user' =>$result->mem_user,
					'sc_id'=> $result->sc_id,
					'mem_status' => $result->mem_status,
					'mem_id'=>$result->mem_id,
					'logged_in' => true
					);
				$this->session->set_userdata($sess_array);
				redirect('members/index');
			}else{
				$data['message'] = 'Incorrect Username or Password . Please try agin';
				//$this->form_validation->set_message('mem_user','Incorrect Username or Password . Please try agin');
				$this->load->view('members/login',$data);
			}
			
		}
	}

	function logout(){
		$this->session->sess_destroy();
		// echo 'uy';
		redirect("auth/index");
	}

}

