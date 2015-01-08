<?php

require_once("libraries\db_interaction.inc");

$mydb = new mydb();

$mydb->write_database($_POST['texti'], 'tier2' );

?>
Congratulations!  You have now have TWO changes to win the amazon gift card!  One last chance to add another entry.  Would you answer four more questions to get a third entry and triple your chances of winning?

<form action="page4.php" method="post">
Question 1
Why did you buy the life and health insurance that you own now?  When was it purchased?
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 2
Are you thinking of making any changes in your insurance coverage in the future?  Why?
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 3
Would you feel comfortable discussing insurance and financial services options that may be available to you?
<textarea name="texti[]" rows=5 cols=41></textarea>

Question 4
Who do you know that I could contact to conduct a similar survey and gain more insights into this opportunity?
<textarea name="texti[]" rows=5 cols=41></textarea>
<input type="image" action="submit_form"/>
</form>