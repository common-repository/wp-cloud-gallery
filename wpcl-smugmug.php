<?php
/* SmugMug Content */
# Prevent direct access
if (!defined('ABSPATH')) die('Error!');
?>
<?php function wpcloudgallery_settings_page_smugmug() { ?>

<div id="wpcloudgallery_admin_smugmug" class="wrap">

<div style="padding-bottom: 10px;">
<h1 style="font-size: 26px;">WP Cloud Gallery / SmugMug</h1>
</div>

<?php $wpcloudgallery_active_tab_smugmug = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'galleries'; ?>

<h2 class="nav-tab-wrapper">

<a href="?page=wpcloudgallery_settings_page_smugmug&amp;tab=galleries" class="nav-tab <?php echo $wpcloudgallery_active_tab_smugmug == 'galleries' ? 'nav-tab-active' : ''; ?>">Galleries</a>
<a href="?page=wpcloudgallery_settings_page_smugmug&amp;tab=themes" class="nav-tab <?php echo $wpcloudgallery_active_tab_smugmug == 'themes' ? 'nav-tab-active' : ''; ?>">Themes</a>
<a href="?page=wpcloudgallery_settings_page_smugmug&amp;tab=shortcodes" class="nav-tab <?php echo $wpcloudgallery_active_tab_smugmug == 'shortcodes' ? 'nav-tab-active' : ''; ?>">Shortcodes</a>
<a href="?page=wpcloudgallery_settings_page_smugmug&amp;tab=about" style="margin-left: 25px;" class="nav-tab <?php echo $wpcloudgallery_active_tab_smugmug == 'about' ? 'nav-tab-active' : ''; ?>">About</a>

</h2>

<!-- Galleries Tab -->
<?php if( $wpcloudgallery_active_tab_smugmug == 'galleries' ) { // Galleries Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'S';
wpcloudgalleryapikey = '<?php echo $wpcloudgallery_admin_apikey; ?>';
</script>
<script src="https://js.wpcloudgallery.com/v11/arwp.admin.pages.s.js"></script>
</div>

</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Galleries Tab ?>
<!-- End Galleries Tab -->


<!-- Themes Tab -->
<?php if( $wpcloudgallery_active_tab_smugmug == 'themes' ) { // Themes Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'S';
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
<?php if( $wpcloudgallery_active_tab_smugmug == 'shortcodes' ) { // Templats Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'S';
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
<?php if( $wpcloudgallery_active_tab_smugmug == 'about' ) { // About Tab ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 750px; font-size: 14px;">

<span style="font-size: 36px;">SmugMug</span><br /><br />

<span style="font-size: 20px;">Add your SmugMug galleries to your Wordpress pages.</span><br /><br />

SmugMug is an incredibly powerful platform for displaying and selling your photos, and with WP Cloud Gallery, you can embed your SmugMug galleries in your Wordpress pages just as easily as embedding the galleries you create on our own platform.<br /><br />

You can add as many as separate SmugMug accounts as you wish, and embed galleries from one or more SmugMug accounts to your your Wordpress pages.<br /><br />

<div style="max-width: 575px; padding: 12px; font-size: 15px; line-height: 18px; color: #444444; border: 1px solid #cccccc; background-color: #fdfbd4;">
To sign up for a free 14 day trial of SmugMug, please visit <a target="_blank" href="https://smugmug.com">https://smugmug.com</a>
</div>

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