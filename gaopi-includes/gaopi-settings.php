<?php
/*
 * Defines secondary settings
 **/

if(isset($DB)) {
	$settings=Array(
		"language"=>"en",
		"siteUrl"=>"./",
		"displayAllPagesInNavBar"=>"yes",
		"allowToHide"=>"yes",
		"allowDiaporama"=>"yes",
		
			"default_body_style_color"=>"white",
			"default_body_style_background"=>"black",
			"default_body_style_font-family"=>"Verdana,Arial,sans-serif",
			"default_body_style_font-size"=>"13px",
			
			"default_textContent_style_background"=>"rgba(1,1,1,0.8)",
			"default_textContent_style_position"=>"absolute",
			"default_textContent_style_overflow"=>"auto",
			"default_textContent_style_color"=>"rgb(200,200,200)",
			"default_textContent_style_padding-left"=>"25px",
			"default_textContent_style_padding-right"=>"25px",
			"default_textContent_style_padding-top"=>"5px",
			"default_textContent_style_padding-bottom"=>"25px",
			"default_textContent_style_right"=>"100px",
			"default_textContent_style_width"=>"350px",
			"default_textContent_style_height"=>"auto",
			"default_textContent_style_text-align"=>"justify",
			
			"default_navBar_style_background"=>"rgba(1,1,1,0.8)",
			"default_navBar_style_position"=>"fixed",
			"default_navBar_style_left"=>"0",
			"default_navBar_style_bottom"=>"100px",
			"default_navBar_style_padding"=>"20px",
			"default_navBar_style_font-size"=>"15px",
			
				"default_navBar a_style_padding"=>"25px",
				"default_navBar a_style_text-decoration"=>"none",
				"default_navBar a_style_color"=>"rgb(240,240,240)",
					"default_navBar a:hover_style_background"=>"rgba(250,250,250,0.8)",
					"default_navBar a:hover_style_color"=>"rgb(0,0,0)",
			
			"default_#images img_style_margin"=>"0",
			"default_#images img_style_border"=>"0",
			
			"default_startDiapo_style_padding"=>"20px",
			
				"default_startDiapo a_style_padding"=>"25px",
				// "default_startDiapo a_style_padding-top"=>"30px",
				"default_startDiapo a_style_padding-bottom"=>"30px"
	);
	$req=$DB->req("SELECT * FROM ".DB_PREFIX."settings");
	while($data=$DB->fetch($req)) {
		$settings[$data["setting"]]=$data["value"];
	}
	if(isset($_SESSION["settings"])) {
		foreach($_SESSION["settings"] as $sessionsetting) {
			$settings[$sessionsetting["name"]]=$sessionsetting["value"];
		}
	}
	$DB->freereq($req);
}