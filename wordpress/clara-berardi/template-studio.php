<?php
/**
 * Template Name: Studio
 *
 * About page layout (intro, copy, capabilities, clients).
 */

get_header();

$cb_intro_heading = get_field( 'intro_heading' );
$cb_intro_image   = get_field( 'intro_image' );
$cb_copy_left     = get_field( 'copy_left' );
$cb_copy_right    = get_field( 'copy_right' );
$cb_texture       = get_field( 'texture_image' );
$cb_capabilities  = get_field( 'capabilities' );
$cb_clients       = get_field( 'clients' );
?>

<div class="studio">
	<div class="divider"></div>

	<div class="container">
		<h1 class="section-title">About</h1>
		<div class="whitespace-100"></div>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="about-intro">
			<div class="about-intro-col">
				<?php if ( $cb_intro_heading ) : ?>
					<h2 class="section-h2"><?php echo esc_html( $cb_intro_heading ); ?></h2>
				<?php endif; ?>
			</div>
			<div class="about-intro-col about-intro-img">
				<?php if ( $cb_intro_image ) : ?>
					<img src="<?php echo esc_url( $cb_intro_image ); ?>" alt="" />
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="about-copy">
			<div class="about-copy-col">
				<?php if ( $cb_copy_left ) : ?>
					<?php echo wp_kses_post( wpautop( $cb_copy_left ) ); ?>
				<?php endif; ?>
			</div>
			<div class="about-copy-col">
				<?php if ( $cb_copy_right ) : ?>
					<?php echo wp_kses_post( wpautop( $cb_copy_right ) ); ?>
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="about-texture">
			<?php if ( $cb_texture ) : ?>
				<img src="<?php echo esc_url( $cb_texture ); ?>" alt="" />
			<?php endif; ?>
		</section>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="about-section">
			<div class="about-section-col">
				<h1 class="section-title">Capabilities</h1>
			</div>
			<div class="about-section-col">
				<?php if ( $cb_capabilities ) : ?>
					<div class="capability-list">
						<?php foreach ( $cb_capabilities as $cb_cap ) : ?>
							<?php if ( ! empty( $cb_cap['item'] ) ) : ?>
								<p><?php echo esc_html( $cb_cap['item'] ); ?></p>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="about-section">
			<div class="about-section-col">
				<h1 class="section-title">Selected Clients</h1>
			</div>
			<div class="about-section-col">
				<?php if ( $cb_clients ) : ?>
					<div class="client-list">
						<?php foreach ( $cb_clients as $cb_client ) : ?>
							<?php if ( ! empty( $cb_client['item'] ) ) : ?>
								<h3><?php echo esc_html( $cb_client['item'] ); ?></h3>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>
</div>

<?php
get_footer();
