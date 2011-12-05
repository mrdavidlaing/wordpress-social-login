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

</form>

<!--
	more to come? meh maybe
-->

 