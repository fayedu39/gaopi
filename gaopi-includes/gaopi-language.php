<?php
/*
 * Languages management for GaopPi
 **/

require(ABSPATH.GPCONTENT."/languages/list.php");

$languageName=Array(
	"en"=>"English",
	"fr"=>"Français",
	"es"=>"Español"
);

if(!isset($settings["language"])) {
	$settings["language"]=$languages[0];
}
if(!in_array($settings["language"],$languages)) {
	$settings["language"]=$languages[0];
}
if(file_exists(ABSPATH.GPCONTENT."/languages/".$settings["language"].".php")) {
	require(ABSPATH.GPCONTENT."/languages/".$settings["language"].".php");
	$_tr=$_trs[$settings["language"]];
} else {
	$_tr=Array("empty");
}

function _t($c) {
	global $_tr;
	if(array_key_exists($c,$_tr)) {
		return $_tr[$c];
	} else {
		return $c;
	}
}