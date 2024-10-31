<?php
/*
Plugin Name: Multi-lingual Feedback Tab
Plugin URI: http://www.onehourtranslation.com/translation/wordpress-multi-lingual-feedback-tab
Description: Multi-Lingual Feedback Tab (MLFT) is a Free fully functional and easy to customize feedback tab by One Hour Translation. MLFT allows any site owner to add multi-lingual feedback tab to any page in a simple and easy way.  
Author: One Hour Translation
Version: 1.00
Author URI: http://www.onehourtranslation.com/translation/wordpress-multi-lingual-feedback-tab
*/


// Add the tab to the footer of the website
// *** This will work only if wp-footer / get_footer functions are used in the WordPress template (true in 99%) ***

function add_to_footer () { 
    if (get_option('mlft_code')!="")
    {
        //Insert the code only if the user entered the mltf code
        echo get_option('mlft_code');        
    }
}
add_action('wp_footer', 'add_to_footer');

function mlft_admin() {  
    include('mlft_admin.php');  
}  

function mlft_admin_generator() {  
    //include('mlft_admin.php');  
}  

function mlft_admin_help() {  
    include('mlft_help.php');     
}  

function mlft_admin_actions() {
	add_menu_page( "Multi-lingual Feedback Tab", "Multi-lingual Feedback Tab", "administrator", "mlft_top", "mlft_admin", plugin_dir_url( __FILE__ ) . 'icon.png' );
  //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_submenu_page( "mlft_top", "Multi-lingual Feedback Tab", "MLFT settings", "administrator" , "mlft_top", "mlft_admin_generator" );
  //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );  
   // add_submenu_page( "mlft_top", "Help", "Help", "administrator" , "mlft_help", "mlft_admin_help" );
  //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
    //add_action( 'admin_head-mlft_help', 'mlft_admin_header' );
    $mypage = add_management_page( "Multi-lingual Feedback Tab", "Multi-lingual Feedback Tab", "administrator", "mlft_top", "mlft_admin", plugin_dir_url( __FILE__ ) . 'icon.png' );
                  
}

function mlft_deactivate() {
    //If there is no action, he never entered the menu    
    if (get_option('mlft_added')=="YES") 
    {
        delete_option('mlft_added');
        delete_option('mlft_code');
        //Remove the tab from footer   
    }
}


function mlft_activate()
{
        //add_option( 'mlft_unique_user', $output);            
        add_action('wp_footer', 'your_function');
}

add_action('admin_menu', 'mlft_admin_actions');  

register_deactivation_hook(__FILE__,'mlft_deactivate');
register_activation_hook( __FILE__, 'mlft_activate');
?>