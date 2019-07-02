<h2><?php echo $title; ?></h2>

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

		<label for="county">Select county</label>
		<!-- <select name="county" id="selectCounty" onchange="getCities(this)"> -->
		<select name="county" id="selectCounty" onchange="getCities(this.value)">
		<?php
			foreach ($county_list as $county)
			{
				echo '<option value="'.$county['id_county'].'"> '.$county['id_county'].' '.$county['county'].' </option>';
			}
		?>
		</select><br/> <!-- debug:<p id="testField"></p> -->
		

 		<label for="location">Select locality</label>
		<select name="location" id="idSelectCity">
<!-- 		<?php
			foreach ($city_list as $city)
				{
					echo '<option value="'.$city['id_city'].'"> '.$city['id_city'].' '.$city['city'].' </option>';
				}

		?> -->
			<option> Select County first</option>
		</select>
		<label for="addNewCity">or add new locality </label>
		<input type="text" name="addNewCity"></input>
		<input type="button" name="addNewLocality" value="Add locality"></input>
		<br>

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

		<script type="text/javascript">

/*			function getCities(str) {

				document.getElementById("#testField").innerHTML = str;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(this.readyState==4 && this.status==200){
						setCities(this.responseText);
					}
					xmlhttp.open("GET", "index.php/Patients_list/getCitiesList?county=" + str, true);
					xmlhttp.send();
				}

			}
*/

			function getCities(str) {
				// console.log(str);
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onload = function(){
					var strTmp=this.responseText;
					idxStart=strTmp.search("\\[");
					idxEnd=strTmp.search("\\]");
					strTmp=strTmp.slice(idxStart,idxEnd+1);
					// var citiesList=JSON.parse('[{"id":"1", "city":"Cluj"}, {"id":"2", "city":"Huedin"}]');
					var citiesList=JSON.parse(strTmp);
					console.log(citiesList);
					dynamicSelectList("#idSelectCity", citiesList);
					}
	
				xmlhttp.open("GET", "<?php echo base_url("index.php/Patients_list/getCitiesList?county="); ?>" + str, true);
				xmlhttp.send();
			}

			// build dynamicSelectList(DOM Element ID, Element List)
			function dynamicSelectList(domElID, elList)	
			{

				selList=document.querySelector(domElID);

				//maybe split in two functions, one who delete(clean) and one who create
				opt=selList.children;
				for (var i = opt.length - 1; i >= 0; i--) {
					opt[i].remove();
				}

				if(elList.length == 0)
				{
					elList=[{id:"0",city:"No city found for this county"}];

				}

				for (var i = 0; i < elList.length; i++) 
				{
					var opt=document.createElement('OPTION');
					opt.value=elList[i].id_city;
					opt.innerHTML=elList[i].city; 
					selList.appendChild(opt);
				}

			}

		</script>
	</form>
