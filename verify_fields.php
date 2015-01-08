<?php
$good = "<input type=\"image\" name=\"submit_form\" enabled=\"true\" visibility=\"visible\" \>";
$nogood = "Sorry, there's a problem submitting your form: ";
if (isset($_POST))
{	
	$fail = "";
	$fail .= validatefield($_POST['texti'][0], "Please enter your first name. <br/>");
	$fail .= validatefield($_POST['texti'][1], "Please enter your last name. <br/>");
	$fail .= validatefield($_POST['texti'][2], "Please enter your occupation. <br/>");
	$fail .= validatefield($_POST['texti'][3], "Please enter your street. <br/>");
	$fail .= validatefield($_POST['texti'][4], "Please enter your city. <br/>");
	$fail .= validatefield($_POST['texti'][5], "Please enter your two letter state abbreviation. <br/>");
	$fail .= validate_n_field($_POST['texti'][6], "Please enter your zip code (numbers only). <br/>") ;
	$fail .= validate_n_field($_POST['texti'][7], "Please enter your telephone area code (numbers only). <br/>");
	$fail .= validate_n_field($_POST['texti'][8], "Please enter your telephone prefix (numbers only). <br/>");
	$fail .= validate_n_field($_POST['texti'][9], "Please enter the last four digits of your phone number (numbers only). <br/>");
	$fail .= validatefield($_POST['texti'][10], "Please enter a valid e-mail address. <br/>");
	$fail .= validateselected($_POST['texti'][11], "n", "You must agree to the terms of this survey.<br/>");
	$fail .= validateselected($_POST['texti'][12], 0, "Please select email or phone. <br/>");

	if ($fail == "") 
	{echo $good;}
	else { echo $nogood.$fail; } 	

}
function validatefield($field, $message) {
	if ($field == "") return $message;
	return "";
}
function validate_n_field($field, $message) {
	if (($field == "") or (!is_numeric($field))) return $message; 
	return "";
}
function validateselected($field, $taboo, $message) {
	if ($field == $taboo) return $message;
	return "";
}

?>