<?php
require_once('login.inc');
class mydb 
{

private $contact = array('first_name', 'last_name', 'occupation', 'street', 'city', 'state', 'zip', 'tel_area', 'tel_pre', 'tel_post', 'email', 'confirmed', 'contact_method', 'unnique');

private $tier1 = array('r1', 'r2', 'unnique');

private $tier2 = array('r3', 'r4', 'r5', 'r6', 'unnique');

private $tier3 = array('r7', 'r8', 'r9', 'r10', 'unnique');

private $master = array('first_name', 'last_name', 'occupation', 'street', 'city', 'state', 'zip', 'tel_area', 'tel_pre', 'tel_post', 'email', 'r1', 'r2', 'r3', 'r4', 'r5', 'r6', 'r7', 'r8', 'r9', 'r10', 'confirmed', 'contact_method', 'unnique');


public function write_database($d, $use_table) // pulls array into proper form 
	{
	is_array($d) ? : $this->error_present("Form data corrupt. An array was expected here. Sorry!");


/*This is the only real place where db connection occurs*/
	$mysqli = new mysqli;


	$db_server = $mysqli->connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
	$mysqli->select_db(DB_DB);

	$rquery = "(";
	$tquery = "";

	foreach ($d as $x)
		{ 	$rquery == "(" ? $rquery .= $tquery : $rquery .=', '.$tquery;  /*this is designed to concatenate using data from the *last* pass, because in the end, it has to be different.  The ternary expression prevents (, 'people', 'jaguars') and formats ('people', 'jaguars')*/
			$tquery = '\'' . mysqli_real_escape_string($mysqli, $this->soap($x)) . '\'';  /* in other words, concatenate the query to look like 'hops', 'barley', 'grapes', 'man/'s friend' after hacker resistance employed*/
		}

	$rquery .=','.$tquery.')'; /*now, take care of the last pass to format correctly*/
	
	switch ($use_table)
	{
		case "contact":
		$t_lquery = $this->make_lquery($this->contact); break;
		case "tier1":
		$t_lquery = $this->make_lquery($this->tier1); break;
		case "tier2":
		$t_lquery = $this->make_lquery($this->tier2); break;
		case "tier3":
		$t_lquery = $this->make_lquery($this->tier3); break;
		
		$this->error_present("Umm, we have a problem with the left side of the query.");
	}
	

	$lquery = "INSERT INTO $use_table $t_lquery VALUES ";

	$mysqli->query($lquery.$rquery) ? :  $this->error_present("The data presented was in improper format.  Sorry!  You attempted $lquery$rquery and server returned $mysqli->error()");
	$mysqli->close();
	}

public function soap($hand)
	{
	$hand = stripslashes($hand);
	$hand = strip_tags($hand);
	$hand = htmlentities($hand);
	return $hand;
	}

protected function make_lquery($fields)
	{
		$lquery = "(";
		$tquery = "";

		foreach ($fields as $x)
		{	$lquery == "(" ? $lquery .= $tquery : $lquery .= ', '.$tquery;
			$tquery = $x;
		}
		$lquery .=")"; /*note we are simply closing paren and ignoring the last step of the array because it is the auto_increment primary key*/
		return $lquery;
	}
protected function error_present($msg)
	{ die($msg); }
	
}

/*here is the query to merge the contacts down into the master_all part of the database
insert into master_all(first_name, last_name, occupation, etc..unnique) select first_name, last_name, occupation, etc..unnique from contact

And here is the query to merge fields from the tiers into those existing fields
update master_all, tier1 set master_all.r1=tier1.r1, master_all.r2=tier1.r2, etc. where master_all.unnique=tier1.unnique*/
?>