<?php
	class Member_model extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
		}

		
		public function is_member($idcard)
		{
			$this->db->select('idcard');
			$this->db->from('members');
			$this->db->where('idcard', $idcard);
			$result = $this->db->get();
			
			if($result->num_rows() > 0)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		public function get_member($idcard)
		{
			$this->db->where('idcard',$idcard);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			return $this->db->get('members');
		}
		
		public function get_last_personalize($personalize_id)
		{
			$this->db->where('id',$personalize_id);
			return $this->db->get('personalize');
		}
		
		public function get_last_contact($contact_id)
		{
			//$contact_id = '';
			$this->db->where('id',$contact_id);
			return $this->db->get('contacts');
		}
		
		
		public function get_last_history($member_id)
		{
			$this->db->where('member_id',$member_id);
			$this->db->order_by('id','desc');
			$this->db->limit(1);
			return $this->db->get('history');
		}
		
		
		
		public function get_all_history($perpage, $offset)
		{
			
			$sql = "SELECT ap_product.product_id, ap_product.product_name, ap_product.product_description, ap_frequency.frequency_name, ap_department.department_name  
					FROM ap_product 
					LEFT JOIN ap_frequency ON(ap_product.frequency_id = ap_frequency.frequency_id)
					LEFT JOIN ap_department ON(ap_product.department_id = ap_department.department_id)
					ORDER BY ap_product.product_name
					";
					
			$sql = "SELECT members.member_code, CONCAT(members.title,' ',members.fname,' ',members.lname) as member_name,
					(YEAR(CURDATE())-YEAR(members.dob)) as age, provinces.name as province, 
					books.name as book, issues.name as issue, history.volume, sexual.name as sexual, sexual.description as sexual_descr, sexual.image as sexual_img,
					DATE_FORMAT(history.create_date,'%d-%m-%Y') as history_date   
					FROM history 
					LEFT JOIN members ON(members.id = history.member_id)
					LEFT JOIN sexual ON(sexual.id = history.sexual_id)
					LEFT JOIN provinces ON(provinces.code = members.province_id)
					LEFT JOIN books ON(books.id = history.book_id)
					LEFT JOIN issues ON(issues.id = history.issue_id)
					ORDER BY history.id DESC
					";
			
			
			
			if($offset)
			{
				$limit = " LIMIT $offset, $perpage";
			}
			else{
				
				$limit = " LIMIT $perpage";
			}
						
			
			$sql .= $limit;
			
			$query = $this->db->query($sql);
			
			return $query;
		}

		public function get_blank($table)
		{
			$this->db->limit(1);
			return $this->db->get($table);
		}
		
		public function add_old_member()
		{
			echo '<pre>';
			print_r($_POST);
			echo '</pre>';
			
			echo '<pre>';
			print_r($this->session->all_userdata());
			echo '</pre>';
			
			
			
			//update member
			
			$update_date = date("Y-m-d H:i:s");
			
			
			$member = array(
							'title'=>trim($this->input->post('member_title')),
							'fname'=>trim($this->input->post('member_fname')),
							'lname'=>trim($this->input->post('member_lname')),
							'nickname'=>trim($this->input->post('member_nickname')),
							'dob'=>trim($this->input->post('member_dob')),
							'address'=>trim($this->input->post('member_address')),
							'sub_district'=>trim($this->input->post('member_sub_district')),
							'district'=>trim($this->input->post('member_district')),
							'province_id'=>trim($this->input->post('member_province')),
							'postcode'=>trim($this->input->post('member_postcode')),
							'country_id'=>trim($this->input->post('member_country')),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->where('id',$this->input->post('member_id'));
			$this->db->update('members',$member);
			
			
			
			//insert contact
			$contact = array(
							'member_id'=>trim($this->input->post('member_id')),
							'address'=>trim($this->input->post('contact_address')),
							'sub_district'=>trim($this->input->post('contact_sub_district')),
							'district'=>trim($this->input->post('contact_district')),
							'province_id'=>trim($this->input->post('contact_province')),
							'country_id'=>trim($this->input->post('contact_country')),
							'postcode'=>trim($this->input->post('contact_postcode')),
							'phone'=>trim($this->input->post('contact_phone')),
							'mobile'=>trim($this->input->post('contact_mobile')),
							'email'=>trim($this->input->post('contact_email')),
							'msn'=>trim($this->input->post('contact_msn')),
							'yahoo'=>trim($this->input->post('contact_yahoo')),
							'qq'=>trim($this->input->post('contact_qq')),
							'facebook'=>trim($this->input->post('contact_facebook')),
							'social_other'=>trim($this->input->post('contact_social_other')),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('contacts',$contact);
			$contact_id = $this->db->insert_id();			
			
			
			//insert personalize
			$personalize = array(
							'member_id'=>trim($this->input->post('member_id')),
							'q2'=>trim($this->input->post('personalize_q2')),
							'q3'=>trim($this->input->post('personalize_q3')),
							'q4'=>trim($this->input->post('personalize_q4')),
							'q5'=>trim($this->input->post('personalize_q5')),
							'q6'=>trim($this->input->post('personalize_q6')),
							'q7'=>trim($this->input->post('personalize_q7')),
							'q8'=>trim($this->input->post('personalize_q8')),
							'q9'=>trim($this->input->post('personalize_q9')),
							'q10'=>trim($this->input->post('personalize_q10')),
							'q11'=>trim($this->input->post('personalize_q11')),
							'q12'=>trim($this->input->post('personalize_q12')),
							'q13'=>trim($this->input->post('personalize_q13')),
							'q14'=>trim($this->input->post('personalize_q14')),
							'q15'=>trim($this->input->post('personalize_q15')),
							'q16'=>trim($this->input->post('personalize_q16')),
							'q17'=>trim($this->input->post('personalize_q17')),
							'q18'=>trim($this->input->post('personalize_q18')),
							'q18_1'=>trim($this->input->post('personalize_q18_1')),
							'q18_2'=>trim($this->input->post('personalize_q18_2')),
							'q19'=>trim($this->input->post('personalize_q19')),
							'q20'=>trim($this->input->post('personalize_q20')),
							'q21'=>trim($this->input->post('personalize_q21')),
							'q22'=>trim($this->input->post('personalize_q22')),
							'q23'=>trim($this->input->post('personalize_q23')),
							'q24'=>trim($this->input->post('personalize_q24')),
							'create_date'=>$update_date,
							'create_by'=>$this->session->userdata('user_id'),
							'update_date'=>$update_date,
							'update_by'=>$this->session->userdata('user_id'),
							'is_delete'=>"no",
							'status'=>'active'
							);
			$this->db->insert('personalize',$personalize);
			$personalize_id = $this->db->insert_id();
			
			echo $personalize_id;				
			
			//insert history
			
		}
		
		public function add_new_member()
		{
			//insert member
			
			//insert contact
			
			//insert personalize
			
			//insert history		
			
			
		}
		
		
		
	}	