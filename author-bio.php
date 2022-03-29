<?php

/**
 * @package Author Bio
 */

/*
 
Plugin Name: Author Bio Plugin
 
Plugin URI: #
 
Description: Used by millions

Version: 1.0.0
 
Author: Automattic
 
Author URI: #
 
License: GPLv2 or later
 
Text Domain: author_bio
 
*/

defined('ABSPATH') || die();

/**
 * Defining constants
 */
define('AB_PATH', __DIR__);
define('AB_FILE', dirname(__FILE__) );
define('AB_URL', plugins_url('', AB_FILE));
define('AB_ASSETS', AB_URL . '/assets');

/**
* Initializing init file
 */
include_once AB_FILE. '/inc/init.php';

/**
 * Adding CSS File
 * @return void
 */
function ab_enqueue_scripts(){
    wp_enqueue_style('ab-style', plugins_url('assets/css/bootstrap.css', __FILE__ ));
}
add_action('wp_enqueue_scripts', 'ab_enqueue_scripts');
