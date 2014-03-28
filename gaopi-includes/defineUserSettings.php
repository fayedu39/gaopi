<?php
/*
 * Defines user settings with GET parameters
 **/

if(isset($_GET["lang"]) && !empty($_GET["lang"])) {
	$_SESSION["settings"][count($_SESSION["settings"])]=Array(
		"name"=>"language",
		"value"=>$_GET["lang"]
	);
}