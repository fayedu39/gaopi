<?php
/*
 * Defines the ABSPATH constant and loads GaoPi environment and templates
 **/

if(!isset($gaopi_did_load)) {
	$gaopi_dd_load=true;
	
	session_start();
	
	define( 'ABSPATH', dirname(__FILE__) . '/' );

	require(ABSPATH."/gaopi-config.php");
	require(ABSPATH.GPINC."/gaopi-template.php");
}