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
					'rules'=>'trim|required|min_length[5]|max_length[100]|is_unique[sc_member.mem_name]'
					),
				array(
					'field'=>'mem_email',
					'label'=>'Email',
					'rules'=>'trim|required|is_unique[sc_member.mem_email]|valid_email'
					),
				array(
					'field'=>'mem_tel',
					'label'=>'Tel',
					'rules'=>'trim|required||max_length[11]|is_unique[sc_member.mem_tel]'
					)
				);
			$this->load->library('form_validation');
			$this->form_validation->set_rules($config);
			if($this->form_validation->run() == FALSE){
				$data['errors']=validation_errors();
			}else{

				$data=array(
					'mem_user'=>$_POST['mem_user'],
					'mem_pass'=>sha1($_POST['mem_pass']),
					'mem_name'=>$_POST['mem_name'],
					'mem_email'=>$_POST['mem_email'],
					'mem_tel'=>$_POST['mem_tel'],
					'sc_id'=>$_POST['school']

					);
			// $data['errors']=false;
				$this->load->model('member_model');
			//$data['members']=$this->member_model->get_members();
			//$data['schools'] = $this->member_model->get_school();
				$this->db->set('crt_date', 'NOW()', FALSE);
			// $this->member_model->insert($data);
				$memid=$this->member_model->create_member($data);
				$this->session->set_userdata('mem_id',$memid);

				redirect('members');
			}
		}else{
			$data = array('errors'=>false);
			// $data['schools'] = $this->member_model->get_school();
		}

		$data['schools'] = $this->member_model->get_school();
		$this->load->helper('form');
		$this->load->view('members/register',$data);
	}

	function edit($mem_id){

		$data['success']=0;
		if($_POST){
			$data=array(
				'mem_name'=>$_POST['mem_name'],
				'mem_email'=>$_POST['mem_email'],
				'mem_tel'=>$_POST['mem_tel'],
				'sc_id'=>$_POST['school']
				);
			$this->db->set('crt_date', 'NOW()', FALSE);
			$this->member_model->update($mem_id,$data);
			$data['success']=1;
			
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