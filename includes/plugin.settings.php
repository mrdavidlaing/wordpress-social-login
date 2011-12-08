<?php
function wsl_render_settings()
{
	GLOBAL $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG;

	$wslp = @ (int) $_REQUEST["wslp"];

	if( $wslp < 1 || $wslp > 7 ){
		$wslp = 1;
	}

	include "plugin.settings/plugin.settings.0.php";

	include "plugin.settings/plugin.settings.$wslp.php"; 
}
