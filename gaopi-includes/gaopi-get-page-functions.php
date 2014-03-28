<?php
/*
 * Defines GaoPi get functions
 **/

function getPageTitle($page_id,$lang=0) {
	global $settings, $DB;
	if(!$lang) {
		$lang=$settings["language"];
	}
	
	$req=$DB->req("SELECT title FROM ".DB_PREFIX."pages_content_text WHERE page_id=".$page_id." AND language='".$lang."'");
	if($data=$DB->fetch($req)) {
		$DB->freereq($req);
		return $data["title"];
	}
	$DB->freereq($req);
	$req=$DB->req("SELECT title FROM ".DB_PREFIX."pages_content_text WHERE page_id=".$page_id."");
	if($data=$DB->fetch($req)) {
		$DB->freereq($req);
		return $data["title"];
	}
	$DB->freereq($req);
	return _t("No title");
}
function getPageTextContent($page_id,$lang=0) {
	global $settings, $DB;
	if(!$lang) {
		$lang=$settings["language"];
	}
	
	$req=$DB->req("SELECT * FROM ".DB_PREFIX."pages_content_text WHERE page_id=".$page_id." AND language='".$lang."'");
	if($data=$DB->fetch($req)) {
		$DB->freereq($req);
		return Array(
			"text"=>$data["content"],
			"title"=>$data["title"]
		);
	}
	$DB->freereq($req);
	$req=$DB->req("SELECT * FROM ".DB_PREFIX."pages_content_text WHERE page_id=".$page_id."");
	if($data=$DB->fetch($req)) {
		$DB->freereq($req);
		return Array(
			"text"=>_t("Sorry, not available in your language...")."<br/><br/>".$data["content"],
			"title"=>$data["title"]
		);
	}
	$DB->freereq($req);
	return Array(
		"text"=>_t("No content"),
		"title"=>_t("No title")
	);
}
function getPageImagesContent($page_id) {
	global $settings, $DB;
	
	$return=Array();
	$req=$DB->req("SELECT i.name, i.url FROM ".DB_PREFIX."pages_content_images AS c, ".DB_PREFIX."images AS i WHERE c.page_id=".$page_id." AND c.image_id=i.id ORDER BY order_in_page");
	if($data=$DB->fetch($req)) {
		$return[0]=$data;
		while($data=$DB->fetch($req)) {
			$return[count($return)]=$data;
		}
		$DB->freereq($req);
		return $return;
	}
	$DB->freereq($req);
	return Array(
		Array(
			"name"=>_t("No name"),
			"url"=>"#{siteurl}/gaopi-content/images/noimage.png"
		)
	);
}
function getDiapoImagesContent($page_id) {
	global $settings, $DB;
	
	$return=Array();
	$req=$DB->req("SELECT i.name, i.url FROM ".DB_PREFIX."pages_diapo_images AS c, ".DB_PREFIX."images AS i WHERE c.page_id=".$page_id." AND c.image_id=i.id ORDER BY order_in_page");
	if($data=$DB->fetch($req)) {
		$return[0]=$data;
		while($data=$DB->fetch($req)) {
			$return[count($return)]=$data;
		}
		$DB->freereq($req);
		return $return;
	}
	$DB->freereq($req);
	return Array();
}
function getPagesList() {
	global $DB;
	
	$req=$DB->req("SELECT * FROM ".DB_PREFIX."pages ORDER BY home DESC");
	return $DB->fetchall($req);
}