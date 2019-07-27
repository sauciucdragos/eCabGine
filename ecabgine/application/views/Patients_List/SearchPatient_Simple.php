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

	<!-- <input type="submit" name="advanced_search" value="Advanced search"> -->
	<!-- <input type="submit" name="add_new_patient" value="Add new patient"> -->

</form>
<!-- latter we should choose to use or not a menu built on an unordered list -->
<!-- <ul class="hmenu">
	<li><a href="http://[::1]/eCabGine/ecabgine/index.php/Patients_List/search_patient_advanced">Advanced search</a></li>
	<li><a href="http://[::1]/eCabGine/ecabgine/index.php/patients_list/insert_new_patient">Add new patient</a></li>
</ul> -->

<p class="smenu">You can also do an <a href="http://[::1]/eCabGine/ecabgine/index.php/patients_list/search_patient_advanced">advanced search</a> or <a href="http://[::1]/eCabGine/ecabgine/index.php/patients_list/insert_new_patient">add a new patient</a></p> 