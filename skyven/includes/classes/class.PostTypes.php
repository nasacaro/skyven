<?php


class Theme_Post_Types{
    
    function __construct(){
        
        add_action( 'init', array($this,'register_post_types'),10,2 );
    }
    function register_post_types(){

        $this->register_post_type('solution','solutions',array('title', 'thumbnail', 'editor', 'excerpt'), true, 'solution');
        $this->register_post_type('saving_post','saving_posts',array('title', 'thumbnail', 'editor', 'excerpt'), true, 'solution');
        $this->register_post_type('benefit','benefits',array('title', 'thumbnail', 'excerpt'), true, 'solution');
        $this->register_post_type('partner_logo','partner_logos',array('title', 'thumbnail', 'excerpt'), true, 'solution');
        $this->register_post_type('news','newses',array('title', 'thumbnail','editor', 'excerpt'), true, 'solution');
        $this->register_post_type('testimonial','testimonials',array('title', 'thumbnail','editor', 'excerpt'), true, 'solution');

        $this->register_post_type('founder','founders',array('title', 'thumbnail', 'excerpt'), true, 'about-post');
        $this->register_post_type('leader','leaders',array('title', 'thumbnail', 'excerpt'), true, 'about-post');

    }
    function register_post_type($singular,$plural, $supports = array('title', 'excerpt', 'comments','thumbnail'), $hierarchical=false, $show_in_menu=true, $hide_in_search=false){

		$labels = $this->labels($singular,$plural);
		$slug = str_replace('_','-',$singular);
	    
		$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Description.', TEXT_DOMAIN ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => $show_in_menu,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $slug ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => $hierarchical,
			'menu_position'      => null,
			'supports'           => $supports,
			'exclude_from_search' => $hide_in_search,
		);
		register_post_type( $singular, $args );
	
    }
    
    function labels($singluar,$plural){

    	if($singluar == 'why_choose'){
    		$singluar = 'why_choose_syndicationpro';
    		$plural = 'why_choose_syndicationpro';
    	}

        $singluar = str_replace('_',' ',$singluar);
        $plural = str_replace('_',' ',$plural);
        $singluar_caps = ucwords($singluar);
        $plural_caps = ucwords($plural);
        
        $labels = array(
		'name'               => _x( $plural_caps, 'post type general name', TEXT_DOMAIN ),
		'singular_name'      => _x( $singluar_caps, 'post type singular name', TEXT_DOMAIN ),
		'menu_name'          => _x( $plural_caps, 'admin menu', TEXT_DOMAIN ),
		'name_admin_bar'     => _x( $singluar_caps, 'add new on admin bar', TEXT_DOMAIN ),
		'add_new'            => _x( 'Add New', $plural, TEXT_DOMAIN ),
		'add_new_item'       => __( 'Add New '.$singluar_caps, TEXT_DOMAIN ),
		'new_item'           => __( 'New '.$singluar_caps, TEXT_DOMAIN ),
		'edit_item'          => __( 'Edit '.$singluar_caps, TEXT_DOMAIN ),
		'view_item'          => __( 'View '.$singluar_caps, TEXT_DOMAIN ),
		'all_items'          => __( 'All '.$plural_caps, TEXT_DOMAIN ),
		'search_items'       => __( 'Search '.$plural_caps, TEXT_DOMAIN ),
		'parent_item_colon'  => __( 'Parent '.$plural_caps.':', TEXT_DOMAIN ),
		'not_found'          => __( 'No '.$plural_caps.' found.', TEXT_DOMAIN ),
		'not_found_in_trash' => __( 'No '.$plural_caps.' found in Trash.', TEXT_DOMAIN )
	);
	return $labels;
    }
    
}
