<?php
/*
 * Define functions used in template
 **/

function displayPageTitle() {
	global $page;
	if(isset($page["content"]["title"]) && !empty($page["content"]["title"])) {
		echo($page["content"]["title"]);
	} else {
		echo(_t("No title"));
	}
}

function displayPageLang() {
	global $settings;
	echo($settings["contentLanguage"][0]);
	echo($settings["contentLanguage"][1]);
}

function displayStyleElement($e,$c) {
	global $page,$settings;
	if(isset($page["settings"][$e."style".$c])) {
		echo($c.":".$page["settings"][$e."_style_".$c].";");
	} elseif(isset($settings["default_".$e."_style_".$c])) {
		echo($c.":".$settings["default_".$e."_style_".$c].";");
	}
}

function setting($c) {
	global $page,$settings;
	if(isset($page["settings"][$c])) {
		if($page["settings"][$c]!="siteDefault") {
			return $page["settings"][$c];
		}
	}
	if(isset($settings[$c])) {
		return $settings[$c];
	}
	return false;
}