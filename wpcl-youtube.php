<?php
/* YouTube Content */
# Prevent direct access
if (!defined('ABSPATH')) die('Error!');
?>
<?php function wpcloudgallery_settings_page_youtube() { ?>

<div id="wpcloudgallery_admin_youtube" class="wrap">

<div style="padding-bottom: 10px;">
<h1 style="font-size: 26px;">WP Cloud Gallery / YouTube</h1>
</div>

<?php $wpcloudgallery_active_tab_youtube = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'channels'; ?>

<h2 class="nav-tab-wrapper">

<a href="?page=wpcloudgallery_settings_page_youtube&amp;tab=channels" class="nav-tab <?php echo $wpcloudgallery_active_tab_youtube == 'channels' ? 'nav-tab-active' : ''; ?>">Channels</a>
<a href="?page=wpcloudgallery_settings_page_youtube&amp;tab=themes" class="nav-tab <?php echo $wpcloudgallery_active_tab_youtube == 'themes' ? 'nav-tab-active' : ''; ?>">Themes</a>
<a href="?page=wpcloudgallery_settings_page_youtube&amp;tab=shortcodes" class="nav-tab <?php echo $wpcloudgallery_active_tab_youtube == 'shortcodes' ? 'nav-tab-active' : ''; ?>">Shortcodes</a>
<a href="?page=wpcloudgallery_settings_page_youtube&amp;tab=about" style="margin-left: 25px;" class="nav-tab <?php echo $wpcloudgallery_active_tab_youtube == 'about' ? 'nav-tab-active' : ''; ?>">About</a>

</h2>

<!-- Channels Tab -->
<?php if( $wpcloudgallery_active_tab_youtube == 'channels' ) { // Galleries Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'Y';
wpcloudgalleryapikey = '<?php echo $wpcloudgallery_admin_apikey; ?>';
</script>
<script src="https://js.wpcloudgallery.com/v11/arwp.admin.pages.y.js"></script>
</div>

</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Galleries Tab ?>
<!-- End Galleries Tab -->


<!-- Themes Tab -->
<?php if( $wpcloudgallery_active_tab_youtube == 'themes' ) { // Themes Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'Y';
wpcloudgalleryapikey = '<?php echo $wpcloudgallery_admin_apikey; ?>';
</script>
<script src="https://js.wpcloudgallery.com/v11/arwp.admin.themes.js"></script>
</div>

</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Themes Tab ?>
<!-- End Themes Tab -->


<!-- Shortcodes Tab -->
<?php if( $wpcloudgallery_active_tab_youtube == 'shortcodes' ) { // Templats Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'Y';
wpcloudgalleryapikey = '<?php echo $wpcloudgallery_admin_apikey; ?>';
</script>
<script src="https://js.wpcloudgallery.com/v11/arwp.admin.shortcodes.js"></script>
</div>

</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Shortcodes Tab ?>
<!-- End Shortcodes Tab -->



<!-- About Tab -->
<?php if( $wpcloudgallery_active_tab_youtube == 'about' ) { // About Tab ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 750px; font-size: 14px;">

<span style="font-size: 36px;">YouTube</span><br /><br />

<span style="font-size: 20px;">Make your YouTube playlists into a powerful video gallery!</span><br /><br />

You can add as many as YouTube channels as you wish, and each playlist you create on YouTube can be viewed as a separate video gallery you can embed on your Wordpress pages.

<br /><br /><br />

</div>
</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End About Tab ?>
<!-- End About Tab -->


</div>
<?php } ?>