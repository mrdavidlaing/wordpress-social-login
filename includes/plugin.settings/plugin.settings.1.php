<style>
.wsl_aside { 
    float: right;
    margin: 6px; 
    margin-top:0px;
    margin-right:10px;
    position: relative;
    width: 250px;
    z-index: 200;
} 
.wsl_help {
    line-height: 1;
    padding: 8px;
	
	background-color: #FFFFE0;
	border:1px solid #E6DB55; 
	border-radius: 3px;
	padding: 10px; 
}
.wsl_alert {
    line-height: 1;
    padding: 8px;

	background-color: #FFEBE8;
	border:1px solid #CC0000; 
	border-radius: 3px;
	padding: 10px;      
}
</style>

<div class="wsl_help wsl_aside">
    <h3 style="margin: 0 0 5px;">Need Help?</h3>

	<p style="line-height: 19px;">
		If you are still new to things, we recommend that you read the <a href="options-general.php?page=wordpress-social-login&wslp=2">Plugin User Guide</a>.
	</p>
</div> 

<?php 
	$nok = true;

	foreach( $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG AS $item ){
		$provider_id = @ $item["provider_id"];
		
		if( get_option( 'wsl_settings_' . $provider_id . '_enabled' ) ){
			$nok = false;
		}
	}

	if( $nok ){
?>
<div style="clear:both" class="wsl_alert wsl_aside">
    <h3 style="margin: 0 0 5px;">Important</h3>

	<p style="line-height: 19px;">
		<b>No provider registered yet!</b>
		<br />
		Please start by reading the <a href="options-general.php?page=wordpress-social-login&wslp=2">Plugin User Guide</a> and make sure to run the <a href="options-general.php?page=wordpress-social-login&wslp=3">requirements test</a>!
	</p>
</div>
<?php
	}
?>

<p style="margin:10px;font-size: 14px;"> 
	<strong>WordPress Social Login</strong> allow your visitors to login and comment using their accounts on Facebook, Google, Yahoo, Twitter, Windows Live, Myspace, Foursquare, Linkedin, Gowalla, Last.fm, Tumblr and AOL. 
</p>

<!--  
	if I haven't been clear enough yet :
--> 
<p style="margin:10px;margin-top:30px;font-size: 14px;"> 
	<strong>IMPORTANT</strong>:
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. This plugin is <b>100% guaranteed NOT to work on every server</b>,
	<!--  and definitely not by idly wishing :D -->
	and worst, it will require some works on your side.
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Please take a minute to read the <a href="options-general.php?page=wordpress-social-login&wslp=2">Plugin User Guide</a> and make sure to run the <a href="options-general.php?page=wordpress-social-login&wslp=3">Requirements Test</a> before.
	<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. If you run into any issue, or have a feature request, the best way to reach me is at <b>hybridauth@gmail.com</b>
</p>

<div style="margin-top:30px;">
	<p style="margin:10px;font-size: 14px;">  
		Features:
	</p>

	<ul style="list-style:circle inside;margin-left:65px;font-size: 14px;">
		<li>free, unlimited,</li> 
		<li>white label, customizable,</li> 
		<li>social sign on solution,</li> 
		<li>with data kept in house</li> 
	</ul>

	<p style="margin:10px;margin-top:20px;font-size: 14px;">  
		To get started:
	</p>

	<ol style="margin-left:65px;font-size: 14px;">
		<li><strong>Setup</strong> the social networks you want to use,</li> 
		<li><strong>Customize</strong> the way you want it to look and behave.</li> 
<!--		
		<li>Get an <strong>insight</strong> into users informations and track trends in site registrations</li> 
-->
	</ol>

	<p style="margin:10px;margin-top:20px;font-size: 14px;">  
		and that is it!
	</p> 
</div>