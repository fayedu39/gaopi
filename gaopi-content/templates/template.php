<!DOCTYPE html>
<html lang="<?php displayPageLang(); ?>">
	<head>
		<meta charset="utf-8"/>
		<title><?php displayPageTitle(); ?></title>
		<style type="text/css">
			body, html {
				margin:0;
				padding:0;
				height:100%;
				width:100%;
				overflow:hidden;
				<?php
					displayStyleElement("body","background");
					displayStyleElement("body","font-family");
					displayStyleElement("body","font-size");
					displayStyleElement("body","color");
				?>
			}
			
			#content {
				width:100%;
				height:100%;
				position:absolute;
				top:0;
				left:0;
				overflow:auto;
			}
			#images {
				position:absolute;
				top:0;
				left:0;
				width:100%;
			}
				#images img {
					width:100%;
					<?php
						displayStyleElement("#images img","margin");
						displayStyleElement("#images img","margin-top");
						displayStyleElement("#images img","margin-left");
						displayStyleElement("#images img","margin-right");
						displayStyleElement("#images img","margin-bottom");
						displayStyleElement("#images img","border");
						displayStyleElement("#images img","border-top");
						displayStyleElement("#images img","border-left");
						displayStyleElement("#images img","border-right");
						displayStyleElement("#images img","border-bottom");
					?>
				}
			#textContent {
				<?php
					displayStyleElement("textContent","color");
					displayStyleElement("textContent","position");
					displayStyleElement("textContent","overflow");
					displayStyleElement("textContent","background");
					displayStyleElement("textContent","left");
					displayStyleElement("textContent","right");
					displayStyleElement("textContent","padding");
					displayStyleElement("textContent","padding-right");
					displayStyleElement("textContent","padding-left");
					displayStyleElement("textContent","padding-top");
					displayStyleElement("textContent","padding-bottom");
					displayStyleElement("textContent","width");
					displayStyleElement("textContent","height");
					displayStyleElement("textContent","text-align");
				?>
				
			}
				#textContent h1 {
				}
				#textContent.Hidden {
					display:none;
				}
			#navBar {
				<?php
					displayStyleElement("navBar","color");
					displayStyleElement("navBar","position");
					displayStyleElement("navBar","overflow");
					displayStyleElement("navBar","background");
					displayStyleElement("navBar","left");
					displayStyleElement("navBar","right");
					displayStyleElement("navBar","top");
					displayStyleElement("navBar","bottom");
					displayStyleElement("navBar","padding");
					displayStyleElement("navBar","padding-right");
					displayStyleElement("navBar","padding-left");
					displayStyleElement("navBar","padding-top");
					displayStyleElement("navBar","padding-bottom");
					displayStyleElement("navBar","width");
					displayStyleElement("navBar","height");
					displayStyleElement("navBar","color");
					displayStyleElement("navBar","text-align");
					displayStyleElement("navBar","font-size");
				?>
			}
				#navBar a {
					<?php
						displayStyleElement("navBar a","color");
						displayStyleElement("navBar a","text-decoration");
						displayStyleElement("navBar a","padding");
					?>
				}
					#navBar a:hover {
						<?php
							displayStyleElement("navBar a:hover","color");
							displayStyleElement("navBar a:hover","background");
							displayStyleElement("navBar a:hover","text-decoration");
						?>
					}
				#navBar.Hidden a {
					display:none;
				}
					#navBar.Hidden .toggleLink {
						display:inline;
					}
			#langBar {
				position:absolute;
				top:0;
				right:0;
			}
				#langBar:hover {
					<?php
						displayStyleElement("navBar","background");
					?>
				}
				#langBar img {
					width:15px;
				}
				#langBar a {
					<?php
						displayStyleElement("navBar a","color");
						displayStyleElement("navBar a","text-decoration");
					?>
				}
					#langBar a:hover {
						<?php
							displayStyleElement("navBar a:hover","color");
							displayStyleElement("navBar a:hover","background");
						?>
					}
			#diapo {
				position:fixed;
				width:100%;
				height:100%;
				display:none;
			}
			.diapo {
				width:100%;
				height:100%;
				overflow:auto;
				background:black;
			}
			#diapoControls {
				<?php
					displayStyleElement("navBar","font-size");
				?>
				position:fixed;
				top:20px;
				right:0;
				padding:10px;
				background:rgba(0,0,0,0.3);
				display:none;
			}
				#diapoControls:hover {
					background:rgba(0,0,0,0.8);
				}
				
				#diapoControls .Hidden {
					display:none;
					padding:15px;
				}
					#diapoControls:hover span.Hidden {
						display:inline;
					}
				
				#diapoControls a {
						<?php
							displayStyleElement("navBar a","color");
							displayStyleElement("navBar a","text-decoration");
						?>
						padding:15px;
				}
					#diapoControls a:hover {
							<?php
								displayStyleElement("navBar a:hover","color");
								displayStyleElement("navBar a:hover","background");
								displayStyleElement("navBar a:hover","text-decoration");
							?>
					}
			#startDiapo {
				position:fixed;
				top:0;
				left:30px;
				<?php
					displayStyleElement("navBar","color");
					displayStyleElement("navBar","background");
					displayStyleElement("navBar","font-size");
					displayStyleElement("startDiapo","padding");
					displayStyleElement("startDiapo","padding-right");
					displayStyleElement("startDiapo","padding-left");
					displayStyleElement("startDiapo","padding-top");
					displayStyleElement("startDiapo","padding-bottom");
				?>
			}
				#startDiapo a {
						<?php
							displayStyleElement("navBar a","color");
							displayStyleElement("navBar a","text-decoration");
							displayStyleElement("startDiapo a","padding");
							displayStyleElement("startDiapo a","margin");
							displayStyleElement("startDiapo a","padding-left");
							displayStyleElement("startDiapo a","padding-right");
							displayStyleElement("startDiapo a","padding-top");
							displayStyleElement("startDiapo a","padding-bottom");
						?>
				}
					#startDiapo a:hover {
							<?php
								displayStyleElement("navBar a:hover","color");
								displayStyleElement("navBar a:hover","background");
								displayStyleElement("navBar a:hover","text-decoration");
							?>
					}
		</style>
		<script type="text/javascript" src="<?php echo($settings["siteUrl"]); ?>/gaopi-includes/gaopi.js"></script>
	</head>
	<body>
		<div id="content">
					<div id="images">
						<?php
							foreach($page["content"]["images"] as $image) {
								echo('<img alt="'.$image["name"].'" src="'.adaptText($image["url"]).'"/><br/>');
							}
						?>
					</div>	
					<div id="textContent">
						<h1><?php displayPageTitle(); ?></h1>
						<div>
							<?php
								echo(adaptText($page["content"]["text"]));
							?>
						</div>
					</div>
		</div>
		<div id="navBar">
			<?php
				if(setting("displayAllPagesInNavBar")=="yes") {
					$pageslist=getPagesList();
					
					foreach($pageslist as $currentpage) {
						echo('<a href="?p='.$currentpage["id"].'">'.getPageTitle($currentpage["id"]).'</a>');
					}
					
				}
				if(setting("allowToHide")=="yes") { ?>
					<a href="#" onclick="toggleHide(this)" class="toggleLink">&lt;</a>
				<?php }
			?>
		</div>
		<div id="langBar">
			<?php
				echo(_t("View in :"));
				foreach($languages as $lang) {
					echo(' <a href="?p='.$page["id"].'&lang='.$lang.'">');
					if(file_exists(ABSPATH.GPCONTENT."/images/languages/".$lang.".png")) {
						echo(adaptText(' <img src="#{siteUrl}/gaopi-content/images/languages/'.$lang.'.png" alt="'.$lang.' flag"/>'));
					}
					echo($languageName[$lang].'</a>');
				}
			?>
		</div>
		<?php if(count($page["content"]["diapoImages"])) { ?>
			<div id="startDiapo">
				<a href="#" onclick="toggleDiapo()"><?php echo(_t("Start slideshow")); ?></a>
			</div>
			<div id="diapo">
				<?php foreach($page["content"]["diapoImages"] as $image) { ?>
					<div class="diapo"><img <?php echo('alt="'.$image["name"].'" src="'.adaptText($image["url"]).'"'); ?> style="width:100%;"/></div>
				<?php } ?>
			</div>
			<div id="diapoControls">
				<span class="Hidden">
					<span id="diapoProgress">1</span>
					/
					<span id="nofd">1</span>
				</span>
				<a href="#" onclick="previousDiapo()">&lt;</a>
				<a href="#" onclick="nextDiapo()">&gt;</a>
				<a href="#" onclick="toggleDiapo()">x</a>
			</div>
			<script type="text/javascript">
				countDiapos();
			</script>
		<?php } ?>
	</body>
</html>