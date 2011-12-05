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
 
	<input type="submit" value="Save" /> 
</p>

<!--
	more options to come? meh maybe
-->

</form>

<br />

<h3>2. Preview</h3> 

<p style="margin-left:25px;margin:10px;"> 
	This is a preview of what should be on the comments section. <strong>Please do not test it here!<strong>
</p>

<div style="width: 600px;background-color: #FFFFE0;border:1px solid #E6DB55; border-radius: 3px;padding: 10px;margin-left:10px;">
<?php 
	wsl_render_login_form()
?>
</div>

