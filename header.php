<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ica-la
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ica-la' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="logo" src="http://localhost:8888/ica-la/wp-content/uploads/2017/04/icala-logo.jpg" alt=""></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="logo" src="http://localhost:8888/ica-la/wp-content/uploads/2017/04/icala-logo.jpg" alt=""></a>
			<?php
			endif;

			if ( is_front_page() && is_home() ) :
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<!-- <h1>Artists for an ICA LA</h1> -->
					<div class="site-description">
						<h1 class="bold">Artists for an ICA LA</h1>
						<p><?php echo $description; /* WPCS: xss ok. */ ?></p>
					</div>
				<?php
				endif;
			endif; ?>
			<hr>
		</div><!-- .site-branding -->
		<a id="crossmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<div class="line-wrap">
				<div id="line1"></div>
				<div id="line2"></div>
			</div>
		</a>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
