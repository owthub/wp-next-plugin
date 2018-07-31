<?php

/*
  Plugin Name: WP Next Plugin
  Description: Simple Plugin shows the direct form submission
  Version: 1.0.0
  Author: Online Web Tutor
 */

define("NEXT_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function next_menus_development() {
    add_menu_page("Next Plugin", "Next Plugin", "manage_options", "wp-next-plugin", "next_wp_list_call");
    add_submenu_page("wp-next-plugin", "List Students", "List Students", "manage_options", "wp-next-plugin", "next_wp_list_call");
    add_submenu_page("wp-next-plugin", "Addd Student", "Add Student", "manage_options", "wp-next-add", "next_wp_add_call");
}

add_action("admin_menu", "next_menus_development");

function next_wp_list_call() {
    include_once NEXT_PLUGIN_DIR_PATH . '/views/list-student.php';
}

function next_wp_add_call() {
    include_once NEXT_PLUGIN_DIR_PATH . '/views/add-student.php';
}

?>
