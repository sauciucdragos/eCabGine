<?php
class Patients_model extends CI_Model {
	public function __construct(){
		// $this->load->database();
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = 'ecabgine';
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = TRUE;
		$config['db_debug'] = TRUE;
		$config['cache_on'] = FALSE;
		$config['cachedir'] = '';
		$config['char_set'] = 'utf8';
		$config['dbcollat'] = 'utf8_general_ci';
		$this->load->database($config);
	}

	public function get_patient($id_patient=NULL)
	{

	}

	public function insert_patient()
	{
		$this->load->helper('url');

		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('first_name'),
			'birth_date' => $this->input->post('birth_day'),
			// 'patient_id' => $this->input->post('patient_id'), //this field should be added
			'id_county' => $this->input->post('county'),
			'id_city' => $this->input->post('location'),
			'address' => $this->input->post('address'),
			'job' => $this->input->post('job'),
			'company' => $this->input->post('ocupation'),
			'phone_number' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'cnp' => $this->input->post('cnp'),
			'marital_status' => $this->input->post('marital_status')
		);

		return $this->db->insert('patient', $data);
	}

	public function update_patient($id_patient)
	{

	}

	public function search_patient($patient_name)
	{

	}

	public function get_city_list()
	{
		$this->db->select('id_city, city'); //to be sure about order
		$query = $this->db->get('city');
		
		return $query->result_array();
	}

	public function get_county_list()
	{
		$this->db->select('id_county, county'); //to be sure about order
		$query = $this->db->get('county');
		
		return $query->result_array();
	}

}