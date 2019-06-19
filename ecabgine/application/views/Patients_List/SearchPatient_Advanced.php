<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Patients_List/search_patient_simple'); ?>

	<input type="checkbox" name="search_first_name" value="first name"> Use first name
	<input type="text" name="first_name"><br/>
	
	<input type="checkbox" name="search_last_name" value="last name"> Use last name
	<input type="text" name="last_name"><br/>
	
	<input type="checkbox" name="search_cnp" value="cnp"> Use CNP
	<input type="text" name="cnp"><br/>
	
	<input type="checkbox" name="search_id_patient" value="id_patient"> Use ID Patient
	<input type="text" name="last_name"><br/>
	
	<input type="submit" name="advanced_search" value="Search">
	<input type="submit" name="add_new_patient" value="Add new patient">

</form>
