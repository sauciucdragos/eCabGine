<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('Patients_List/searchPatientAdvanced'); ?>

	<input type="checkbox" name="search_field[]" value="first name"> Use first name
	<input type="text" name="txt_first_name"><br/>
	
	<input type="checkbox" name="search_field[]" value="last name"> Use last name
	<input type="text" name="txt_last_name"><br/>
	
	<input type="checkbox" name="search_field[]" value="cnp"> Use CNP
	<input type="text" name="txt_cnp"><br/>
	
	<input type="checkbox" name="search_field[]" value="id_patient"> Use ID Patient
	<input type="text" name="txt_id_patient"><br/>
	
	<input type="submit" name="advanced_search" value="Search">
	<!-- <input type="submit" name="add_new_patient" value="Add new patient"> -->

</form>

<!-- <ul class="hmenu">
	<li><a href="http://[::1]/eCabGine/ecabgine/index.php/patients_list/insert_new_patient">Add new patient</a></li>
</ul> -->
<br>
<p class="smenu">You can also <a href="http://[::1]/eCabGine/ecabgine/index.php/patients_list/insert_new_patient">add a new patient</a></p> 