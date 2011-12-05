<form method="post" id="wsl_setup_form" action="options.php">  
<?php settings_fields( 'wsl-settings-group-customize' ); ?>

<h3>1. Basic Settings </h3> 
<p style="margin-left:25px;margin:10px;"> 
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
 
	<input type="submit" class="_inputsave" value="Save" /> 
</p>

</form>

<br />

<h3>2. Custom integration</h3> 
<p style="margin-left:25px;margin:10px;"> 
	WordPress Social Login will attempts to work with the default WordPress comment, login and registration forms. 

	<br /> 
	<br /> 
	If you want to add the social login widget to another location in your theme, you can insert the following code in that location:

	<pre style="width: 400px;background-color: #FFFFE0;border:1px solid #E6DB55; border-radius: 3px;padding: 10px;margin-left:10px;"> &lt;?php do_action( 'wordpress_social_login' ); ?&gt; </pre> 
</p>
 