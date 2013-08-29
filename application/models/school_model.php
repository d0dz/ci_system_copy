<?php

class School_model extends CI_model{

	function get_schools(){

		$this->db->select('*');
		$this->db->from('sc_school');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_school($sc_id){
		$this->db->select()->from('sc_school')->where(array('sc_id'=>$sc_id));
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function insert($data){
		$this->db->insert('sc_school',$data);
		$result = $this->db->get_where('sc_school',$data);
		return $result->row()->sc_id;
	}

	function update($sc_id,$data){
		$this->db->where('sc_id',$sc_id);
		$this->db->update('sc_school', $data);
	}

	function delete($sc_id){
		$this->db->where('sc_id',$sc_id);
		$this->db->delete('sc_school');
	}
}