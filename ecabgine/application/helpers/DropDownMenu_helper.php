<?php
        defined('BASEPATH') OR exit('No direct script access allowed');
// if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	$lov=array(
			array(
				(['display_value']=>displayValue),
				(['return_value']=>returnValue)
			),
			.....
	);
*/
function buildDropDownOptions($lov)
{
	foreach($lov as $lovElement)
	{
		echo '<option value="'.$lovElement['return_value'].'"> '.$lovElement['display_value'].' </option>';
	}
}

