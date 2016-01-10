<?php
/**
 * @package WP MHN
 * @version 1.0
 */
/*
Plugin Name: WP MHN
Plugin URI: https://ryankozak.com
Description: Integrate your Modern Honeypot Network Server into your Wordpress Blog via MHN's REST API and WP Shortcodes.
Author: Ryan Kozak
Version: 1.0
Author URI: https://ryankozak.com
*/

require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'config.php';
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'honeypot.php';


$mhn_server = new Mhn_Server();


//[last_24hrs]
add_shortcode( 'last_24hrs', array( 'Mhn_Server', 'last_day' ) );

//[top_attackers]
add_shortcode( 'top_attackers', array( 'Mhn_Server', 'top_attackers' ) );

//[honeypot hp="wordpot"]
add_shortcode( 'honeypot', array( 'Mhn_Server', 'honeypot' ) );

//[sessions]
add_shortcode( 'sessions', array( 'Mhn_Server', 'sessions' ) );

