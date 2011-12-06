<form method="post" id="wsl_setup_form" action="options.php">  
<?php settings_fields( 'wsl-settings-group-customize' ); ?>

<h3>Basic Settings </h3> 
<p style="margin:10px;"> 
	Enter the caption to be displayed above the social network login buttons: 

	<br />
	<br />

<?php 
	$wsl_settings_connect_with_label = get_option( 'wsl_settings_connect_with_label' );

	if( empty( $wsl_settings_connect_with_label ) ){
		$wsl_settings_connect_with_label = "Connect with:";
	}
?>
	<input type="text" class="inputgnrc" value="<?php echo $wsl_settings_connect_with_label; ?>" name="wsl_settings_connect_with_label" >
 
	<input type="submit" value="Save" /> 
</p>

<!--
	more options to come? meh maybe
-->

</form>

<br />

<h3>Preview</h3> 

<p style="margin:10px;"> 
	This is a preview of what should be on the comments section. <strong>Please do not test it here!</strong>
</p>

<div style="width: 600px;background-color: #FFFFE0;border:1px solid #E6DB55; border-radius: 3px;padding: 10px;margin-left:10px;">
<?php 
	wsl_render_login_form()
?>
</div>

<br />

<h3>Custom integration</h3> 

<ul style="list-style:disc inside;margin-left:25px;">
	<li>WordPress Social Login will attempts to work with the default WordPress comment, login and registration forms. If you want to add the social login widget to another location in your theme, you can insert the following code in that location:
	<pre style="width: 400px;background-color: #FFFFE0;border:1px solid #E6DB55; border-radius: 3px;padding: 10px;margin-top:15px;margin-left:10px;"> &lt;?php do_action( 'wordpress_social_login' ); ?&gt; </pre> 
	<br />
	</li> 

	<li>Also, if you are a developer or designer then you can customize it to your heart's content. 
		<ul style="list-style:circle inside;margin-left:25px;margin-top:10px;">
			<li>The default css styles are found at <strong>/wordpress-social-login/assets/css/style.css</strong>. </li> 
			<li>Social icons are found at <strong>/wordpress-social-login/assets/img/32x32/</strong>. These are made by WPZOOM.</li> 
			<li>The popup and loading screens are found at <strong>/wordpress-social-login/authenticate.php</strong>.</li> 
		</ul>
	</li> 
</ul>

