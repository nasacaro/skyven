<?php
add_action( 'admin_menu', 'theme_register_my_custom_menu_page' );
function theme_register_my_custom_menu_page(){

    // Admin pages and sub pages for Home
    add_menu_page( 
        __( 'Home Page', TEXT_DOMAIN ), // $page_title
        'Home Page', // $menu_title
        'manage_options', // $capability
        'solution', // $menu_slug
        '', // $function or php page name
        '',  //THEME_URL.'assets/grantspass_icon.png', // $icon_url
        25 //$position
    ); 

    // Admin pages and sub pages for About
    // add_menu_page( 
    //     __( 'About Page', TEXT_DOMAIN ), // $page_title
    //     'About Page', // $menu_title
    //     'manage_options', // $capability
    //     'about-post', // $menu_slug
    //     '', // $function or php page name
    //     '',  //THEME_URL.'assets/grantspass_icon.png', // $icon_url
    //     25 //$position
    // ); 
    

    
}