<?php


class Theme_Taxonomies{
    
    function __construct(){
        
        add_action( 'init', array($this,'register_post_types'),10,2 );
    }
    function register_post_types(){
		$this->register_post_type(array('news'),'news_category','news_categorys');
		$this->register_post_type(array('members'),'members_category','members_categories');
    }
    function register_post_type($post_types=array(),$singular,$plural,$show_ui = true){
    
        $labels = $this->labels($singular,$plural);
    	
    	$args = array(
    		'hierarchical'      => true,
    		'labels'            => $labels,
    		'show_ui'           => $show_ui,
    		'show_admin_column' => true,
    		'query_var'         => true,
    		'rewrite'           => array( 'slug' => $singular ),
    	);

    	register_taxonomy( $singular, $post_types, $args );
    }
    
    function labels($singluar,$plural){
        
        $singluar = str_replace('_',' ',$singluar);
        
        $plural = str_replace('_',' ',$plural);
        
        $singluar_caps = ucwords($singluar);
        $plural_caps = ucwords($plural);
        
        $labels = array(
    		'name'              => _x( $singluar_caps, 'taxonomy general name', TEXT_DOMAIN ),
    		'singular_name'     => _x( $singluar_caps, 'taxonomy singular name', TEXT_DOMAIN ),
    		'search_items'      => __( 'Search '.$plural_caps, TEXT_DOMAIN ),
    		'all_items'         => __( 'All '.$plural_caps, TEXT_DOMAIN ),
    		'parent_item'       => __( 'Parent '.$singluar_caps, TEXT_DOMAIN ),
    		'parent_item_colon' => __( 'Parent '.$singluar_caps.':', TEXT_DOMAIN ),
    		'edit_item'         => __( 'Edit '.$singluar_caps, TEXT_DOMAIN ),
    		'update_item'       => __( 'Update '.$singluar_caps, TEXT_DOMAIN ),
    		'add_new_item'      => __( 'Add New '.$singluar_caps, TEXT_DOMAIN ),
    		'new_item_name'     => __( 'New '.$singluar_caps.' Name', TEXT_DOMAIN ),
    		'menu_name'         => __( $plural_caps, TEXT_DOMAIN ),
    	);
    	return $labels;
    }
    
}