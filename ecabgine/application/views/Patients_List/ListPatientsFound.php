	
	<h2> List of pacients who satisfies the search criteria:</h2>

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
			echo '<td><button type="button" name="button'.$idp.'" id="button'.$idp.'"'.' value="'.$idp.'"> Consult</button>';

			echo '</tr>';
		}
		?>
	</table>

