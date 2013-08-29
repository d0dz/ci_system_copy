<?php


	class Students extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('students_model');

		if(!$this->session->userdata('logged_in')){
			redirect('auth/index');
		}
		
		}
		
		// แสดงข้อมูล
		public function index()
		{
				 
        // if($this->session->userdata('mem_id')||$this->session->userdata('sc_id')){
 
        // }else{
        //     redirect('members/login');
        // }

			// $data = $this->students_model->students_show($this->session->userdata('mem_id'),$this->session->userdata('sc_id'));
			$data['query'] = $this->students_model->students_show();
			$this->load->view('student/students_main' ,$data);

		}
		
		
		//เพิ่มข้อมูล
		  
		public function insert(){
			
			//$data = $this->students_model->students_insert();
			$this->load->library("form_validation");
			$frm=$this->form_validation;
			
			$ar=array(
			array(
					"field"=>"txt_name",
					"label"=>"ชื่อ - นามสกุล",
					"rules"=>"required"
				),
				array(
					"field"=>"txt_number",
					"label"=>"รหัสนักเรียน",
					"rules"=>"trim|numeric|required"
				),
				array(
					"field"=>"txt_tel",
					"label"=>"เบอร์โทรศัพท์",
					"rules"=>"numeric|required|min_length[10]|max_length[10]"
				),
				array(
					"field"=>"txt_email",
					"label"=>"อีเมลล์",
					"rules"=>"trim|required|valid_email"
				),
				array(
					"field"=>"txt_fname",
					"label"=>"ชื่อ - นามสกุล  บิดา",
					"rules"=>"required"
				),
				array(
					"field"=>"txt_mname",
					"label"=>"ชื่อ - นามสกุล มารดา",
					"rules"=>"required"
				),
				array(
					"field"=>"txt_ftel",
					"label"=>"เบอร์โทรศัพท์",
					"rules"=>"numeric|min_length[10]|max_length[10]"
				),
				array(
					"field"=>"txt_mtel",
					"label"=>"เบอร์โทรศัพท์",
					"rules"=>"numeric|min_length[10]|max_length[10]"
				),
				array(
					"field"=>"txt_room",
					"label"=>"ห้องเรียน",
					"rules"=>"required"
				),
				
				array(
					"field"=>"txt_zipcode",
					"label"=>"รหัสไปรษณีย์",
					"rules"=>"required|numeric"
				),
				array(
					"field"=>"txt_provice",
					"label"=>"จังหวัด",
					"rules"=>"required"
				),
				array(
					"field"=>"txt_address",
					"label"=>"ที่อยู่",
					"rules"=>"trim|required"
				),
				
					
								
				);
				
				$frm->set_rules($ar);
				$frm->set_message("trim","กรุณากรอกข้อมูล  %s");
				$frm->set_message("required","กรุณากรอกข้อมูล  %s");
				$frm->set_message("numeric","กรุณากรอกข้อมูลเป็นตัวเลขเท่านั้น ");
				$frm->set_message("valid_email","กรุณากรอกอีเมลล์ให้ถูกต้อง เช่น   monXX@hotmail.com");
				$frm->set_message("min_length","เบอร์โทรศัพท์ไม่น้อยกว่า 10 ตัว  เช่น 087627XXXX");
				$frm->set_message("max_length","เบอร์โทรศัพท์ไม่เกิน 10 ตัว  เช่น 087627XXXX");
				$frm->set_message("greater_than","กรุณาเลือก %s ");
				
			if($frm->run()==FALSE){
				$arr["txt_antecedent"] = $this->input->post('txt_antecedent'); 
				$arr["txt_class"] = $this->input->post('txt_class');
				
				$this->load->view("student/students_insert",$arr);  
				
			}else if($this->input->post("btsave")!=null){
				
				$ar=array(
				 	"std_antecedent" =>  $this->input->post("txt_antecedent"),
				 	"std_name" =>  $this->input->post("txt_name"),
                    "std_number" =>  $this->input->post("txt_number"),
                    "std_tel" =>  $this->input->post("txt_tel"),
                    "std_email" =>  $this->input->post("txt_email"),
                    "class_id" =>  $this->input->post("txt_class"),
                    "std_room" =>  $this->input->post("txt_room"),
                    
					"std_fname" =>  $this->input->post("txt_fname"),
					"std_ftel" =>  $this->input->post("txt_ftel"),
					"std_mname" =>  $this->input->post("txt_mname"),
					"std_mtel" =>  $this->input->post("txt_mtel"),
					
					"std_parentaddress" =>  $this->input->post("txt_address"),
					"std_provice" =>  $this->input->post("txt_provice"),
					"std_zipcode" =>  $this->input->post("txt_zipcode"),
					
					'crt_by' => $this->session->userdata('mem_id'),
					'sc_id'=>$this->session->userdata('sc_id')
					                                 
                     );
								
					$this->db->set('crt_date', 'NOW()', FALSE);
					$this->students_model->students_insert($ar);
					redirect("students","refresh");
					
					
					
			}
			
			
		}
		
  	
  	public function edit($std_id){
  			$data = $this->students_model->students_edit($std_id);
			$data['query'] = $this->students_model->students_edit($std_id);
			$this->load->view('student/students_edit' ,$data);
				
				if($this->input->post("btsave")!=null){
			
				$ar=array(
				 	//"std_antecedent" =>  $this->input->post("txt_antecedent"),
				 	"std_name" =>  $this->input->post("txt_name"),
                    "std_number" =>  $this->input->post("txt_number"),
                     "std_tel" =>  $this->input->post("txt_tel"),
                   "std_email" =>  $this->input->post("txt_email"),
                    //"class_id" =>  $this->input->post("txt_class"),
                    "std_room" =>  $this->input->post("txt_room"),
                    
					"std_fname" =>  $this->input->post("txt_fname"),
					"std_ftel" =>  $this->input->post("txt_ftel"),
					"std_mname" =>  $this->input->post("txt_mname"),
					"std_mtel" =>  $this->input->post("txt_mtel"),
					
					"std_parentaddress" =>  $this->input->post("txt_address"),
					"std_provice" =>  $this->input->post("txt_provice"),
					"std_zipcode" =>  $this->input->post("txt_zipcode"),
					
					'crt_by' => $this->session->userdata('mem_id'),
					//'sc_id'=>$this->session->userdata('sc_id')
					                                 
                     );
					
					$this->db->set('crt_date', 'NOW()', FALSE);
					$this->students_model->student_edit2($ar,$std_id);
					redirect("students/edit","refresh");
								
			}
  		
  	}
  	
		
		// ลบข้อมู๔ล
		
		public function del($std_id){
				$this->db->delete('sc_student',array('std_id'=>$std_id));
				redirect("students","refresh");
                exit();
			}
		
		
		
		// ออกจากระบบ
		public function logout(){
			$this->session->sess_destroy();
			redirect('members/login');
	}
	






		}
	?>