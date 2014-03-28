<?php
/*
 * Defines parsing functions
 **/

function adaptText($c) {
	global $settings;
	return preg_replace("#\\#\\{siteurl\\}#i",$settings["siteUrl"],$c);
}