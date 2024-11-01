<?php
/**
 * Plugin Name:       WikiLMS - WordPress LMS Plugin for eLearning
 * Description:       An intuitive Learning Management System (LMS) plugin called WikiLMS may easily transform your WordPress website into an engaging online learning hub.
 * Version:           1.0.2
 * Author:            Devthrow
 * Author URI:        https://devthrow.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wikilms
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Defines CONSTANTS for Whole plugins.
 */
define( 'WIKILMS_VERSION', '1.0.2' );
define( 'WIKILMS_PLUGIN_DIR_PATH', untrailingslashit(plugin_dir_path(__FILE__)) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wikilms-activator.php
 */
function activate_wikilms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wikilms-activator.php';
	Wikilms_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wikilms-deactivator.php
 */
function deactivate_wikilms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wikilms-deactivator.php';
	Wikilms_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wikilms' );
register_deactivation_hook( __FILE__, 'deactivate_wikilms' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wikilms.php';
require plugin_dir_path( __FILE__ ) . 'includes/helpers/wikilms-core-functions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wikilms() {

	$plugin = new Wikilms();
	$plugin->run();

}
run_wikilms();

/**
 * Custom template layout in plugin folder
 * 
 */ 
function wikilms_custom_templates($templates){

  if( is_singular( 'wl-courses' ) ):
    $templates = plugin_dir_path( __FILE__ ) . '/templates/single-course.php';
  elseif( is_post_type_archive ( 'wl-courses' ) ):
    $templates = plugin_dir_path( __FILE__ ) . '/templates/archive-course.php';
  endif;

  return $templates;
}

add_filter( 'template_include', 'wikilms_custom_templates' ) ;

/**
 * The below function will help to load template file from plugin directory of wordpress
 *  Extracted from : http://wordpress.stackexchange.com/questions/94343/get-template-part-from-plugin
 */ 
 function wikilms_get_tpl_part($slug, $name = null) {

  do_action("wikilms_get_tpl_part_{$slug}", $slug, $name);

  $templates = array();
  if (isset($name))
      $templates[] = "{$slug}-{$name}.php";

  $templates[] = "{$slug}.php";

  wikilms_get_tpl_path($templates, true, false);
}

/* Extend locate_template from WP Core 
* Define a location of your plugin file dir to a constant in this case = WIKILMS_PLUGIN_DIR_PATH 
* Note: WIKILMS_PLUGIN_DIR_PATH - can be any folder/subdirectory within your plugin files 
*/ 
function wikilms_get_tpl_path($template_names, $load = false, $require_once = true ) {
    $located = ''; 
    foreach ( (array) $template_names as $template_name ) { 
      if ( !$template_name ) 
        continue; 

      /* search file within the PLUGIN_DIR_PATH only */ 
      if ( file_exists(WIKILMS_PLUGIN_DIR_PATH . $template_name)) { 
        $located = WIKILMS_PLUGIN_DIR_PATH . $template_name; 
        break; 
      } 
    }

    if ( $load && '' != $located )
        load_template( $located, $require_once );

    return $located;
}

