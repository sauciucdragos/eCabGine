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

	public function search_patient()
	{
		$this->load->helper('url');

		$search_criteria=$this->input->post('search_criteria');
		$search_data=$this->input->post('search_data');

		$sql = "SELECT id_patient FROM patient WHERE $search_criteria = ?";
		$query = $this->db->query($sql, array($search_data));
		
		return $query->result_array();
	}

	public function search_patient_advanced()
	{
		$this->load->helper('url');

		$sql = "SELECT id_patient FROM patient WHERE ";

		if($this->input->post('search_first_name'))
			{
				$first_name=$this->input->post('first_name');
				$sql = $sql.' $first_name' . ' = ?';
				$sqlarry[] = $first_name;
			}

		if($this->input->post('search_last_name'))
			{
				$last_name=$this->input->post('last_name');
				$sql = $sql.' $last_name' . ' = ?';
				$sqlarry[] = $last_name;
			}

		if($this->input->post('search_cnp'))
			{
				$cnp=$this->input->post('cnp');
				$sql = $sql.' $cnp' . ' = ?';
				$sqlarry[] = $cnp;
			}

		if($this->input->post('search_id_patient'))
			{
				$id_patient=$this->input->post('id_patient');
				$sql = $sql.' $id_patient' . ' = ?';
				$sqlarry[] = $id_patient;
			}

		// $sql = "SELECT id_patient FROM patient WHERE $first_name = ? and $last_name = ? and $cnp = ? and $id_patient = ?";

		// $query = $this->db->query($sql, array($first_name, $last_name, $cnp, $id_patient));
		$query = $this->db->query($sql, $sqlarry);
		
		return $query->result_array();
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