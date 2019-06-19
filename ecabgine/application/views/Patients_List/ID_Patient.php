<h2><?php echo $title; ?></h2>


	<p><?php 
		echo 'Pacient(s) found'.'<br/>';

		foreach ($id_patient as $ky => $val) {
			foreach ($val as $key => $value) {
				echo $key.' '.$value.'<br>';
			}
		}
?></p>

</form>
