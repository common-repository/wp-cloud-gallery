<?php
/* Main Content */
# Prevent direct access
if (!defined('ABSPATH')) die('Error!');
?>
<?php function wpcloudgallery_settings_page() { ?>

<div id="wpcloudgallery_admin" class="wrap">

<div style="padding-bottom: 10px;">
<h1 style="font-size: 26px;">WP Cloud Gallery 1.5</h1>
</div>

<?php $wpcloudgallery_active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'galleries'; ?>

<h2 class="nav-tab-wrapper">

<a href="?page=wpcloudgallery_settings_page&amp;tab=galleries" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'galleries' ? 'nav-tab-active' : ''; ?>">Galleries</a>
<a href="?page=wpcloudgallery_settings_page&amp;tab=themes" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'themes' ? 'nav-tab-active' : ''; ?>">Themes</a>
<a href="?page=wpcloudgallery_settings_page&amp;tab=shortcodes" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'shortcodes' ? 'nav-tab-active' : ''; ?>">Shortcodes</a>
<a href="?page=wpcloudgallery_settings_page&amp;tab=apikey" style="margin-left: 25px;" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'apikey' ? 'nav-tab-active' : ''; ?>">API Key</a>
<a href="?page=wpcloudgallery_settings_page&amp;tab=import" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'import' ? 'nav-tab-active' : ''; ?>">Import</a>
<a href="?page=wpcloudgallery_settings_page&amp;tab=about" class="nav-tab <?php echo $wpcloudgallery_active_tab == 'about' ? 'nav-tab-active' : ''; ?>">About / FAQ</a>

</h2>

<!-- Galleries Tab -->
<?php if( $wpcloudgallery_active_tab == 'galleries' ) { // Galleries Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'G';
wpcloudgalleryapikey = '<?php echo $wpcloudgallery_admin_apikey; ?>';
</script>
<script src="https://js.wpcloudgallery.com/v11/arwp.admin.library.js"></script>
</div>

</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Galleries Tab ?>
<!-- End Galleries Tab -->


<!-- Themes Tab -->
<?php if( $wpcloudgallery_active_tab == 'themes' ) { // Themes Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'G';
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
<?php if( $wpcloudgallery_active_tab == 'shortcodes' ) { // Templats Tab ?>
<?php $wpcloudgallery_admin_apikey = get_site_option('wpcloudgallery_api_key'); ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 100%;">
<script>
wpcloudgalleryplatform = 'G';
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


<!-- API KEY Tab -->
<?php if( $wpcloudgallery_active_tab == 'apikey' ) { // APIKey Tab ?>

<form name="form1" method="post" action="">
    
<?php
if (isset($_POST['_wpnonce']) && isset($_POST['submit'])) {
	wpcloudgallery_update_option('wpcloudgallery_api_key', sanitize_key(trim($_POST['wpcloudgallery_api_key'])) );
	$confirmSave = 1;
}
wp_nonce_field('form-settings');
?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<h3>Please enter your API Key</h3>

<input type="text" style="width: 475px; font-size: 18px;" name="wpcloudgallery_api_key" value="<?php echo get_site_option('wpcloudgallery_api_key'); ?>"  placeholder="Enter your WP Cloud Gallery API Key" />

<br />

<div style="max-width: 550px; padding: 3px; font-size: 13px; line-height: 15px; color: #555555;">
<i>This is a unique API key that links your account on wpcloudgallery.com to the plugin here. The API key can be found on the API Key page on <a target="_blank" href="https://wpcloudgallery.com/d/apikey/">wpcloudgallery.com</a></i></div>

<br />

<div style="max-width: 550px; padding: 3px; font-size: 13px; line-height: 15px; color: #888888;">
<i>To preview this plugin with sample galleries and test them first before signing up for an account on wpcloudgallery.com, please leave the API Key blank.</i></div>

<?php if ($confirmSave) { echo '<br /><div style="font-size: 22px; color: #ff0000;">Your API Key has been saved</div>'; } ?>

<br />

<?php submit_button(); ?>

<br />

<div style="max-width: 525px; padding: 5px; font-size: 13px; line-height: 14px; color: #444444; border: 1px solid #cccccc; background-color: #fdfbd4;">
<i>Please note that you have to first create an account on  <a target="_blank" href="http://www.wpcloudgallery.com">wpcloudgallery.com</a> to use this plugin. All new accounts come with a free 14-day trial (no credit card required).</i></div>

</div>
</td>
</tr>

</tbody>
</table>
</form>

<br /><br /><br />

<?php } // End API Key Tab ?>
<!-- End API KEY Tab -->


<!-- Import Tab -->
<?php if( $wpcloudgallery_active_tab == 'import' ) { // Import Tab ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 750px; font-size: 14px;">

<h2>Importing from ZIP archives</h2>

Did you know WP Cloud Gallery offers automatic import from ZIP archives? Simply put all your photos into individual folders (name each folder with your desired gallery name), place these in to a main folder and create a zip archive of this main folder. Then use our ZIP upload utility to automatically import them in one easy step.<br /><br />

<span style="font-size: 18px;">You can preview our ZIP archive import utility right now by visiting (no sign up required):<br /><br />
&raquo; <a target="_blank" href="https://wpcloudgallery.com/importer">WP Cloud Gallery ZIP Archive Importer</a></span><br /><br />

<h2>Importing from NextGen, Envira and FooGallery</h2>

Importing from NextGen, Envira and FooGallery is even easier! We've created this powerful and completely free plugin that will automatically create a ZIP archive of your galleries and photos from these other plugins for easy import in to your WP Cloud Gallery account.<br /><br />

<span style="font-size: 18px;">You can download the plugin from here:<br /><br />
&raquo; <a target="_blank" href="https://wordpress.org/plugins/wp-gallery-exporter/">WordPress Gallery Exporter</a></span><br /><br />


</div>
</td>
</tr>

</tbody>
</table>

<br /><br /><br />

<?php } // End Import Tab ?>
<!-- End Import Tab -->


<!-- About Tab -->
<?php if( $wpcloudgallery_active_tab == 'about' ) { // About Tab ?>

<table class="form-table">
<tbody>

<tr valign="top">
<td>

<div style="max-width: 750px; font-size: 14px;">

<div style="max-width: 700px; padding: 12px; font-size: 21px; line-height: 22px; color: #444444; border: 1px solid #cccccc; background-color: #fdfbd4;">
We regret to inform our users that the wpcloudgallery platform and plugin is being retired on December 31, 2023 and will no longer be available or function after this date. Please migrate your galleries to another plugin of your choosing at this time. Thank you.
</div>
<br />

It will take just a few minutes create a new account, add new galleries and upload your photos. Then return here and enter your WP Cloud Gallery&nbsp;API&nbsp;Key under the <b>API Key</b> tab of this plugin.<br /><br />
Finally add the corresponding shortcodes as shown under the <b>Shortcodes</b> tab of this plugin to the Wordpress pages here on which would like display your galleries and photos.<br /><br />

<h3>What makes WP Cloud Gallery different than other plugins?</h3>

WP Cloud Gallery is different than almost all other WordPress plugins in that it's a cloud based solution. This means rather than the complex code running on your own server where it can slow down your own server or possibly cause conflict with other plugins and themes, it instead runs on cloud based servers and the content is remotely displayed in your Wordpress website.<br /><br />It's very similar for example to an embedded YouTube video. YouTube's servers handle the complex tasks of rendering the video, paying for storage and bandwidth, while your browser simply displays the video with virtually no impact on your own server's performance.<br /><br />
So unlike the many other plugins that typically add thousands of custom posts to your Wordpress database and upload tens of thousands of media files to your own server and slow your own Wordpress site in the process, this plugin stores everything in the cloud.<br /><br />

<h3>Can I embed galleries from 3rd party sites?</h3>

Absolutely! In addition to our own power built-in content management system, you can also embed photo/video galleries from SmugMug and YouTube. Simply click on the links on the left menu bar here to copy the shortcodes for your SmugMug and YouTube galleries after configuring them on our main website.<br /><br />

<h3>Will it work with all themes?</h3>

Our plugin should work with virtually all WordPress themes. Our plugin is very &quot;lightweight&quot; and should not conflict with any other plugins or impact the performance of your overall website.<br /><br />

<h3>How much this service cost?</h3>

After the the free trail period, affordable subscription plans are also available for users who would like continue using our service. Please visit <a target="_blank" href="https://wpcloudgallery.com">https://wpcloudgallery.com</a> for pricing information.<br /><br />

<h3>How often is the content updated?</h3>

All content is updated in realtime. You never have to manually sync or do anything special for your latest updates to be reflected in your Wordpress pages. Simply update your content on <a target="_blank" href="https://wpcloudgallery.com">https://wpcloudgallery.com</a> and magically see the changes reflected on your pages.<br /><br />
 
<h3>Are there limits on storage, bandwidth, number of visitors, etc.?</h3>

Nope! We offer truly unlimited usage! Whether you get one visitor or millions of visitors, our service will display your content using Amazon's worldwide content delivery network (CDN) much faster than what's possible with your own server and with virtually no performance impact on your own hosting service.<br /><br />

<h3>How can I create portfolios of my galleries?</h3>

Portfolios, which are essentially folders of galleries, can easily be created within Wordpress itself. Most advanced themes offer portfolio pages that match their theme and offer many other options such as featured images. For themes that do not support portfolios natively, there are many 3rd party plugins that offer this option, including Jetpack by Wordpress itself.<br /><br />

<h3>How can I get support?</h3>

This plugin is so easy to use that we're confident 99% of you won't need any extra help, but feel free to email us at support@wpcloudgallery.com if you have any questions about this service. Free unlimited support is available to all our valued users.<br /><br />

<h3>Like our service?</h3>

Please consider <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/wpcloudgallery">leaving us a review</a>.<br /><br /><br />

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