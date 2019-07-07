<h2><?php echo $title; ?></h2>


	<p><?php 
		echo 'Pacient(s) found'.'<br/>';
		// print_r($id_patient);  echo '<br/>';

		foreach ($patients as $ky => $val) {
			foreach ($val as $key => $value) {
				echo $key.' '.$value.'<br>';
			}
			echo '<br/>';
		}
?></p>

</form>
