<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class WooCommerce_Email_Validation {
	private $dir;
	private $file;
	private $assets_dir;
	private $assets_url;
	private $text_domain;

	public function __construct( $file ) {
		$this->dir = dirname( $file );
		$this->file = $file;
		$this->assets_dir = trailingslashit( $this->dir ) . 'assets';
		$this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $file ) ) );

		// Handle localisation
		$this->load_plugin_textdomain();
		add_action( 'init', array( &$this, 'load_localisation' ), 0 );

		// Add second email address field to checkout
		add_filter( 'woocommerce_checkout_fields' , array( &$this , 'add_checkout_field' ) );

		// Ensure email addresses match
		add_filter( 'woocommerce_process_checkout_field_billing_email-2' , array( &$this , 'validate_email_address' ) );
		
	}

	public function add_checkout_field( $fields ) {

		$fields['billing']['billing_email-2'] = array(
			'label' 			=> __( 'Confirm Email Address', 'wc_emailvalidation' ),
			'placeholder' 		=> _x( 'Email Address', 'placeholder', 'wc_emailvalidation' ),
			'required' 			=> true,
			'class' 			=> array( 'form-row-first' ),
			'clear'				=> true
		);

		return $fields;

	}

	public function validate_email_address( $confirm_email ) {
		global $woocommerce;

		$billing_email = $woocommerce->checkout->posted['billing_email'];
		
		if( $confirm_email != $billing_email ) {
			$woocommerce->add_error( sprintf( __( '%1$sEmail addresses%2$s do not match.' , 'wc_emailvalidation' ) , '<strong>' , '</strong>' ) );
		}

		return $confirm_email;
	}

	public function load_localisation () {
		load_plugin_textdomain( 'wc_emailvalidation' , false , dirname( plugin_basename( $this->file ) ) . '/lang/' );
	}

	public function load_plugin_textdomain () {
		$domain = 'wc_emailvalidation';
	    $locale = apply_filters( 'plugin_locale' , get_locale() , $domain );
	 
	    load_textdomain( $domain , WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
	    load_plugin_textdomain( $domain , FALSE , dirname( plugin_basename( $this->file ) ) . '/lang/' );
	}
	
}