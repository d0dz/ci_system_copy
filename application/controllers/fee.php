<?php

class Fee extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('fee_model');
		
		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}

	}
	public function index(){
		
		$data['fee']=$this->fee_model->get_fee();
		$this->load->view('fee/index',$data);
		
	}
	
	public function new_fee(){
			
			$this->load->library("form_validation");
			$frm=$this->form_validation;
			
			$ar=array(
			array(
					"field"=>"txt_name",
					"label"=>"ชื่อรายการ",
					"rules"=>"required"
				),
				array(
					"field"=>"txt_amount",
					"label"=>"รหัสนักเรียน",
					"rules"=>"trim|numeric|required"
					),
				);
				
				$frm->set_rules($ar);
				$frm->set_message("trim","กรุณากรอกข้อมูล  %s");
				$frm->set_message("required","กรุณากรอกข้อมูล  %s");
				$frm->set_message("numeric","กรุณากรอกข้อมูลเป็นตัวเลขเท่านั้น ");
				
				
			if($frm->run()==FALSE){
								
				$this->load->view("fee/fee_insert");  
				
			}else if($this->input->post("btsave")!=null){
				
				$ar=array(
				 	"fee_name" =>  $this->input->post("txt_name"),
				 	"fee_amount" =>  $this->input->post("txt_amount"),
                    					
					'crt_by' => $this->session->userdata('mem_id'),
					'sc_id'=>$this->session->userdata('sc_id')
					                                 
                     );
								
					$this->db->set('crt_date', 'NOW()', FALSE);
					$this->fee_model->fee_insert($ar);
					redirect("fee","refresh");
					
					
					
			}
	
	}
public function edit($fee_id){
			
			$data = $this->fee_model->fee_edit($fee_id);
			$data['query'] = $this->fee_model->fee_edit($fee_id);
			$this->load->view('fee/fee_edit' ,$data);
			
			
			if($this->input->post("btsave")!=null){
				
				$ar=array(
				 	"fee_name" =>  $this->input->post("txt_name"),
				 	"fee_amount" =>  $this->input->post("txt_amount"),
                    					
					'crt_by' => $this->session->userdata('mem_id'),
					'sc_id'=>$this->session->userdata('sc_id')
					                                 
                     );
								
					$this->db->set('crt_date', 'NOW()', FALSE);
					$this->fee_model->fee_edit2($ar,$fee_id);
					redirect("fee","refresh");
					
					
			}
					
	
	}

function delete($fee_id){

		$this->fee_model->fee_delete($fee_id);
		redirect(base_url().'fee');
	}
	
	
	
}