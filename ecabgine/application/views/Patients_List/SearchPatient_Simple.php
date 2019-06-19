<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Patients_List/search_patient_simple'); ?>

	<label for="search_criteria">Select search criteria</label>
	<select name="search_criteria">
		<option value="first_name">First Name </option>
		<option value="last_name">Last name</option>
		<option value="CNP">CNP</option>
	</select>
	<!-- <input type="submit" name="search_criteria"> -->
	<br>


	<label for="search_data">Fill name or CNP</label>
	<input type="text" name="search_data">
	<input type="submit" name="simple_search" value="Search for patient">
	<br />

	<input type="submit" name="advanced_search" value="Advanced search">
	<input type="submit" name="add_new_patient" value="Add new patient">

</form>
