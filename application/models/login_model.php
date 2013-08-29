<?php

class Login_model extends CI_Model{

	public function __contruct(){
		parent::__contruct();
	}

	public function login($mem_user, $mem_pass){

		// $where=array(
		// 	'mem_user'=>$mem_user,
		// 	'mem_pass'=>sha1($mem_pass),
			
		// );
		// $this->db->select()->from('members')->where($where);
		// $query=$this->db->get();
		// return $query->first_row('array');

		$this->db->select('*');
		$this->db->from('sc_member');
		$this->db->where('mem_user',$mem_user);
		$this->db->where('mem_pass',sha1($mem_pass));
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->row();
		}else{
			return false;
		}
	}	
}