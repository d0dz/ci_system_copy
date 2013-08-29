<?php

class Member_model extends CI_Model{

	function get_members(){
		$this->db->select('*');
		$this->db->from('sc_member');
		$this->db->join('sc_school','sc_school.sc_id = sc_member.sc_id');
		$this->db->where('sc_member.sc_id',$this->session->userdata('sc_id'));
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_school(){
		return $this->db->get('sc_school');
	}

	function create_member($data){

		$this->db->insert('sc_member',$data);
		$result = $this->db->get_where('sc_member',$data,1);
		return $result->row()->mem_id;
	}

	function get_member($mem_id){
		$this->db->select('*');
		$this->db->select()->from('sc_member')->where(array('mem_id'=>$mem_id));
		$this->db->join('sc_school','sc_school.sc_id = sc_member.sc_id');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function update($mem_id,$data){
		$this->db->where('mem_id',$mem_id);
		$this->db->update('sc_member', $data);
	}

	function delete($mem_id){
		$this->db->where('mem_id',$mem_id);
		$this->db->delete('sc_member');
	}
}