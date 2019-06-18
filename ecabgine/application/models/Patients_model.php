<?php
class Patients_Model extends CI_Model {
	public function __construct(){
		// $this->load->database();
		$config['hostname'] = 'localhost';
		$config['username'] = 'root';
		$config['password'] = '';
		$config['database'] = 'ecabgine';
		$config['dbdriver'] = 'mysqli';
		$config['dbprefix'] = '';
		$config['pconnect'] = FALSE;
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
			'title' => $this->input->post('title'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('first_name'),
			'birth_day' => $this->input->post('birth_day'),
			// 'patient_id' => $this->input->post('patient_id'),
			'id_county' => $this->input->post('county'),
			'id_city' => $this->input->post('location'),
			'address' => $this->input->post('address'),
			'ocupation' => $this->input->post('ocupation'),
			'job' => $this->input->post('job'),
			'phone_number' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'cnp' => $this->input->post('cnp'),
			'marital_satus' => $this->input->post('marital_satus')
		);

		echo 'model';

		return $this->db->insert('patient', $data);
	}

	public function update_patient($id_patient)
	{

	}

	public function search_patient($patient_name)
	{

	}

}