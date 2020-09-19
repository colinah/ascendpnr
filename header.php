<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ascend_Performance_and_Rehab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div class="header-backer"></div>
	<header id="masthead" class="site-header">
		<div class="nav-primary">
			<div class="nav-primary__container">
			<div class="nav-logo">
				<?php
				the_custom_logo();
				?>
			</div><!-- .nav-logo -->
			<nav class="nav-primary__items">
				<span class="nav-primary__item nav-primary__item-hover" ><a href="<?php  echo site_url('/') ?>">Home</a></span>
				<span class="nav-primary__item nav-primary__item-hover" ><a href="<?php  echo site_url('/blog') ?>">Blog</a></span>
				<span class="nav-primary__item nav-primary__item-hover" ><a href="<?php  echo site_url('/contact') ?>">Contact</a></span>
				<span class="nav-primary__item nav-primary__item-hover" ><a href="<?php  echo site_url('/bio') ?>">Bio</a></span>
				<span class="nav-primary__item"><?php get_search_form(); ?></span>
			</nav>
			</div><!-- /nav-primary__container -->
		</div><!-- .nav-primary -->


		<!-- Mobile Navigation -->
		<div class="nav-mobile">
			<div class="nav-logo">
				<?php
				the_custom_logo();
				?>
			</div><!-- .nav-logo -->
			<div class="nav-mobile__toggle" >
				<span></span>
				<span></span>
				<span></span>
			</div> <!-- .nav-mobile__toggle -->
		</div> <!-- .nav-mobile -->
			<nav id="nav-menu-1">
				<span class="nav-menu__item" ><a href="<?php  echo site_url('/') ?>">Home</a></span>
				<span class="nav-menu__item" ><a href="<?php  echo site_url('/blog') ?>">Blog</a></span>
				<span class="nav-menu__item" ><a href="<?php  echo site_url('/contact') ?>">Contact</a></span>
				<span class="nav-menu__item" ><a href="<?php  echo site_url('/bio') ?>">Bio</a></span>
				<span class="nav-menu__item" ><?php get_search_form(); ?></span>
			</nav>
			<div id="nav-mobile__modal-1">
			</div>
		<!-- /Mobile Navigation -->
		


		<nav id="site-navigation" class="main-navigation">
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
