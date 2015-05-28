=== WooCommerce Email Validation ===
Contributors: hlashbrooke
Donate link: http://www.hughlashbrooke.com/donate/
Tags: woocommerce, email, validation, checkout
Requires at least: 4.0
Tested up to: 4.2.2
Stable tag: 1.2.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a 'confirm email address' field to the WooCommerce checkout page.

== Description ==

"WooCommerce Email Validation" is a small extension for WooCommerce that adds a 'confirm email address' field to the checkout page as a required field. This will ensure that your customers will enter a correct email address, making managing your orders far easier and more reliable. If a customer's email address does not match up then they will receive a standard validation error on the checkout page informing them that they need to make sure that their email addresses are the same.

This extension is WooCommerce 2.x compatible and supports localisation using WPML. It has built-in translations for English, German, Spanish, Dutch, Swedish, Japanese, Polish, Brazilian Portuguese, Hungarian and Serbian.

Want to contribute? [Fork the GitHub repository](https://github.com/hlashbrooke/Woocommerce-Email-Validation).

== Usage ==

Simply upload the plugin and you're good to go. There are no options to configure - the extension just works.

== Installation ==

Installing "WooCommerce Email Validation" can be done either by searching for "WooCommerce Email Validation" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via WordPress.org
1. Upload the ZIP file through the 'Plugins > Add New > Upload' screen in your WordPress dashboard
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How do I reorder the checkout fields? =

This plugin adds the email confirmation to the checkout fields and does not affect the order, but you are able to do this very easily by using the snippet provided [here](http://wordpress.stackexchange.com/questions/78339/how-to-reorder-billing-fields-in-woocommerce-checkout-template). The label/ID of the email confirmation field is `billing_email-2`.

== Screenshots ==

1. The confirm email address field as it is displayed in the Twenty Twelve theme.

== Changelog ==

= 1.2.8 =
* 2015-06-02
* [UPDATE] Adding Serbian translation (translation provided by Nebojsa Dolas)

= 1.2.7 =
* 2015-02-16
* [UPDATE] Adding Hungarian translation (translation provided by Kornel Schwarcz)
* [FIX] Adding WooCommerce 2.3.x compatibility

= 1.2.6 =
* 2015-01-21
* [UPDATE] Adding Brazilian Portuguese translation (translation provided by Samuel Costa)

= 1.2.5 =
* 2014-12-11
* [UPDATE] Adding Polish translation (translation provided by Michał Dybczak)

= 1.2.4 =
* 2014-10-13
* [UPDATE] Adding 'woocommerce_confirm_email_field_class' filter so field class can be changed dynamically
* [UPDATE] Adding Japanese translation (translation provided by Mako Kobayashi)
* [FIX] Adding billing email address as default field value for WooCommerce 2.2+

= 1.2.3 =
* 2014-09-05
* [UPDATE] Adding Swedish translation (translation provided by Mari Lindström)

= 1.2.2 =
* 2013-10-27
* [UPDATE] Adding Dutch translation (translation provided by Bryan Touw)

= 1.2.1 =
* 2013-07-12
* [UPDATE] Adding Spanish translation (translation provided by Marcelo Pedra)

= 1.2 =
* 2013-07-11
* [UPDATE] Adding German translation (translation provided by Dietmar Hohn)

= 1.1 =
* 2013-05-24
* [FIX] Fixing validation to be case-insensitive

= 1.0 =
* 2013-02-18
* Initial release #boom

== Upgrade Notice ==

= 1.2.8 =
* Adding Serbian translation (translation provided by Nebojsa Dolas)