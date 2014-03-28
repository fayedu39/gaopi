<?php
/*
 * Defines configuration
 */

require(ABSPATH."/gaopi-settings.php");

if(file_exists(ABSPATH.GPINC."/SQLConfig.php")) {
	require(ABSPATH.GPINC."/SQLConfig.php");
	if(defined("DB_NAME") && defined("DB_USER") & defined("DB_PASSWORD") && defined("DB_HOST") && defined("DB_PREFIX")) {
		require(ABSPATH.GPINC."/SQLFunctions.php");
		
		$DB=new SQLDB();
		
		if(!isset($_SESSION["settings"])) {
			require(ABSPATH.GPINC."/defineSessionSettings.php");
		}
		
		require(ABSPATH.GPINC."/defineUserSettings.php");
				
		require(ABSPATH.GPINC."/gaopi-settings.php");
		
		require(ABSPATH.GPINC."/parseFunctions.php");
		
		require(ABSPATH.GPINC."/gaopi-language.php");
		
	} else {
		echo("SQLConfig.php is not complete, see documentation for more information");
	}
} else {
	echo("SQLConfig.php file does not exists, see documentation fore more information");
}