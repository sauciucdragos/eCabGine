<h2><?php echo $title; ?></h2>

 <?php
	// foreach ($county_list as $county)
	// {
	// 	// echo '<option value="'.$county[0].'"> '.$county[0].$county[1].' </option>';
	// 	$jud = 
	// 	echo $county['id_county'].' '.$county['county'] . '<br>';
	// 	print_r($county);
	// 	echo '<br>';
	// 	// echo $county[0].' '.$county[1] . '<br>';
	// 	echo '<br>';
	// }

 	$county_values=array_values($county_list);
 	$county_keys=array_keys($county_list);
 	echo $county_keys[1];

 	// foreach ($county_values as $value) {
 	// 	// echo "$key <br>";
 	// 	print_r($value);
 	// 	echo '<br>';
 	// }


 	// while($county=current($county_values))
 	// {
 	// 	echo $county.' <br>';
 	// 	next($county_values);
 	// }


	// foreach ($county_list as $county)
	// {
	// 	list($id, $value)=$county;
	// 	echo $id.' '.$value.'<br>';
	// }
	// while ($name = current($county_list)) 
 //    {

 //        echo key($county_list).' ';
 //        print_r(current($county_list));
 //        echo '<br />';
 //        next($county_list);
 //    }
?>

<?php echo validation_errors(); ?>

<?php echo form_open('Patients_List/insert_new_patient'); ?>

		<label for="first_name">First Name</label>
		<input type="text" name="first_name"><br />		

		<label for="last_name">Last Name</label>
		<input type="text" name="last_name"> <br>

		<label for="birth_day">Birth day</label>
		<input type="date" name="birth_day"></input><br />	

		<label for="patient_id">Patient ID</label>
		<input type="text" name="patient_id"><br />

<!-- this 2 lines are for debug. we'll delete later -->
		<label for="county">County</label>
		<input type="number" name="county"><br />

		<label for="select_county">Select county</label>
		<select name="select_county">
		<?php
			foreach ($county_list as $county)
			{
				echo '<option value="'.$county['id_county'].'"> '.$county['id_county'].' '.$county['county'].' </option>';
			}
		?>
		</select> <br/>
<!-- this 2 lines are for debug. we'll delete later -->
		<label for="location">Location</label>
		<input type="number" name="location"><br />	

		<label for="select_city">Select city</label>
		<select name="select_city">
		<?php
			foreach ($city_list as $city)
				{
					echo '<option value="'.$city['id_city'].'"> '.$city['id_city'].' '.$city['city'].' </option>';
				}

		?>
		</select><br>


		<label for="address">Address</label>
		<input type="text" name="address"><br />	

		<label for="ocupation">Ocupation</label>
		<input type="text" name="ocupation"><br />

		<label for="job">Job</label>
		<input type="text" name="job"><br/>	

		<label for="phone">Phone</label>
		<input type="text" name="phone"><br />	

		<label for="email">E-mail</label>
		<input type="text" name="email"><br />

		<label for="cnp">CNP</label>
		<input type="number" name="cnp"><br />	

		<label for="marital_status">Marital status</label>
		<input type="text" name="marital_status"><br />	


		<input type="submit" name="add-patient" value="Add new patient" />
	
		<input type="submit" name="consult-patient" value="Consult new patient" />
		
		<input type="submit" name="cancel-patient" value="Cancel" />
		
	</form>
