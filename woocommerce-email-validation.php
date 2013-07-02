<?php
/*
 * Plugin Name: WooCommerce Email Validation
 * Version: 1.1
 * Plugin URI: http://www.hughlashbrooke.com/
 * Description: Adds a 'confirm email address' field to the WooCommerce checkout page
 * Author: Hugh Lashbrooke
 * Author URI: http://www.hughlashbrooke.com/
 * Requires at least: 3.0
 * Tested up to: 3.5.1
 *
 * @package WordPress
 * @author Hugh Lashbrooke
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once( 'classes/class-woocommerce-email-validation.php' );

global $wcceav;
$wcceav = new WooCommerce_Email_Validation( __FILE__ );