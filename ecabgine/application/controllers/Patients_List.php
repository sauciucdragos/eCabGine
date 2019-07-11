<?php
class Patients_list extends CI_Controller{

	const SIMPLE_SEARCH = 1;
	const ADVANCED_SEARCH = 2;
	const ADD_NEW_PATIENT = 3;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('patients_model');
		$this->load->helper('url_helper');
		//load my DropDown library
		$this->load->helper('DropDownMenu');
	}

	public function insert_new_patient()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add new patient';
		$data['county_list'] = $this->patients_model->get_county_list();
		$data['city_list'] = $this->patients_model->get_city_list();

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('birth_day', 'Birth day', 'required');
		$this->form_validation->set_rules('patient_id', 'Patient ID', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('county', 'County', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('ocupation', 'Ocupation', 'required');
		$this->form_validation->set_rules('job', 'Job', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('cnp', 'CNP', 'required');
		$this->form_validation->set_rules('marital_status', 'Marital status', 'required');
		

		if($this->form_validation->run() === FALSE)
		{
			// $this->load->view('templates/header', $data);
			// $this->load->view('Patients_list/AddNewPatient', $data);
			// $this->load->view('templates/footer', $data);
			$content['view']='Patients_list/AddNewPatient';
			$content['data'] = $data;
			$this->load->view('layouts/patients',$content);
		} 
		else
		{
			$this->patients_model->insert_patient();
			$this->load->view('Patients_list/success');
		}
		
	}

	private function get_SearchType()
	{

		if($this->input->post('simple_search')){
			return 'SIMPLE_SEARCH';};

		if($this->input->post('advanced_search')){
			return 'ADVANCED_SEARCH';};

		if($this->input->post('add_new_patient')){
			return 'ADD_NEW_PATIENT';}

		return NULL;
	}

	private function displaySearchResult($content, $data)
	{
		$content['data']=$data;

		if(count($data['patients']))
		{
			$content['view']='Patients_list/ListPatientsFound';				
		}
		else
		{
			$content['view']='Patients_list/ListPatientsNotFound';
		}

		$this->load->view('layouts/patients',$content);
	}

	public function search_patient_simple()	
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Search patient';
		$content=array();

		$this->form_validation->set_rules('search_criteria', 'Search Criteria', 'required');

		if($this->form_validation->run() === FALSE)
		{
			// $this->load->view('templates/header', $data);
			// $this->load->view('Patients_list/SearchPatient_Simple', $data);
			// $this->load->view('templates/footer', $data);
			$content['view']='Patients_list/SearchPatient_Simple';
			$content['data'] = $data;
			$this->load->view('layouts/patients',$content);
		} 
		else
		{
			$searchType = $this->get_SearchType();
			switch ($searchType) {
				case 'SIMPLE_SEARCH':
					$data['patients'] = $this->patients_model->search_patient();
					// // $this->load->view('templates/header', $data);
					// // $this->load->view('Patients_list/ListPatientsFound', $data);
					// // $this->load->view('templates/footer', $data);
					// $content['view']='Patients_list/ListPatientsFound';
					// $content['data'] = $data;
					// $this->load->view('layouts/patients',$content);		
					$this->displaySearchResult($content, $data);			
					break;
				case 'ADVANCED_SEARCH':
					redirect('patients_list/search_patient_advanced');					
					// $data['title'] = 'Search patient (advanced)';
					// $this->load->view('templates/header', $data);
					// $this->load->view('Patients_list/SearchPatient_Advanced', $data);
					// $this->load->view('templates/footer', $data);
					break;
				case 'ADD_NEW_PATIENT':
					redirect('patients_list/insert_new_patient');
					break;
				default:
					echo 'Invalid search type! <br/>';
					break;
			}
		}
	}

	public function search_patient_advanced()	
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Search patient (advanced)';
		$content=array();
		
		$searchType = $this->get_SearchType();
		if($searchType == 'ADD_NEW_PATIENT')
		{
			redirect('patients_list/insert_new_patient');
		}
		
		$this->form_validation->set_rules('search_field[]', 'Search Criteria', 'required');	
		if($this->form_validation->run() === FALSE)
		{
			// $this->load->view('templates/header', $data);
			// $this->load->view('Patients_list/SearchPatient_Advanced', $data);
			// $this->load->view('templates/footer', $data);
			$content['view']='Patients_list/SearchPatient_Advanced';
			$content['data']=$data;
			$this->load->view('layouts/patients',$content);	
		} 	
		else
		{
			$data['patients'] = $this->patients_model->search_patient_advanced();
			$this->displaySearchResult($content, $data);
		}
	}

	public function list_patients_found()
	{
		// may or may not be implemented, should be discused with team
	}

	public function getCitiesList()
	{	
		$county_id = $this->input->get('county');	
		$cities_list=$this->patients_model->getCitiesList($county_id);

		header('Content-Type: application/json');
	    echo json_encode( $cities_list );	
	}

	public function insertNewCity()
	{
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$newCity=$this->input->get('city');
		$county=$this->input->get('county');

		$cities_list=$this->patients_model->insertNewCity($county,$newCity);

		header('Content-Type: application/json');
	    echo json_encode( $cities_list );
	}

/* Old and now unused*/
/*
	public function search_patient_advanced2()	
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Search patient (advanced)';
		
		$searchType = $this->get_SearchType();

		switch($searchType) {
		case 'ADD_NEW_PATIENT':
			redirect('patients_list/insert_new_patient');
			break;
		// case 'ADVANCED_SEARCH':
		default:
			$this->form_validation->set_rules('search_field[]', 'Search Criteria', 'required');	
			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('Patients_list/SearchPatient_Advanced', $data);
				$this->load->view('templates/footer', $data);
			} 	
			else
			{
				$data['patients'] = $this->patients_model->search_patient_advanced();
				$this->load->view('templates/header', $data);
				$this->load->view('Patients_list/ListPatientsFound', $data);
				$this->load->view('templates/footer', $data);
				// echo "From advanced search";
			}
		}
	}
*/

}