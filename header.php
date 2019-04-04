<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spacefarer
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spacefarer' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="stars">
			<?php for ($i = 0; $i < 100; $i++) {
				echo '<div class="starContainer"><div class="star"></div></div>';
			}?>
		</div>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() ) :
				?>
				<img id="header-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu( array(
				'menu' => 'Menu',
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content" style="
		/*border-width: 30px;
		border-style: solid;
		-webkit-border-image: url(<?php echo get_template_directory_uri() . '/images/border.png'; ?>) 30 stretch; /* Safari 3.1-5 */
		-o-border-image: url(<?php echo get_template_directory_uri() . '/images/border.png'; ?>) 30 stretch; /* Opera 11-12.1 */
		border-image: url(<?php echo get_template_directory_uri() . '/images/border.png'; ?>) 30 stretch;
		*/
	">