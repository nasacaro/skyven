<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<header class="page-header" style="width: 100%;text-align: center;">
	<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', TEXT_DOMAIN ); ?></h1>
</header>

<?php
get_footer();
