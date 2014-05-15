<?php	
	//cheating by putting this here since it is loaded on every page. Bite me.
	error_reporting(E_WARNING);

    define ("DB_HOST", "localhost"); // set database host
	define ("DB_USER", "school"); // set database user
	define ("DB_PASS","school"); // set database password
	define ("DB_NAME","school"); // set database name

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
	$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");
	
	mysql_query("SET time_zone = '+1:00'");
?>