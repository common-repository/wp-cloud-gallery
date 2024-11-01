<?php
/*
Plugin Name: WP Cloud Gallery
Plugin URI: https://wpcloudgallery.com
Description: Add cloud based photo and video galleries to your Wordpress websites.
Author: wpcloudgallery.com
Author URI: https://wpcloudgallery.com
Text Domain: wpcloudgallery.com
Version: 1.6
*/

# Prevent direct access
if (!defined('ABSPATH')) die('Error!');

# Add jquery
wp_enqueue_script('jquery');

# Register [wpcloudgallery] shortcode
add_shortcode( 'wpcloudgallery', 'embed_wpcloudgallery' );

# Function to process content in wpcloudgallery shortcode, ex: [wpcloudgallery id="gallerycode"]
function embed_wpcloudgallery( $atts, $gid = '' ) {

  # Read url from 'url' attribute if not empty, this corresponds to the App
  if ( !empty( $atts['id'] ) ) $gid = $atts['id'];
	
	# Stored API Key
	$api_key = trim( get_site_option( 'wpcloudgallery_api_key' ) );
	
	# Url of the current site
  $site_name = preg_replace( '#^https?://#i', '', get_bloginfo( 'url' ) );
	
	# Generate code
	$code = '<script> ';
	$code .= 'wpcloudgallerycode = "' . $gid . '"; ';
	$code .= 'wpcloudgalleryapikey = "' . strtolower(substr($api_key, 0, 12)) . '"; ';
	$code .= 'wpcloudgallerysitename = "' . strtolower($site_name) . '"; ';
	$code .= '</script> ';
	$code .= '<script src="https://js.wpcloudgallery.com/v11/arwp.'.strtolower(substr($gid, 0, 1)).'.js"></script> ';
	
	# Return code
  return $code;
}


# Create wpcloudgallery settings menu for admin
add_action( 'admin_menu', 'wpcloudgallery_create_menu' );
add_action( 'network_admin_menu', 'wpcloudgallery_network_admin_create_menu' );

# Create link to plugin options page from plugins list
function wpcloudgallery_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=wpcloudgallery_settings_page">Settings</a>';
    array_push( $links, $settings_link );
    return $links;
}


$wpcloudgallery_plugin_basename = plugin_basename( __FILE__ );
add_filter( 'plugin_action_links_' . $wpcloudgallery_plugin_basename, 'wpcloudgallery_plugin_add_settings_link' );

# Create new top level menu for sites
function wpcloudgallery_create_menu() {
  
  $icon = 'data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0MTUuNDQgMzE3Ljc5Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmNsZ2FsbGVyeWljb248L3RpdGxlPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTM4NC45NCwyMDIuODNjLTgtMzcuODYtMzQtNjUuMTctNjUuMjMtNjUuMTctMjAuMzIsMC0zOC43NSwxMS43OS01MSwzMC40MS0xMS4zNC00NC42OS00My03Ny04MC44Mi03Ny00Ny4yNiwwLTg1LjA3LDUwLjI4LTg1LjA3LDExMS43MywwLC42Mi0xLDEuMjQtMSwxLjg2LTMzLjA4LDEwLjU1LTU5LjU1LDQ5LjY1LTU5LjU1LDk2LjgzaDBDNDEuODEsMzU2Ljc2LDc4LjIsNDA4LjksMTE5Ljc5LDQwOC45SDM4MS42M2M0Mi4wNiwwLDc2LjA5LTUyLjE0LDc2LjA5LTEwNi43NmgwQzQ1Ny43MiwyNDguNzYsNDI1LjExLDIwNS4zMSwzODQuOTQsMjAyLjgzWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTQyLjI4IC05MS4xKSIvPjwvc3ZnPg==';
  
  add_menu_page('WP CloudGallery Options', 'CloudGallery', 'edit_posts', 'wpcloudgallery_settings_page', 'wpcloudgallery_settings_page', $icon, 25);
  add_submenu_page( 'wpcloudgallery_settings_page', 'SmugMug', 'SmugMug', 'edit_posts', 'wpcloudgallery_settings_page_smugmug', 'wpcloudgallery_settings_page_smugmug');
  add_submenu_page( 'wpcloudgallery_settings_page', 'YouTube', 'YouTube', 'edit_posts', 'wpcloudgallery_settings_page_youtube', 'wpcloudgallery_settings_page_youtube');
  add_submenu_page( 'wpcloudgallery_settings_page', 'APIKey', 'API Key', 'edit_posts', 'wpcloudgallery_settings_page_apikey', 'wpcloudgallery_settings_page_apikey');
}

# Create new top level menu for network admin
function wpcloudgallery_network_admin_create_menu() {
  
  $icon = 'data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0MTUuNDQgMzE3Ljc5Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6I2ZmZjt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPmNsZ2FsbGVyeWljb248L3RpdGxlPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTM4NC45NCwyMDIuODNjLTgtMzcuODYtMzQtNjUuMTctNjUuMjMtNjUuMTctMjAuMzIsMC0zOC43NSwxMS43OS01MSwzMC40MS0xMS4zNC00NC42OS00My03Ny04MC44Mi03Ny00Ny4yNiwwLTg1LjA3LDUwLjI4LTg1LjA3LDExMS43MywwLC42Mi0xLDEuMjQtMSwxLjg2LTMzLjA4LDEwLjU1LTU5LjU1LDQ5LjY1LTU5LjU1LDk2LjgzaDBDNDEuODEsMzU2Ljc2LDc4LjIsNDA4LjksMTE5Ljc5LDQwOC45SDM4MS42M2M0Mi4wNiwwLDc2LjA5LTUyLjE0LDc2LjA5LTEwNi43NmgwQzQ1Ny43MiwyNDguNzYsNDI1LjExLDIwNS4zMSwzODQuOTQsMjAyLjgzWiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTQyLjI4IC05MS4xKSIvPjwvc3ZnPg==';
  
  add_menu_page('WP CloudGallery Options', 'CloudGallery', 'edit_posts', 'wpcloudgallery_settings_page', 'wpcloudgallery_settings_page', $icon, 25);
  add_submenu_page( 'wpcloudgallery_settings_page', 'SmugMug', 'SmugMug', 'edit_posts', 'wpcloudgallery_settings_page_smugmug', 'wpcloudgallery_settings_page_smugmug');
  add_submenu_page( 'wpcloudgallery_settings_page', 'YouTube', 'YouTube', 'edit_posts', 'wpcloudgallery_settings_page_youtube', 'wpcloudgallery_settings_page_youtube');
  add_submenu_page( 'wpcloudgallery_settings_page', 'APIKey', 'API Key', 'edit_posts', 'wpcloudgallery_settings_page_apikey', 'wpcloudgallery_settings_page_apikey');
  
}

function wpcloudgallery_update_option($name, $value) {
    return is_multisite() ? update_site_option($name, $value) : update_option($name, $value);
}

# include subsections

include 'wpcl-main.php'; 

include 'wpcl-smugmug.php'; 

include 'wpcl-youtube.php'; 

include 'wpcl-apikey.php'; 

?>