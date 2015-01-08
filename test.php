<?php
/*databases

Contact

First Name | Last Name | Occupation | Street | City | State | Zip | Telephone | Email

Tier 1

R1 | R2

Tier 2

R3 | R4 | R5 | R6 [ a, b, c ]

Tier 3

R7 | R8 | R9 | R10

Master

First Name | Last Name | Occupation | Street | City | State | Zip | Telephone | Email | R1 | R2 | R3 | R4 | R5 | R6 [ a, b, c ] | R7 | R8 | R9 | R10*/

require_once("libraries\db_interaction.inc");

$mydb = new mydb();
$quirks = array('Doug', 'Singer', 'Professor', "2236 Texas Hold 'Em Road", 'Las Vegas', 'NV', '84503', '534', '931', '3923', 'ds@microsoft.com');

$mydb->write_database($quirks, 'contact');

$buirks = array('I actually hate all insurance with a deeply \'roused passion.', 'GET OUT OF HERE!!!</html>');
$mydb->write_database($buirks, 'tier1');

$snuirks = array("How 'bout it?", 'Let\'s hack #', 'devilish', 'yyn');
$mydb->write_database($snuirks, 'tier2');
 
$fluirks = array('SELECT * FROM users WHERE user=\'$user\' AND pass=\'$pass',"Whee hee! \'\''\\////", "bugers", "TIME");
$mydb->write_database($fluirks, 'tier3');


?>

