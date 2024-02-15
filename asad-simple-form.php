<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           asad-simple-form
 *
 * @wordpress-plugin
 * Plugin Name:       asad-simple-form
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Abdul Wajid
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       asad-simple-form
 * Domain Path:       /languages
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class AsadSimpleForm{

    public function __construct(){
    add_action('init', array($this, 'create_custom_post_type'));
    // Add assets (js, css, etc)
add_action('wp_enqueue_scripts', array($this, 'load_assets'));
    }

    public function create_custom_post_type(){

        $args = array(
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
            'name' => 'Contact Form',
            'singular_name' => 'Contact Form Entry'
            ),
            'menu_icon' => 'dashicons-media-text',
            );
            register_post_type('asad_simple_form', $args);
    }

    public function load_assets()
    {
    wp_enqueue_style(
    'simple-contact-form',
    plugin_dir_url( _FILE_ ) . 'css/simple-contact-form.css',
    array(),
    1,
    'all'
    );
    wp_enqueue_script(
    'simple-contact-form',
    plugin_dir_url( __FILE_ ). 'js/simple-contact-form.js',
    array('jquery'),
    1,
    true
    )
    }

    }

    New AsadSimpleForm();
 ?>