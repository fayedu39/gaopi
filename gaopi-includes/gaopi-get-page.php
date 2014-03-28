<?php
/*
 * Loads GaoPi page settings
 **/

if(isset($DB)) {
	require(ABSPATH.GPINC."/gaopi-get-page-functions.php");
	
	$req=$DB->req("SELECT * FROM ".DB_PREFIX."pages ORDER BY home DESC");
	if($data=$DB->fetch($req)) {
		$page=$data;
		while($data=$DB->fetch($req)) {
			if($data["id"]==$_GET["p"] OR $data["link"]==$_GET["p"]) {
				$page=$data;
			}
		}
		$DB->freereq($req);
		
		$page["content"]=getPageTextContent($page["id"]);
		
		$page["content"]["images"]=getPageImagesContent($page["id"]);
		
		$page["content"]["diapoImages"]=getDiapoImagesContent($page["id"]);
		
		$req=$DB->req("SELECT * FROM ".DB_PREFIX."pages_settings WHERE page_id=".$page["id"]);
		while($data=$DB->fetch($req)) {
			$page["settings"][$data["setting"]]=$data["value"];
		}
	} else {
		$page["title"]=_t("No page");
		$page["content"]=Array(
			Array(
				"text"=>Array(
					"title"=>_t("Page does not exist"),
					"content"=>_t("GaoPi has not been set up correctly...")
				),
				"images"=>Array()
			)
		);
	}
	
	$DB->freereq($req);
}