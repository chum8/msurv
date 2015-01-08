<?php
/*this file is intended to be run only once.
It creates a database with proper fields.*/

/*databases

Contact

First Name | Last Name | Occupation | Street | City | State | Zip | Telephone | Email | Unnique

Tier 1

R1 | R2 | Unnique

Tier 2

R3 | R4 | R5 | R6 [ a, b, c ] | Unnique

Tier 3

R7 | R8 | R9 | R10 | Confirmed | Contact Method | Unnique

Master

First Name | Last Name | Occupation | Street | City | State | Zip | Telephone | Email | R1 | R2 | R3 | R4 | R5 | R6 [ a, b, c ] | R7 | R8 | R9 | R10 | Confirmed | Contact Method |Unnique*/

require_once("libraries\login.inc");

$mysqli = new mysqli();
$db_server = $mysqli->connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
$mysqli->select_db(DB_DB);

$query = 'CREATE TABLE contact (first_name VARCHAR(24), last_name VARCHAR(24), occupation VARCHAR(24), street VARCHAR(50), city VARCHAR(24), state VARCHAR(2), zip INTEGER(5), tel_area INTEGER(3), tel_pre INTEGER(3), tel_post INTEGER(4), email VARCHAR(70), confirmed CHAR(1), contact_method VARCHAR(5), unnique INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY)';
$mysqli->query($query);

$query = 'CREATE TABLE tier1 (r1 TEXT(500), r2 TEXT(500), unnique INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY)';
$mysqli->query($query);

$query = 'CREATE TABLE tier2 (r3 TEXT(500), r4 TEXT(500), r5 TEXT(500), r6 CHAR(3), unnique INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY)';
$mysqli->query($query);


$query = 'CREATE TABLE tier3 (r7 TEXT(500), r8 TEXT(500), r9 TEXT(500), r10 TEXT(500), unnique INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY)';
$mysqli->query($query);

$query = 'CREATE TABLE master (first_name VARCHAR(24), last_name VARCHAR(24), occupation VARCHAR(24), street VARCHAR(50), city VARCHAR(24), state VARCHAR(2), zip INTEGER(5), tel_area INTEGER(3), tel_pre INTEGER(3), tel_post INTEGER(4), email VARCHAR(70), r1 TEXT(500), r2 TEXT(500), r3 TEXT(500), r4 TEXT(500), r5 TEXT(500), r6 CHAR(3), r7 TEXT(500), r8 TEXT(500), r9 TEXT(500), r10 TEXT(500), confirmed CHAR(1), contact_method VARCHAR(5), unnique INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY)';
$mysqli->query($query) OR die($mysqli->error);
$mysqli->close();
?>

