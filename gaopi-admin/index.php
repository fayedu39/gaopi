<?php

session_start();

define("ABSPATH",dirname(__FILE__) . '/../');
require(ABSPATH."/gaopi-settings.php");

if(file_exists(ABSPATH.GPINC."/SQLConfig.php")) {
	require(ABSPATH.GPINC."/SQLConfig.php");
	if(defined("DB_NAME") && defined("DB_USER") & defined("DB_PASSWORD") && defined("DB_HOST") && defined("DB_PREFIX")) {
		require(ABSPATH.GPINC."/SQLFunctions.php");
		
		$DB=new SQLDB();
		
		require(ABSPATH.GPINC."/gaopi-language.php");
		
		require(ABSPATH.GPADMIN."/admin-interface.php");
	} else {
		echo("SQLConfig.php is not complete, see documentation for more information");
	}
} else {
	echo("SQLConfig.php file does not exists, see documentation fore more information");
}