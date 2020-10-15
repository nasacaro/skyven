<?php global $theme_general; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=THEME_URL?>assets/images/sky-fav.png" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<!--    <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->


      <script src="<?=THEME_URL?>assets/js/jquery-3.4.0.js"></script>
      <script>
          // $.when(
          //     $.getScript( "<?=THEME_URL?>assets/js/bootstrap.js" ),
          //     $.getScript( "<?=THEME_URL?>assets/js/popper.js" ),
          //     $.getScript( "<?=THEME_URL?>assets/js/slick.min.js" ),
          //     $.Deferred(function( deferred ){
          //         $( deferred.resolve );
          //     })
          // ).done(function(){

          //     //place your code here, the scripts are all loaded

          // });
      </script>
      <script src="<?=THEME_URL?>assets/js/bootstrap.js"></script>
      <script src="<?=THEME_URL?>assets/js/popper.js"></script>
      <script src="<?=THEME_URL?>assets/js/slick.min.js"></script>
    <?php wp_head(); ?>
    <!-- <style type="text/css">
      ul.sub-menu{
        display: none;
      }
    </style> -->
    <!-- <script>
        jQuery(document).ready(function(){
            jQuery("ul.sub-menu").parent().addClass("dropdown");
            jQuery("ul.sub-menu").addClass("dropdown-menu");
            jQuery("ul#menu-header-menu li.dropdown a").addClass("dropdown-toggle");
            jQuery("ul.sub-menu li a").removeClass("dropdown-toggle");
            jQuery("ul.sub-menu li a").removeClass("nav-link");
            jQuery("ul.sub-menu li a").addClass("dropdown-item"); 
            jQuery('.navbar .dropdown-toggle').append('');
            jQuery('a.dropdown-toggle').attr('data-toggle', 'dropdown');
        });
    </script> -->
	<script>
          function videoUrl(num) {
              $('#slider-0').hide();
              $('#slider-1').hide();
              $('#slider-2').hide();
              switch (num) {
                  case 0:
                      $('#slider-0').show();
                      $('#slider-0').get(0).currentTime = 0
                      $('#slider-0').get(0).play();
                      break;
                  case 1:
                      $('#slider-1').show();
                      $('#slider-1').get(0).currentTime = 0
                      $('#slider-1').get(0).play();
                      break;
                  case 2:
                      $('#slider-2').show();
                      $('#slider-2').get(0).currentTime = 0
                      $('#slider-2').get(0).play();
                      break;
              }
          }
      </script>
	<link rel="stylesheet" href="<?=THEME_URL?>assets/css/contactus.css" />
  </head>
  <body <?php body_class(); ?>>
	<div class="overlay">&nbsp;</div>
    <header class="top-header">
        <!-- <a href="<?=SITE_URL?>">
          <img src="<?php the_field('header_logo', 'option'); ?>" alt="Skyven">
        </a> -->
        <div class="container">
          <div class="row header-row header-mb">
            <div class="col-md-0 col-lg-4"></div>
            <div class="col-md-6 col-lg-4">
            <a href="<?=SITE_URL?>" class="site-logo" style="display: inline-flex;">
				<img src="<?php the_field('header_sub_logo', 'option'); ?>" alt="Skyven" style="float: left;margin-right: 10px;height: 50px;">
				<img src="<?php the_field('header_logo', 'option'); ?>" alt="Skyven" style="float: left;margin-top: 12px;">
            </a>
            </div>
            <div class="col-md-6 col-lg-4">
              <nav class="navbar navbar-expand-md">
                <button class="navbar-toggler hamburger_container" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <div class="hamburger">
                        <span class="hamburger-icon"></span>
                        <span class="hamburger-icon"></span>
                        <span class="hamburger-icon"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'front_header_menu',
                        'menu_class' => 'navbar-nav',
                        'container' => 'ul',
                        'depth' => 0, //change to 1 for no submenu levels
                        //'walker' => new WPB_Custom_Walker  // calling in the custom walker menu as in theme inc/custom-walker.php
                    ) ); 
                    ?>
                </div>
              </nav>
            </div>
          </div>
        </div>
		<div style="padding: 0px 15px;">
          <div class="row header-row header-pc">
			<div class=""></div>
            <div class="col-md-4 col-lg-4" style="display: inherit;">
				<a href="http://localhost:8888/skyvenco/" class="site-logo" style="display: inline-flex;">
				  <img src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/Skyven_Icon.png" alt="Skyven" style="float: left;margin-right: 10px;" class="">
				  
				</a>
				<a href="http://localhost:8888/skyvenco/" class="site-logo" style="display: inline-flex;">
					<img src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/SkyvenTechnologies_Logo.png" alt="Skyven" style="float: left;height: 34px;margin-top: 9px;" class="">			  
				</a>
            </div>
            <div class="col-md-8 col-lg-8">
			   <nav class="navbar navbar-expand-md" style="float: right;">
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav custom-navbar">
						<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-351 nav-item">
							<a href="javascript:void(0)" class="nav-link popmake-download-brochure"><i class="fa fa-cloud-download"></i>
								<!--<img style="height: 14px;width: 14px;" src="http://localhost:8888/skyvenco/wp-content/uploads/2020/10/download-icon-mb.svg"></img> -->
								Brochure
							</a>
						</li>
					</ul>
				</div>
			  </nav>
              <nav class="navbar navbar-expand-md" style="float: right;">
                <button class="navbar-toggler hamburger_container" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <div class="hamburger">
                        <span class="hamburger-icon"></span>
                        <span class="hamburger-icon"></span>
                        <span class="hamburger-icon"></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <?php 
                    wp_nav_menu( array(
                        'theme_location' => 'front_header_menu',
                        'menu_class' => 'navbar-nav',
                        'container' => 'ul',
                        'depth' => 0, //change to 1 for no submenu levels
                        //'walker' => new WPB_Custom_Walker  // calling in the custom walker menu as in theme inc/custom-walker.php
                    ) ); 
                    ?>
                </div>
              </nav>
            </div>
			<!--<div class="col-md-2 col-lg-2 brochure-btn-area">
				<button class="btn submit-btn popmake-541">Brochure</button>
            </div>-->
          </div>
        </div>
    </header>
    <?php 
    if(is_front_page())
    {
    ?>
    <section id="sec-banner" class="sec-banner home-banner common-banner-class">
        <div class="top-video">
            <!-- <div class="overlay">&nbsp;</div> -->
            <!-- <video autoplay="autoplay" loop="loop" muted="muted">
                <source src="<php the_field('video_url'); ?>" type="video/mp4">
            </video> -->
			<?php 
					$video_list = explode(';',get_field('video_url')) ;
					$thumbnail_list = explode(';',get_field('thumbnail_url')) ; 
			?>
			 <?php foreach($video_list as $key => $url){ ?>
                <video id="slider-<?php echo $key ?>" class="my-video fit-screen" autoplay muted loop poster="<?php if($key ==0) echo SITE_URL?>wp-content/uploads/2020/10/videoloading.png">
                    <source src="<?php echo $url; ?>" type="video/mp4">
                </video>
              <?php }?>
            <ul class="navigation video-list" style="display: none">
              <!--<php foreach($video_list as $url){ ?>-->
			  <?php for ($i = 0; $i < count($video_list); $i++) { ?>
                <li class="video-num-<?php echo $i?>" onclick="videoUrl(<?php echo $i?>)"><img src="<?php echo $thumbnail_list[$i]; ?>"></li>
              <?php }?>
            </ul>
            <div class="banner-text">
                <h1><?php the_field('home_banner_text'); ?></h1>
                <button class="orange_btn btn-show-fullscreen">Play Video <i class="fas fa-caret-right" style="font-size: 14px;margin-left: 10px;"></i></button>
            </div>
            <div>
                <button class="btn orange_btn close-video-btn hide-item">Close</button>
            </div>
			<button type="button" class="page-header__scroll button button--clean">
                <div class="page-header__scroll-text">Scroll Down</div>
                <svg aria-hidden="true" class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="8">
                    <path stroke="currentColor" d="M1.41.59L6 5.17 10.59.59 12 2 6 8 0 2z"></path>
                </svg>
            </button>
        </div>
    </section>  
    <?php 
    }
    elseif ( is_singular('news') ) { ?>
    <section class="inner-banner common-banner-class" style="background-image:url(<?php
        $custom_banner = get_field('banner_image');
        $common_news_details_banner = get_field('news_inner_pages_banner_image', 'option');
             if($common_news_details_banner == '')
        { ?>
          <?=THEME_URL?>/assets/images/skyven-inner-page-banner.png
        <?php }
        else { 
            echo $common_news_details_banner;
          } ?>
        );">
        <div class="container">
            <div class="banner-text">
            <h1><?php
                global $post;
        $postType = get_post_type( $post->ID );
            $custom_title = get_field('custom_banner_title');
             if($custom_title == '')
        {
          echo 'Latest News'; 
        }
        else
        {
          echo $custom_title;
        } ?></h1>
            </div>
        </div>
    </section>
    <?php }
    elseif (is_page('new')) {?>
    <?php }
	elseif (is_page('contact-us')) {?>
		<section class="slider_area">
			<div class="slider_inner">
				<img src="<?php the_field('banner_image'); ?>" width="100%" style="height:361px;" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
			</div>
			<div></div>
			<div class="banner-header">
				<h1>Get in touch</h1>
			</div>
			<div class="banner-sub-header">
				<p>Drop us a line, or give us a heads up if you’re interested in learning more about us.</p>
			</div>
		</section>
    <?php }
      else
    {
    ?> 
    <section class="inner-banner common-banner-class custom_<?php    global $post;
    $post_slug = $post->post_name; echo $post_slug;?>" 
      style="background-image:url(<?php
        $custom_banner = get_field('banner_image');
        $common_news_details_banner = get_field('news_inner_pages_banner_image', 'option');
             if($custom_banner == '')
        { ?>
          <?=THEME_URL?>/assets/images/skyven-inner-page-banner.png
        <?php }
        else { 
            echo $custom_banner;
          } ?>
        );">
        <div class="container">
            <div class="banner-text">
            <h1><?php
                global $post;
        $postType = get_post_type( $post->ID );
            $custom_title = get_field('custom_banner_title');
             if($custom_title == '')
        {
          echo esc_html( get_the_title() );
        }
        else
        {
          echo $custom_title;
        } ?></h1>
            </div>
        </div>
    </section>  
  <?php
  }