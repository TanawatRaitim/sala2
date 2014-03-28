<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class History extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->database();
		$this->load->helper('url');
	}


	public function index()
	{
		//echo 'this is history controller';
	}
	
	public function check_idcard()
	{
		$this->data['title'] = 'Check ID Card';
		$this->load->view('template/history/check_idcard',$this->data);	
	}
	
	public function addnew()
	{
		
		$this->load->library('member');
		$this->data['title'] = 'History Add New';

		//check member
		$this->member->set_idcard($this->input->post('idcard'));
		$is_member = $this->member->is_member();
		$this->data['is_member'] = $is_member;
		
		if($is_member)
		{
			$this->data['member_info'] = $this->member->get_member_info();
			$this->data['history_info'] = $this->member->get_last_history_info();
			$this->data['personalize_info'] = $this->member->get_last_personalize_info();
			$this->data['contact_info'] = $this->member->get_last_contact_info();
		}
		
		$this->load->view('template/history/add',$this->data);	
	}
	
	public function addtemp($history_id)
	{
		$this->load->library('member');
		$this->data['title'] = 'History Add New';

		//check member
		$this->member->set_history_id($history_id);
		$is_member = $this->member->is_member();
		$this->data['is_member'] = $is_member;
		
		$this->data['member_info'] = $this->member->get_member_info();
		$this->data['history_info'] = $this->member->get_history_info();
		$this->data['personalize_info'] = $this->member->get_personalize_info();
		$this->data['contact_info'] = $this->member->get_contact_info();
		
		$this->load->view('template/history/add',$this->data);
		
	}
	
	public function add()
	{
		$this->load->library('member');
		$history_id = $this->member->add();
		
		if($history_id)
		{
			$this->session->set_flashdata('message','เพิ่มข้อมูลใหม่เรียบร้อยแล้ว');
			if($this->session->userdata('previous_url') == "")
			{
				redirect('','refresh');
			}else{
				redirect($this->session->userdata('previous_url'),'refresh');
			}
			
		}else{
			echo 'ไม่สามารถบันทึกข้อมูลได้โปรดติดต่อ Admin';
			exit();
		}
	}

	public function edit($history_id)
	{

		$this->load->library('member');
		$this->data['title'] = 'History Edit';
		$this->member->set_history_id($history_id);
		
		$this->data['member_info'] = $this->member->get_member_info();
		$this->data['history_info'] = $this->member->get_history_info();
		$this->data['personalize_info'] = $this->member->get_personalize_info();
		$this->data['contact_info'] = $this->member->get_contact_info();
		
		$this->load->view('template/history/edit',$this->data);
		
	}
	
	public function delete($history_id)
	{
		echo $history_id;
	}
	
	public function memberhistory($history_id)
	{
		//echo $history_id;
		
		//like edit
		
		//and get all member history
		$this->load->library('member');
		$this->data['title'] = 'History Edit';
		$this->member->set_history_id($history_id);
		
		$this->data['member_info'] = $this->member->get_member_info();
		$this->data['history_info'] = $this->member->get_history_info();
		$this->data['personalize_info'] = $this->member->get_personalize_info();
		$this->data['contact_info'] = $this->member->get_contact_info();
		
		//get all member history
		$this->data['member_history'] = $this->member->get_all_member_history();
		$this->data['total_history'] = "พบประวัติทั้งหมด ".$this->member->get_count_history()." รายการ";
		
		$this->load->view('template/history/memberhistory',$this->data);

	}
	
	
	
	public function update()
	{
		$this->load->library('member');
		$history_id = $this->member->update();
		
		if($history_id)
		{
			$this->session->set_flashdata('message','แก้ไขข้อมูลเรียบร้อยแล้ว');
			
			if($this->session->userdata('previous_url') == "")
			{
				redirect('','refresh');
			}else{
				// redirect("main/index/".$this->session->userdata('page_main'),'refresh');
				redirect($this->session->userdata('previous_url'),'refresh');
			}
			
		}else{
			echo 'ไม่สามารถบันทึกข้อมูลได้โปรดติดต่อ Admin';
			exit();
		}
	}
	
	
	/**
	 * 
	 * check if is register book issue volume
	 * 
	 */
	public function check_volume()
	{
		
		if($this->input->post('ismember')=='no')		
		{
			//if new member
			echo 'true';
		}else{
			//check is register
			//if old member
			$this->load->library('member');
			$is_register = $this->member->is_book_register();
			
			if($is_register)
			{
				echo 'true';
			}else{
				echo 'false';
			}
			
		}
		
	}
	
	public function export()
	{
		
		$this->load->model('member_model');
		$this->data['title'] = 'export';
		
		
		$book = $this->input->post('book_export');
		$issue = $this->input->post('issue_export');
		$volume = $this->input->post('volume_export');
		
		//get all member filter by book, issue, volume
		$this->data['result'] = $this->member_model->get_members_by_issue($book, $issue, $volume);
		
		//array of question
		$this->data['question'] = $this->member_model->get_all_question(); 
		
		//file name
		//export
		$this->data['filename'] = 'export_data';
		
		$this->load->view('template/history/export_word',$this->data);
		
	}

	public function test()
	{
		echo mysql2thaidate('1981-08-03');
		echo '<br />';
		echo thaidate2mysql('03-08-2524');
	}
	
}