	
	
	<div>

	<h2> List of pacients who satisfies the search criteria:</h2>

	<?php echo form_open('Consult/consult');?>

		<table>
			<tr>
				<th>PatientID</th>
				<th>Patient name</th>
				<!-- <th style="width: 15em;">Patient name</th> -->
				<th>Birth day</th>
				<th>CNP</th>
				<th>Address</th>
				<th>e-mail</th>
				<th>tel. no.</th>
				<th></th>			
			</tr>

			<?php
			// print_r($patients);
			foreach ($patients as $idx_p => $patient_data) {
				echo '<tr>';
				foreach ($patient_data as $key => $value) {
					echo '<td>'.$value.'</td>';
				}

				$idp=$patient_data['id_patient'];
				// echo '<td><button type="button" name="patientId'.$idp.'" id="button'.$idp.'"'.' value="'.$idp.'"> Consult</button>';
				echo '<td><input type="submit" name="patientId'.$idp.'" id="button'.$idp.'"'.' value="Consult">';

				echo '</tr>';
			}
			?>
		</table>
	</form>
	</div>
	<br>
	
	<div>
		<?php echo form_open('Patients_List/insert_new_patient'); ?>

<!-- 		<h4> If no suitable patient is found, you can go and add new patient </h4> -->
		<table>
			<tr>
				<td><h4>If no suitable patient is found, you can go to add new patient</h4> </td>
				<td><input type="submit" name="add_new_patient" value="Add new patient"></td>
				
			</tr>
		</table>

		
	</form>
	</div>




