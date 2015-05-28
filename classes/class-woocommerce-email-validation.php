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
		add_action( 'init', array( $this, 'load_localisation' ), 0 );

		// Add second email address field to checkout
		add_filter( 'woocommerce_checkout_fields' , array( $this , 'add_checkout_field' ) );

		// Add default value to second email address field (for WC 2.2+)
		add_filter( 'default_checkout_billing_email-2', array( $this, 'default_field_value' ), 10, 2 );

		// Ensure email addresses match
		add_filter( 'woocommerce_process_checkout_field_billing_email-2' , array( $this , 'validate_email_address' ) );

	}

	public function add_checkout_field( $fields = array() ) {

		$fields['billing']['billing_email-2'] = array(
			'label' 			=> __( 'Confirm Email Address', 'wc_emailvalidation' ),
			'placeholder' 		=> _x( 'Email Address', 'placeholder', 'wc_emailvalidation' ),
			'required' 			=> true,
			'class' 			=> apply_filters( 'woocommerce_confirm_email_field_class', array( 'form-row-first' ) ),
			'clear'				=> true,
			'validate'			=> array( 'email' ),
		);

		return $fields;

	}

	public function default_field_value( $value = null, $field = 'billing_email-2' ) {
		if ( is_user_logged_in() ) {
			global $current_user;
			$value = $current_user->user_email;
		}
		return $value;
	}

	public function validate_email_address( $confirm_email = '' ) {
		global $woocommerce;

		$billing_email = $woocommerce->checkout->posted['billing_email'];

		if( strtolower( $confirm_email ) != strtolower( $billing_email ) ) {

			$notice = sprintf( __( '%1$sEmail addresses%2$s do not match.' , 'wc_emailvalidation' ) , '<strong>' , '</strong>' );

			if ( version_compare( WC_VERSION, '2.3', '<' ) ) {
				$woocommerce->add_error( $notice );
			} else {
				wc_add_notice( $notice, 'error' );
			}

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