<?php
/*
 * Plugin Name: WooCommerce Email Validation
 * Version: 2.1.1
 * Plugin URI: http://wordpress.org/plugins/woocommerce-email-validation/
 * Description: Adds a 'confirm email address' field to the WooCommerce checkout page.
 * Author: Hugh Lashbrooke
 * Author URI: https://hugh.blog/
 * Requires at least: 4.0
 * Tested up to: 5.0
 *
 * Text domain: woocommerce-email-validation
 * Domain path: /languages/
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once( 'classes/class-woocommerce-email-validation.php' );

global $wcceav;
$wcceav = new WooCommerce_Email_Validation( __FILE__ );
