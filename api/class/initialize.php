<?php

	// "api/class/config.php";

	defined('DS')		? NULL 	: define('DS', DIRECTORY_SEPARATOR);
	defined('SITE_ROOT')? NULL 	: define('SITE_ROOT', DS.'wamp'.DS.'www'.DS.'unigame'.DS.'api');
	defined('LIB_PATH')	? NULL 	: define('LIB_PATH', SITE_ROOT.DS.'class');
	
	
	
	
	require_once(LIB_PATH.DS.'config.php');	


	require_once(LIB_PATH.DS.'config.php');
	require_once(LIB_PATH.DS.'function.php');
	require_once(LIB_PATH.DS.'session.php');
	
	require_once(LIB_PATH.DS.'database.php'); 
	require_once(LIB_PATH.DS.'database_object.php');
	
	
	require_once(LIB_PATH.DS.'school.php'); 
	
	
	require_once(LIB_PATH.DS.'users.php');
	require_once(LIB_PATH.DS.'pointtable.php'); 
	require_once(LIB_PATH.DS.'scoretable.php');	
	require_once(LIB_PATH.DS.'addfriend.php');	
	require_once(LIB_PATH.DS.'student_verify.php');
	
	require_once(LIB_PATH.DS.'ImageProfile.php');
	require_once(LIB_PATH.DS.'blogs.php');	
	require_once(LIB_PATH.DS.'comment.php');
	
	
?>