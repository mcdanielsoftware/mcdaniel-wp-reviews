<?php
/**
 * Plugin Name:     McDaniel WP Reviews
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Rory McDaniel
 * Author URI:      YOUR SITE HERE
 * Text Domain:     mcdaniel-wp-reviews
 * Domain Path:     /languages
 * Version:         1.0.1
 *
 * @package         Mcdaniel_Wp_Reviews
 */

use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

require_once __DIR__ .'/vendor/autoload.php';

function mcdaniel_add_plugin_settings_page() {
	Container::make( 'theme_options', __( 'Google Reviews Plugin Page' ) )
		->set_page_parent( 'options-general.php' )
		->add_fields( [
			Field::make( 'text', 'mcd_google_api_key', 'Google API Key' ),
            Field::make( 'text', 'mcd_google_reviews_link', 'Google Reviews Link' ),
			Field::make( 'text', 'mcd_star_minimum', 'Star Rating Minimum' )
				->set_attribute( 'min', 1 )
				->set_attribute( 'max', 5 )
				->set_default_value( 5 ),
			Field::make( 'text', 'mcd_google_place_id', 'Google Place ID' ),
		]);
}
add_action( 'carbon_fields_register_fields', 'mcdaniel_add_plugin_settings_page' );

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	Carbon_Fields::boot();
}

add_action('wp_footer', function(){
    if(wp_is_moble()){
        $content = '<iframe id="reviews-iframe" src="SOURCE_URL"></iframe>';
    } else {
        $content = '<iframe id="reviews-iframe" class="open" src="SOURCE_URL"></iframe>';
    }

    $content = str_replace('SOURCE_URL', get_rest_url(get_current_blog_id(), 'mcdaniel/v1/iframe/get'), $content);
    $css = file_get_contents(__DIR__ . '/iframe.css');
   // $css = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $css));
    // no comment
    $content .= '<style>' . $css . '</style>';
    $content .= '<style>footer {padding-bottom: 110px!important;}</style>';
    echo $content;
});


add_action( 'rest_api_init', 'register_iframe_route');

function register_iframe_route(){
    register_rest_route( 'mcdaniel/v1', '/iframe/get', array(
        'methods' => 'GET',
        'callback' => 'get_iframe_content',
    ));
}

function get_iframe_content(\WP_REST_Request $request) {
    if(!verifySettings()){
        return;
    }
    header("Content-Type: text/html");
    include __DIR__ . '/template.php';
    exit;
}

function verifySettings() {
    $key = carbon_get_theme_option( 'mcd_google_api_key' );
    $link = carbon_get_theme_option( 'mcd_google_reviews_link' );
    $placeId = carbon_get_theme_option( 'mcd_google_place_id' );
    if($key && $link && $placeId){
        return true;
    }
    return false;
}




