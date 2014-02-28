<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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
		$this->load->library('grocery_CRUD');
	}

	public function _data_output($output = null)
	{
		
		$this->load->view('crud_template',$output);

	}

	public function index()
	{
		$this->data['title'] = 'หน้าหลัก';
		$this->load->view('template/main',$this->data);
	}
	
	
	public function history()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('history');
			$crud->set_subject('History');
			$output = $crud->render();
			$this->_data_output($output);
	}
	
	public function members()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('members');
			$crud->columns('idcard', 'fname','lname','dob','address','sub_district','district','province','postcode');
			$crud->set_subject('Member');
			$output = $crud->render();
			$this->_data_output($output);
		
	}
	
	public function provinces()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('provinces');
			$crud->set_relation('geo_id','geography','geo_name');
			$crud->set_subject('รายชื่อจังหวัด');
			$extras = array();
			
/*
 * 
 * test new method set_extra_data()
 * @param array
 * @return array
 * 
 * 
 */
			
			// $extras['big'] = 'tanawat';
			// $extras['por'] = 'rittigun';
			// $extras['jsfile'] = array();
			// $extras['jsfile'][] = 'file1';
			// $extras['jsfile'][] = 'file2';
			// $extras['jsfile'][] = 'file3';
			// $extras['jsfile'][] = 'file4';
			//$crud->set_extra_data($extras);
			
			
			$output = $crud->render();
			$this->_data_output($output);
	}	
	
	public function issues()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('issues');
			$crud->set_relation('pocketbook_id','pocketbook','name');
			$crud->display_as('pocketbook_id','Pocket Book');
			$crud->set_subject('Issue');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function pocketbook()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('pocketbook');
			$crud->set_subject('Pocket Books');
			$output = $crud->render();

			$this->_data_output($output);
	}	
		
	public function careers()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('careers');
			$crud->set_subject('Careers');
			$output = $crud->render();

			$this->_data_output($output);
	}		
		
	public function contacts()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('contacts');
			$crud->set_subject('Contacts');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function countries()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('countries');
			$crud->set_subject('Countries');
			$output = $crud->render();

			$this->_data_output($output);
	}	
		
	public function education()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('education');
			$crud->set_subject('Education');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function geography()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('geography');
			$crud->set_subject('Geography');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function personalize()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('personalize');
			$crud->set_subject('Personalize');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function questions()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('questions');
			$crud->set_subject('Questions');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function salary()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('salary');
			$crud->set_subject('Salary');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function sexual()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('sexual');
			$crud->set_subject('Sexual');
			$output = $crud->render();

			$this->_data_output($output);
	}

}