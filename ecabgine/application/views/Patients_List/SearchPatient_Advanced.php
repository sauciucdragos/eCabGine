<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Patients_List/search_patient_advanced'); ?>

	<input type="checkbox" name="search_field[]" value="first name"> Use first name
	<input type="text" name="txt_first_name"><br/>
	
	<input type="checkbox" name="search_field[]" value="last name"> Use last name
	<input type="text" name="txt_last_name"><br/>
	
	<input type="checkbox" name="search_field[]" value="cnp"> Use CNP
	<input type="text" name="txt_cnp"><br/>
	
	<input type="checkbox" name="search_field[]" value="id_patient"> Use ID Patient
	<input type="text" name="txt_id_patient"><br/>
	
	<input type="submit" name="advanced_search" value="Search">
	<input type="submit" name="add_new_patient" value="Add new patient">

</form>
