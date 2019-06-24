<?php
class Patients_list extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('patients_model');
		$this->load->helper('url_helper');
	}

	public function insert_new_patient()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add new patient';
		$data['county_list'] = $this->patients_model->get_county_list();
		$data['city_list'] = $this->patients_model->get_city_list();
		// echo '<br> data[city_list] <br>';
		// print_r($data['city_list']);

		// $this->form_validation->set_rules('first_name', 'First Name', 'required');
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
			$this->load->view('templates/header', $data);
			$this->load->view('Patients_list/AddNewPatient', $data);
			$this->load->view('templates/footer', $data);
		} 
		else
		{
			$this->patients_model->insert_patient();
			$this->load->view('Patients_list/success');
		}
		
	}

	public function search_patient_simple()	
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Search patient';

		$this->form_validation->set_rules('search_criteria', 'Search Criteria', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('Patients_list/SearchPatient_Simple', $data);
			$this->load->view('templates/footer', $data);
		} 
		else
		{
			                      // $this->patients_model->search_patient();
			$simple_search = $this->input->post('simple_search');
			$advanced_search = $this->input->post('advanced_search');
			$add_new_patient = $this->input->post('add_new_patient');
			// echo '--------- '.$simple_search.'<br/>';
			// echo '--------- '.$advanced_search.'<br/>';
			// echo '--------- '.$add_new_patient.'<br/>';
			
			if($simple_search)
			{
				$data['id_patient'] = $this->patients_model->search_patient();
				$this->load->view('Patients_list/id_patient', $data);
			}
			
			if($advanced_search)
			{
				$data['id_patient']= $this->search_patient_advanced();
				// $data['id_patient'] = $this->patients_model->search_patient_advanced();
				// $this->load->view('Patients_list/id_patient', $data);
			}

			if($add_new_patient)
			{
				$this->insert_new_patient();
			}
			
			// $this->load->view('Patients_list/id_patient', $data);
		}


	}

		public function search_patient_advanced()	
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Search patient (advanced)';

		$this->form_validation->set_rules('search_field[]', 'Search Criteria', 'required');

		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('Patients_list/SearchPatient_Advanced', $data);
			$this->load->view('templates/footer', $data);
		} 
		else
		{
			                      // $this->patients_model->search_patient();
			$simple_search = $this->input->post('simple_search');
			$advanced_search = $this->input->post('advanced_search');
			$add_new_patient = $this->input->post('add_new_patient');
			// echo '--------- '.$simple_search.'<br/>';
			// echo '--------- '.$advanced_search.'<br/>';
			// echo '--------- '.$add_new_patient.'<br/>';
			
			if($advanced_search)
			{
				$data['id_patient'] = $this->patients_model->search_patient_advanced();
				$this->load->view('Patients_list/id_patient', $data);
			}
			
			// $this->load->view('Patients_list/id_patient', $data);
		}


	}

	// public getCities() {
	// 	// cityId //iau vakoarea dn Get/poST
	// 	//query in db
	// 	// compui array
	// 	header('Content-Type: application/json');
 //    	echo json_encode( $arr );
	// }
}