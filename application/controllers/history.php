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
		
		//$this->input->post('idcard');
		
		//retrive post['idcard']
		//$this->member->set_idcard($this->input->post('idcard'));
		
		//check member
		$this->member->set_idcard($this->input->post('idcard'));
		$is_member = $this->member->is_member();
		$this->data['is_member'] = $is_member;
		$this->data['member_info'] = $this->member->get_member_info();
		$this->data['history_info'] = $this->member->get_last_history_info();
		$this->data['personalize_info'] = $this->member->get_last_personalize_info();
		$this->data['contact_info'] = $this->member->get_last_contact_info();
		
		$this->load->view('template/history/add',$this->data);	
	}
	
	public function add()
	{
		$this->load->library('member');
		$this->member->add();
	}
	
}