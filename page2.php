<?php

require_once("libraries\db_interaction.inc");

$mydb = new mydb();

$mydb->write_database($_POST['texti'], 'tier1' );

?>
Congratulations!  You have successfully entered the survey.  Would you like to double your chances of winning?  Simply answer four more questions for a SECOND entry in the give away!
<form action="page3.php" method="post">
Question 1

When was the last time your agent reviewed your insurance and financial programs?
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 2

Who do you have your vehicles and property insured with?
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 3
How did you determine your current coverage and limits? 
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 4
Do you carry life and health insurance on yourself and your family?  (Self, spouse, children)
<textarea name="texti[]" rows=5 cols=41></textarea>
<input type="image" action="submit_form"/>
</form>