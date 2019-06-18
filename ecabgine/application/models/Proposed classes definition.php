<?php
class Patient{
	$id_patient;	//INT
	$first_name;
	$last_name;
	$birth_date;
	$id_county;
	$id_city;
	$address;
	$job;
	$company;
	$phone_no;	//in database is 'phone_number'
	$email
	$CNP
	$marital_status

	public function getID()
	{
		return $this->id_patient();
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getName()
	{
		return $this->last_name . ', ' .$this->first_name;
	}

} 