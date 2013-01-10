<?php
/**
* Hybrid_Providers_Dropbox provider adapter based on OAuth1 protocol
*/
class Hybrid_Providers_Dropbox extends Hybrid_Provider_Model_OAuth1
{
	/**
	* IDp wrappers initializer 
	*/
	function initialize()
	{
		parent::initialize();

		// Provider api end-points
		$this->api->api_base_url      = "https://api.dropbox.com/1/";
		$this->api->request_token_url = "https://api.dropbox.com/1/oauth/request_token";
		$this->api->authorize_url     = "https://www.dropbox.com/1/oauth/authorize";
		$this->api->access_token_url  = "https://api.dropbox.com/1/oauth/access_token";

		$this->api->curl_auth_header  = false;
	}

	/**
	* load the user profile from the IDp api client
	*/
	function getUserProfile()
	{
		$response = $this->api->get( 'account/info' );

		// check the last HTTP status code returned
		if ( $this->api->http_code != 200 ){
			throw new Exception( "User profile request failed! {$this->providerId} returned an error. " . $this->errorMessageByStatus( $this->api->http_code ), 6 );
		}

		if ( ! is_object( $response ) || ! isset( $response->uid ) ){
			throw new Exception( "User profile request failed! {$this->providerId} api returned an invalid response.", 6 );
		}

		# store the user profile.  
		$this->user->profile->identifier  = (property_exists($response,'uid'))?$response->uid:"";
		$this->user->profile->displayName = (property_exists($response,'display_name'))?$response->display_name:"";
		$this->user->profile->region      = (property_exists($response,'country'))?$response->country:"";

		return $this->user->profile;
 	}
	
	/**
	* begin login step 
	*/
	function loginBegin()
	{
		$tokens = $this->api->requestToken( $this->endpoint ); 

		// request tokens as recived from provider
		$this->request_tokens_raw = $tokens;
		
		// check the last HTTP status code returned
		if ( $this->api->http_code != 200 ){
			throw new Exception( "Authentication failed! {$this->providerId} returned an error. " . $this->errorMessageByStatus( $this->api->http_code ), 5 );
		}

		if ( ! isset( $tokens["oauth_token"] ) ){
			throw new Exception( "Authentication failed! {$this->providerId} returned an invalid oauth token.", 5 );
		}

		$this->token( "request_token"       , $tokens["oauth_token"] ); 
		$this->token( "request_token_secret", $tokens["oauth_token_secret"] ); 
		
		$extras = array('oauth_callback' => $this->api->redirect_uri);
		
		# redirect the user to the provider authentication url
		Hybrid_Auth::redirect( $this->api->authorizeUrl( $tokens, $extras ) );
	}
	
	/**
	* finish login step 
	*/
	function loginFinish()
	{
		// in case we get authorize=0
		if ( ! isset($_REQUEST['oauth_token']) || ( ! isset( $_REQUEST['uid'] ) ) ){ 
			throw new Exception( "Authentification failed! The user denied your request.", 5 );
		}

		$oauth_verifier = @ $_REQUEST['oauth_token'];

		// request an access token
		$tokens = $this->api->accessToken( $oauth_verifier );

		// access tokens as recived from provider
		$this->access_tokens_raw = $tokens;

		// check the last HTTP status code returned
		if ( $this->api->http_code != 200 ){
			throw new Exception( "Authentification failed! {$this->providerId} returned an error. " . $this->errorMessageByStatus( $this->api->http_code ), 5 );
		}

		// we should have an access_token, or else, something has gone wrong
		if ( ! isset( $tokens["oauth_token"] ) ){
			throw new Exception( "Authentification failed! {$this->providerId} returned an invalid access token.", 5 );
		}

		// we no more need to store requet tokens
		$this->deleteToken( "request_token"        );
		$this->deleteToken( "request_token_secret" );

		// sotre access_token for later user
		$this->token( "access_token"        , $tokens['oauth_token'] );
		$this->token( "access_token_secret" , $tokens['oauth_token_secret'] ); 

		// set user as logged in to the current provider
		$this->setUserConnected(); 
	}
}
