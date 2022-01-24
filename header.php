<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
	<div class="top-bar">
		<div id="top-bar-cont">
			<?php $phone_text = get_option('phone_text'); //echo $phone_text;?>
			<div class="header-phone"><span class="call-cta">CALL US NOW!</span> <?php echo get_option('phone_text')?:'781-333-3333'; ?></div>
			<div class="login-signup">
				<ul class="signup-menu">
					<li><a href="#">LOGIN</a></li>
					<li><a href="#">SIGNUP</a></li>
				</ul>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header">
		<div class="head-wrapper">
			<div class="site-branding"><?php  ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="main-logo" src="<?php echo get_option('logo_image') ?>" alt="" width="" height="" />
</a>
				
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php //echo get_option('fax_text'); ?>
		
