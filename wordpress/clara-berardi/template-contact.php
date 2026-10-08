<?php
/**
 * Template Name: Contact
 *
 * Contact page (intro, location, email, social links).
 */

get_header();

$cb_intro          = get_field( 'contact_intro' );
$cb_location_label = get_field( 'location_label' );
$cb_location       = get_field( 'location' );
$cb_email          = get_field( 'email' );
$cb_socials        = get_field( 'socials' );
?>

<div class="contact">
	<div class="divider"></div>

	<div class="container">
		<h1 class="section-title">Contact</h1>
		<div class="whitespace-100"></div>
	</div>
	<div class="divider"></div>

	<div class="container">
		<section class="contact-info">
			<div class="contact-info-col">
				<?php if ( $cb_intro ) : ?>
					<h2 class="section-h2"><?php echo esc_html( $cb_intro ); ?></h2>
				<?php endif; ?>
			</div>
			<div class="contact-info-col">
				<div class="contact-info-sub-col">
					<?php if ( $cb_location_label ) : ?>
						<p><?php echo esc_html( $cb_location_label ); ?></p>
					<?php endif; ?>
					<?php if ( $cb_location ) : ?>
						<p class="sec-contact"><?php echo esc_html( $cb_location ); ?></p>
					<?php endif; ?>

					<?php if ( $cb_email ) : ?>
						<br />
						<p>Email</p>
						<p class="sec-contact">
							<a href="mailto:<?php echo esc_attr( $cb_email ); ?>"><?php echo esc_html( $cb_email ); ?></a>
						</p>
					<?php endif; ?>
				</div>
				<div class="contact-info-sub-col">
					<?php if ( $cb_socials ) : ?>
						<?php foreach ( $cb_socials as $cb_social ) : ?>
							<?php if ( ! empty( $cb_social['url'] ) ) : ?>
								<a href="<?php echo esc_url( $cb_social['url'] ); ?>" target="_blank" rel="noreferrer">
									<?php echo esc_html( $cb_social['label'] ); ?>
								</a><br />
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>
	<div class="divider"></div>
</div>

<?php
get_footer();
