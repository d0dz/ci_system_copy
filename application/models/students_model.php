<?php

	class Students_model extends CI_Model{
		public function __construct(){
			parent::__construct();
		}
		
		// แสดงข้อมูล
		public function students_show()
		{
			
			$this->load->database();			
			$this->db->select('*');
			$this->db->from('sc_student');
			$this->db->join('sc_class', 'sc_student.class_id = sc_class.class_id');
			// $this->db->join('sc_member', 'sc_member.mem_id = sc_student.crt_by');
			$this->db->join('sc_school', 'sc_school.sc_id = sc_student.sc_id');
			//$this->db->where('sc_student.crt_by',$this->session->userdata('mem_id'));
			$this->db->where('sc_student.sc_id',$this->session->userdata('sc_id'));
			// $this->db->where('sc_member.mem_id',$this->session->userdate('mem_id'));
			
			//$this->db->join('sc_school', 'sc_school.sc_id = sc_student.sc_id');
			
			$query = $this->db->get();  			
  			return $query->result();
			
		}
		
					
		public function students_insert($ar)
		{
			
			$this->db->insert("sc_student",$ar);
            redirect("students","refresh");
            exit();				
			$this->load->view("students");
			
		}
	
		//แก้ไขข้อมูล
		public function students_edit($std_id){
			
		$this->load->database();			
		$this->db->select('*');
		$this->db->from('sc_student');	
		$this->db->where('std_id',$std_id);	
		$query = $this->db->get();  			
  		return $query->result();
	
							
		}
		
		public function student_edit2($ar,$std_id){
			
			
			$this->db->where("std_id",$std_id);	
			$this->db->update("sc_student",$ar);			
            redirect("students","refresh");
            exit();				
			$this->load->view("students");
		}
		
		
		
		
		
		
	}
?>