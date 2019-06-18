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
			// 'patient_id' => $this->input->post('patient_id'), //should be added
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
		// $this->load->helper('url');

		$this->db->select('id_city, city') ;
		$query = $this->db->get('city');
		
		return $query->result_array();
		// $data['city_list'] = array(
		// 	array(0, 'Cluj-Napoca'),
		// 	array(1, 'Huedin'), 
		// 	array(2, 'Dej'), 
		// 	array(3, 'Turda'), 
		// 	array(4, 'Blaj'), 
		// 	array(5, 'Tirgu Mures')
		// );
		// return $data;

	}

/*
	public function my_form_dropdown($name, $result_array)
	{
	    $options = array();
	    foreach ($result_array as $key => $value){
	        $options[$value['id']] = $value['value'];
	    }
	    return form_dropdown($name, $options);
	}
*/


}