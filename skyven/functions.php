<?php
define('THEME_NAME','Skyven');
define('TEXT_DOMAIN','skyven');
define('SITE_URL',site_url('/'));
define('THEME_URL',get_theme_file_uri().'/');
define('COMPANY_NAME','Skyven Technologies');
define('COMPANY_EMAIL','noreply@skyven.co');
define('ADMIN_EMAIL','gene@skyven.co');

//////////////////////////////////////////////////////////////

include_once('includes/autoload.php');


/* SVG Code
 * Add this line in SVG Image
 * <?xml version="1.0" encoding="utf-8"?>
 * */
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');



// Stop WP adding extra <p> </p> to your pages' content and excerpt
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Common Settings',
        'menu_title'    => 'Common',
        'parent_slug'   => 'theme-general-settings',
    ));
    
}

add_action( 'init', 'member_init' );
/**
 * Register a FAQs post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function member_init() {
    $labels = array(
        'name'               => _x( 'Members', 'post type general name'),
        'singular_name'      => _x( 'Member', 'post type singular name'),
        'menu_name'          => _x( 'Members', 'admin menu'),
        'name_admin_bar'     => _x( 'Member', 'add new on admin bar'),
        'add_new'            => _x( 'Add New', 'Member' ),
        'add_new_item'       => __( 'Add New Member' ),
        'new_item'           => __( 'New Member' ),
        'edit_item'          => __( 'Edit Member'),
        'view_item'          => __( 'View Member' ),
        'all_items'          => __( 'All Members' ),
        'search_items'       => __( 'Search Members' ),
        'parent_item_colon'  => __( 'Parent Members:' ),
        'not_found'          => __( 'No Members found.' ),
        'not_found_in_trash' => __( 'No Members found in Trash.' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'members' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'exclude_from_search'=>true,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        // This is where we add taxonomies to our CPT
        //'taxonomies'          => array( 'category' ),
    );

    register_post_type( 'members', $args );
}

/**
 * Create contact us table and function
 */
function creatDatabaseContact(){
    global $wpdb;
    $charsetCollate = $wpdb->get_charset_collate();
    $contactTable = $wpdb->prefix . 'contact_us';
    $createContactTable = "
        CREATE TABLE IF NOT EXISTS `{$contactTable}` (
            `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `phone` varchar(30) NOT NULL,
            `message` longtext NULL,
            `datetime` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $createContactTable );
}

add_action('after_switch_theme', 'creatDatabaseContact');

add_action('wp_ajax_post_contact', 'post_contact');
add_action('wp_ajax_nopriv_post_contact', 'post_contact');
function post_contact() {
    global $wpdb;
    $data = [
        'name' => sanitize_text_field($_POST['name']),
        'phone' => sanitize_text_field($_POST['phone']),
        'email' => sanitize_text_field($_POST['email']),
        'message' => sanitize_text_field($_POST['message'])
    ];

    $table = $wpdb->prefix . 'contact_us';
    $contact = $wpdb->insert($table, $data);
	//$wpdb->query('COMMIT');
    if ($contact) {
        echo json_encode(array('title'=>'Success', 'message'=>__('The message has been sent! Thank you.')));
    } else {
        echo json_encode(array('title'=>'Fail', 'message'=>__('The message has not been sent yet.')));
    }
    wp_die();
}

/**
 * Create contact us table and function
 */
function creatDatabaseDownloadBrochure(){
    global $wpdb;
    $charsetCollate = $wpdb->get_charset_collate();
    $downloadTable = $wpdb->prefix . 'download_brochure';
    $downloadBrochureTable = "
        CREATE TABLE IF NOT EXISTS `{$downloadTable}` (
            `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            `name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `datetime` timestamp NOT NULL,
            PRIMARY KEY (`id`)
        ) {$charsetCollate};";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $downloadBrochureTable );
}

add_action('after_switch_theme', 'creatDatabaseDownloadBrochure');

add_action('wp_ajax_post_download_brochure', 'post_download_brochure');
add_action('wp_ajax_nopriv_post_download_brochure', 'post_download_brochure');
function post_download_brochure() {
    global $wpdb;
    $data = [
        'name' => sanitize_text_field($_POST['name']),
        'email' => sanitize_text_field($_POST['email'])
    ];

    $table = $wpdb->prefix . 'download_brochure';
    $contact = $wpdb->insert($table, $data);
    if ($contact) {
        echo json_encode(array('title'=>'Success', 'message'=>__('Submit info success.')));
    } else {
        echo json_encode(array('title'=>'Fail', 'message'=>__('Error when download. Please try again later!.')));
    }
    wp_die();
}