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
        // Add shortcode
        add_shortcode('contact-form', array($this, 'load_shortcode'));
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
    plugin_dir_url( __FILE__ ) . 'css/simple-contact-form.css',
    array(),
    1,
    'all'
    );
    wp_enqueue_script(
    'simple-contact-form',
    plugin_dir_url( __FILE__ ). 'js/simple-contact-form.js',
    array('jquery'),
    1,
    true
    );
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true);
    }


    public function load_shortcode()
    {?>


<div class="simple-contact-form">
    <div class="container">
<h1>Send us an email</h1>
-
<p>Please fill the below form</p>
            <form id="simple-contact-form_form">
                <div class="form-group mb-2">
                    <input type="text" placeholder="Name" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <input type="tel" placeholder="Phone" class="form-control">
                </div>
                        <div class="form-group mb-2">
                            <textarea placeholder="Type your message" class="form-control"></textarea>
            </div>
            <div class="form-group">
            <button class="btn btn-success btn-block w-100">Send Message</button>
            </div>
            </form>
</div>
</div>
   <?php }




    }

    New AsadSimpleForm();
 ?>