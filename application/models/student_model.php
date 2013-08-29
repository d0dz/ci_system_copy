<?php

class Student_model extends CI_model{

	function get_students(){

		$this->db->select()->from('sc_student')->order_by('crt_date','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_student($std_id){
		$this->db->select()->from('sc_student')->where(array('std_id'=>$std_id))->order_by('crt_date','desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function insert($data){
		$this->db->insert('sc_student',$data);
		$result = $this->db->get_where('sc_student',$data,1);
		return $result->row()->std_id;
	}

	function update($std_id,$data){
		$this->db->where('std_id',$std_id);
		$this->db->update('sc_student', $data);
	}

	function delete($std_id){
		$this->db->where('std_id',$std_id);
		$this->db->delete('sc_student');
	}
}