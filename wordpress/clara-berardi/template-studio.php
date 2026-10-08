<?php
/**
 * Template Name: Studio
 *
 * About page layout (name, intro, bio, previous, services, client history).
 */

get_header();

$cb_name          = get_field( 'name' );
$cb_role          = get_field( 'role' );
$cb_intro         = get_field( 'intro' );
$cb_bio_left      = get_field( 'bio_left' );
$cb_bio_right     = get_field( 'bio_right' );
$cb_note_label    = get_field( 'note_label' );
$cb_note_brand    = get_field( 'note_brand' );
$cb_previous      = get_field( 'previous' );
$cb_services      = get_field( 'services' );
$cb_client_history = get_field( 'client_history' );
?>

<div class="studio">
	<div class="divider"></div>

	<div class="container">
		<section class="about-hero">
			<h1 class="section-title">About</h1>
			<div class="about-hero-info">
				<?php if ( $cb_name ) : ?>
					<h2 class="about-name"><?php echo esc_html( $cb_name ); ?></h2>
				<?php endif; ?>
				<?php if ( $cb_role ) : ?>
					<p class="about-role"><?php echo esc_html( $cb_role ); ?></p>
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>

	<?php if ( $cb_intro ) : ?>
		<div class="container">
			<section class="about-intro">
				<h2 class="section-h2"><?php echo esc_html( $cb_intro ); ?></h2>
			</section>
		</div>
		<div class="divider"></div>
	<?php endif; ?>

	<div class="container">
		<section class="about-copy">
			<div class="about-copy-col">
				<?php if ( $cb_bio_left ) : ?>
					<?php echo wp_kses_post( wpautop( $cb_bio_left ) ); ?>
				<?php endif; ?>
			</div>
			<div class="about-copy-col">
				<?php if ( $cb_bio_right ) : ?>
					<?php echo wp_kses_post( wpautop( $cb_bio_right ) ); ?>
				<?php endif; ?>
			</div>
		</section>
	</div>
	<div class="divider"></div>

	<?php if ( $cb_note_label || $cb_note_brand ) : ?>
		<div class="container">
			<p class="about-note">
				<?php if ( $cb_note_label ) : ?>
					<?php echo esc_html( $cb_note_label ); ?>
				<?php endif; ?>
				<?php if ( $cb_note_brand ) : ?>
					<span><?php echo esc_html( $cb_note_brand ); ?></span>
				<?php endif; ?>
			</p>
		</div>
		<div class="divider"></div>
	<?php endif; ?>

	<?php if ( $cb_previous ) : ?>
		<div class="container">
			<section class="about-section">
				<div class="about-section-col">
					<h1 class="section-title">Previous</h1>
				</div>
				<div class="about-section-col">
					<div class="previous-list">
						<?php foreach ( $cb_previous as $cb_item ) : ?>
							<?php if ( ! empty( $cb_item['item'] ) ) : ?>
								<p><?php echo esc_html( $cb_item['item'] ); ?></p>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		</div>
		<div class="divider"></div>
	<?php endif; ?>

	<?php if ( $cb_services ) : ?>
		<div class="container">
			<section class="about-section">
				<div class="about-section-col">
					<h1 class="section-title">Services</h1>
				</div>
				<div class="about-section-col">
					<div class="services-list">
						<?php foreach ( $cb_services as $cb_item ) : ?>
							<?php if ( ! empty( $cb_item['item'] ) ) : ?>
								<p><?php echo esc_html( $cb_item['item'] ); ?></p>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		</div>
		<div class="divider"></div>
	<?php endif; ?>

	<?php if ( $cb_client_history ) : ?>
		<div class="container">
			<section class="about-clients">
				<h1 class="section-title">Client History</h1>
				<div class="clients-grid">
					<?php foreach ( $cb_client_history as $cb_group ) : ?>
						<div class="client-group">
							<?php if ( ! empty( $cb_group['category'] ) ) : ?>
								<h3 class="client-group-title"><?php echo esc_html( $cb_group['category'] ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $cb_group['clients'] ) ) : ?>
								<ul class="client-group-list">
									<?php foreach ( $cb_group['clients'] as $cb_client ) : ?>
										<?php if ( ! empty( $cb_client['name'] ) ) : ?>
											<li><?php echo esc_html( $cb_client['name'] ); ?></li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
		<div class="divider"></div>
	<?php endif; ?>
</div>

<?php
get_footer();
