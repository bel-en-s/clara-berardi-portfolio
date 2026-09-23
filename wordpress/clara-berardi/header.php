<?php
/**
 * Theme header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="navbar">
	<div class="container">
		<div class="navbar-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
				<span class="brand-name">Clara Berardi</span>
				<span class="brand-role">Creative Lead</span>
			</a>
		</div>

		<button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>

		<nav class="navbar-items" id="primary-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'fallback_cb'    => 'cb_default_menu',
				)
			);
			?>
		</nav>
	</div>
</header>

<main id="site-main">
