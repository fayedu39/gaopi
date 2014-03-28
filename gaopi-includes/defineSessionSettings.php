<?php
/*
 * Defines default settings for session
 **/

$_SESSION["settings"]=Array();
if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
	$_SESSION["settings"][count($_SESSION["settings"])]=Array(
		"name"=>"language",
		"value"=>$_SERVER['HTTP_ACCEPT_LANGUAGE'][0].$_SERVER['HTTP_ACCEPT_LANGUAGE'][1]);
}