<?php
class Patients_model extends CI_Model {

	private $sql_patientData="id_patient, CONCAT(last_name, ', ', first_name) AS NAME, birth_date, cnp, concat(county, ', ', city, ', ', address) AS address, email, phone_number";

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
			'last_name' => $this->input->post('last_name'),
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

/*
SELECT CONCAT(last_name, ', ', first_name) AS NAME, birth_date, cnp, concat(county, ', ', city, ', ', address) AS address, email, phone_number 
FROM patient
JOIN city
ON patient.id_city = city.id_city
JOIN county 
ON patient.id_county = county.id_county
WHERE patient.first_name = 'Ana';
*/
	public function search_patient()
	{
		$this->load->helper('url');

		$search_criteria=$this->input->post('search_criteria');
		$search_data=$this->input->post('search_data');

		$this->db->select($this->sql_patientData) ;
		$this->db->from('patient');
		$this->db->join('city', 'patient.id_city = city.id_city' );
		$this->db->join('county', 'patient.id_county = county.id_county');
		$this->db->where('patient.'.$search_criteria, $search_data);
		$query = $this->db->get();
		
		return $query->result_array();
	}

	function buildWhereFromPOST($tableField, $postField)
	{
		if ($fieldValue=$this->input->post($postField))
		{
			$this->db->where($tableField,$fieldValue);
		}
	}

	public function search_patient_advanced()
	{
		$this->load->helper('url');

		// $this->db->select('id_patient');
		// $this->db->from('patient');

		$this->db->select($this->sql_patientData) ;
		$this->db->from('patient');
		$this->db->join('city', 'patient.id_city = city.id_city' );
		$this->db->join('county', 'patient.id_county = county.id_county');

		$this->buildWhereFromPOST('first_name', 'txt_first_name');
		$this->buildWhereFromPOST('last_name', 'txt_last_name');
		$this->buildWhereFromPOST('cnp', 'txt_cnp');
		$this->buildWhereFromPOST('id_patient', 'txt_id_patient');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_city_list()
	{
		$this->db->select('id_city, city'); //to be sure about order
		$query = $this->db->get('city');
		
		return $query->result_array();
	}

	public function getCitiesList($county_id)
	{
		$this->load->helper('url');

		$this->db->select('id_city, city');
		$this->db->from('city');
		$this->db->where('id_county', $county_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_county_list()
	{
		$this->db->select('id_county, county'); //to be sure about order
		$query = $this->db->get('county');
		
		return $query->result_array();
	}

	public function insertNewCity($id_county,$newCity)
	{
		$data = array(
			'id_county' => $id_county,
			'city' => $newCity
			);

	    $this->db->insert('city',$data);
	    return $this->getCitiesList($id_county);
	}

/* Old and now unused*/
		public function search_patient2()
	{
		$this->load->helper('url');

		$search_criteria=$this->input->post('search_criteria');
		$search_data=$this->input->post('search_data');

		//$sql = "SELECT id_patient FROM patient WHERE $search_criteria = ?";
		$sql = "SELECT id_patient FROM patient WHERE $search_criteria = ?";
		$query = $this->db->query($sql, array($search_data));
		
		return $query->result_array();
	}

	public function search_patient3()
	{
		$this->load->helper('url');

		$search_criteria=$this->input->post('search_criteria');
		$search_data=$this->input->post('search_data');

		//$sql = "SELECT id_patient FROM patient WHERE $search_criteria = ?";
		$sql = "SELECT id_patient, CONCAT(last_name, ', ', first_name) AS NAME, birth_date, cnp, concat(county, ', ', city, ', ', address) AS address, email, phone_number 
			FROM patient
			JOIN city
			ON patient.id_city = city.id_city
			JOIN county 
			ON patient.id_county = county.id_county
			WHERE patient.$search_criteria = ?";
		$query = $this->db->query($sql, array($search_data));
		
		return $query->result_array();
	}

}