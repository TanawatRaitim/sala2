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
			$this->session->set_flashdata('insert_message','Insert successful');
			redirect('','refresh');
			
		}else{
			echo 'ไม่สามารถบันทึกข้อมูลได้โปรดติดต่อ Admin';
			exit();
		}
	}

	public function edit($history_id)
	{
		//echo $this->session->flashdata('insert_message');
		
		$this->load->library('member');
		$this->data['title'] = 'History Edit';
		
		//$this->member->set_idcard($this->input->post('idcard'));
		$this->member->set_history_id($history_id);
		
		$this->data['member_info'] = $this->member->get_member_info();
		$this->data['history_info'] = $this->member->get_history_info();
		$this->data['personalize_info'] = $this->member->get_personalize_info();
		$this->data['contact_info'] = $this->member->get_contact_info();
		
		$this->load->view('template/history/edit',$this->data);
		
	}
	
	public function update()
	{
		$this->load->library('member');
		$history_id = $this->member->update();
		
		if($history_id)
		{
			$this->session->set_flashdata('update_message','Update successful');
			echo 'update successful';
			//redirect to edit page
			//redirect('','refresh');
			
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

	public function test()
	{
		echo mysql2thaidate('1981-08-03');
		echo '<br />';
		echo thaidate2mysql('03-08-2524');
	}
	
}