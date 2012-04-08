<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'mt19mkma9p727yk07uvfqd3dil70qbtew' );

// WooFramework init
require_once ( get_template_directory() . '/functions/admin-init.php' );

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-plugins.php', 			// Theme specific plugins integrated in a theme
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-install.php',			// Theme Installation
				'includes/theme-woocommerce.php'		// WooCommerce specific
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );
				
foreach ( $includes as $i ) {
	locate_template( $i, true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

/* Various tutorials for dynamic population here: http://www.gravityhelp.com/documentation/page/Using_Dynamic_Population
*/

// parameter here is liquid_wta  to dynamically populate the WTA option, but we seem to need to return an array as here, not a string: http://www.gravityhelp.com/documentation/page/Dynamically_Populating_Drop_Down_Fields#Creating_an_Array_of_Choices

/* example 

add_filter('gform_field_value_your_parameter', 'my_custom_population_function');
function my_custom_population_function($value){
    return 'boom!';
}
*/

/* I think we need to pre-render this too, rather than storing and passing values for later.. http://www.gravityhelp.com/documentation/page/Gform_pre_render
Should probably learn some PH myself: http://php.net/manual/en/functions.variable-functions.php
http://php.net/manual/en/function.array-search.php
http://php.net/manual/en/functions.returning-values.php
This tut seems more helpful too for dropdowns & arrays: http://www.gravityhelp.com/documentation/page/Dynamically_Populating_Drop_Down_Fields
*/

<?php add_filter('gform_field_value_liquid_wta', 'gx_pop_liquid_wta');
function gx_pop_liquid_wta($value){
    return 'boom!';
}





/* Saving into user meta, based on: http://www.gravityhelp.com/forums/topic/right-parameter-names-to-pre-populate-the-names-fields#post-14044

also seems similar to: http://pastebin.com/3MNFekNx   & see: http://codex.wordpress.org/Database_Description#Table:_wp_usermeta

Maybe use this plugin to add keys and values, rather than CIMY Extra User Fields: http://wordpress.org/extend/plugins/add-user-meta/installation/

thecode:

<?php

// populate the field with "user_firstname" as the population parameter with the "first_name" of the current user
add_filter('gform_field_value_user_firstname', create_function("", '$value = populate_usermeta(\'first_name\'); return $value;' ));

// populate the field with "user_lastname" as the population parameter with the "last_name" of the current user
add_filter('gform_field_value_user_lastname', create_function("", '$value = populate_usermeta(\'last_name\'); return $value;' ));

// this function is called by both filters and returns the requested user meta of the current user
function populate_usermeta($meta_key){
    global $current_user;
    return $current_user->__get($meta_key);
}

?>

*/

/* ~~~ at some point should maybe try adding own field buttons to Gravity Forms.. http://wpsmith.net/2011/plugins/how-to-create-a-custom-form-field-in-gravity-forms-with-a-terms-of-service-form-field-example/

/* 1st part of example:

// Add a custom field button to the advanced to the field editor
add_filter( 'gform_add_field_buttons', 'wps_add_tos_field' );
function wps_add_tos_field( $field_groups ) {
    foreach( $field_groups as &$group ){
        if( $group["name"] == "advanced_fields" ){ // to add to the Advanced Fields
		//if( $group["name"] == "standard_fields" ){ // to add to the Standard Fields
		//if( $group["name"] == "post_fields" ){ // to add to the Standard Fields
            $group["fields"][] = array(
				"class"=>"button",
				"value" => __("Terms of Service", "gravityforms"),
				"onclick" => "StartAddField('tos');"
			);
            break;
        }
    }
    return $field_groups;
}
*/
// what is used for GFPA group?




/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>