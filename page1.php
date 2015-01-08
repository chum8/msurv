<?php

require_once("libraries\db_interaction.inc");

$mydb = new mydb();

$mydb->write_database($_POST['texti'], 'contact' );

?>
You have successfully entered your contact information!  Now, for a chance to win an Amazon gift card, please answer the following questions.
<form action="page2.php" method="post">
Question I
What do you expect from your insurance agent?
<textarea name="texti[]" rows=5 cols=41></textarea>
Question II
How often do you expect your agent to review your insurance and financial programs?
<textarea name="texti[]" rows=5 cols=41></textarea>
<input type="image" action="submit_form"/>
</form>



