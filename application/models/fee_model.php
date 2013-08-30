<?php
class Fee_model extends CI_model{

	function get_fee(){

		$this->db->select('*');
		$this->db->from('sc_fee');
		$this->db->join('sc_school', 'sc_school.sc_id = sc_fee.sc_id');
		$this->db->where('sc_fee.sc_id',$this->session->userdata('sc_id'));
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	public function fee_insert($ar)
		{
			
			$this->db->insert("sc_fee",$ar);
            redirect("fee","refresh");
            exit();				
			$this->load->view("fee/index");
			
		}
		
		
		public function fee_edit($fee_id){
			
		$this->load->database();			
		$this->db->select('*');
		$this->db->from('sc_fee');	
		$this->db->where('fee_id',$fee_id);	
		$query = $this->db->get();  			
  		return $query->result();
	
							
		}
	public function fee_edit2($ar,$fee_id){
						
			$this->db->where("fee_id",$fee_id);	
			$this->db->update("sc_fee",$ar);			
            redirect("fee","refresh");
            exit();				
			$this->load->view("fee");
		}
		
		function fee_delete($fee_id){
		$this->db->where('fee_id',$fee_id);
		$this->db->delete('sc_fee');
	}
		
		
}
?>