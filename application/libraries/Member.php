<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member {
	
	private $ci;
	private $member_id;
	private $member_code;
	private $member_info;
	private $member_blank;
	private $id_card;
	private $last_history_id;
	private $last_history_info;
	private $last_history_blank;
	private $last_contact_id;
	private $last_contact_info;
	private $last_contact_blank;
	private $last_personalize_id;
	private $last_personalize_blank;
	
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('member_model');
	}
	
    public function index()
    {
    	
    	//$ci->load->library('session');
		//print_r($ci->session->userdata);
	}
	
	
	public function set_idcard($idcard)
	{
		$this->id_card = $idcard;
		
		//get member
		$member = $this->ci->member_model->get_member($this->id_card);
		
		$this->member_info = $member->result_array();
		
		
		foreach($member->result_array() as $info)
		{
			$this->member_id = $info['id'];
			$this->member_code = $info['member_code'];
		}

		//get history
		$last_history = $this->ci->member_model->get_last_history($this->member_id);		
		$this->last_history_info = $last_history->result_array();
		foreach ($last_history->result_array() as $info) {
			$this->last_history_id = $info['id'];
			$this->last_contact_id = $info['contact_id'];
			$this->last_personalize_id = $info['personalize_id'];
		}
			
		//get personalize
		$last_personalize = $this->ci->member_model->get_last_personalize($this->last_personalize_id);
		$this->last_personalize_info = $last_personalize->result_array();
				
		//get contact
		$last_contact = $this->ci->member_model->get_last_contact($this->last_contact_id);
		$this->last_contact_info = $last_contact->result_array();
		
	}
	
	public function is_member()
	{
		
		return $this->ci->member_model->is_member($this->id_card);
	
	}
	
	public function get_member_info()
	{
		return $this->member_info;
	}
	
	public function has_history()
	{
		
	}
	
	public function get_last_history_info()
	{
		//return $this->ci->member_model->get_last_history($this->id_card);
		return $this->last_history_info;
	}
	
	
	
	public function has_contact()
	{
		
	}
	
	public function get_last_contact_info()
	{
		return $this->last_contact_info;
	}
	
	public function get_last_personalize_info()
	{
		return $this->last_personalize_info;
	}
	
	public function get_blank($table)
	{
		return $this->ci->member_model->get_blank($table);
	}
	
	public function add()
	{
		//print_r($_POST);
		
		if($this->ci->input->post('ismember')=="yes")
		{
			$this->ci->member_model->add_old_member();	
		}else{
			$this->ci->member_model->add_new_member();
		}
		
		//redirect update with id
		
		
	}
	
	
}

/* End of file Member.php */