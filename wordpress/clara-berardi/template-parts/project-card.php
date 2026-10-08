<?php
/**
 * Project card (used on the front page and the work archive).
 */

$cb_cover       = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$cb_cover_video = get_field( 'cover_video' );
$cb_tags        = get_the_tags();
$cb_brand       = get_field( 'brand' );
$cb_role        = get_field( 'role' );
$cb_subtitle    = get_field( 'subtitle' );
?>
<div class="project">
	<a href="<?php the_permalink(); ?>">
		<div class="project-img">
			<?php if ( $cb_cover_video ) : ?>
				<video src="<?php echo esc_url( $cb_cover_video ); ?>" autoplay muted loop playsinline></video>
			<?php elseif ( $cb_cover ) : ?>
				<img src="<?php echo esc_url( $cb_cover ); ?>" alt="<?php the_title_attribute(); ?>" />
			<?php endif; ?>
		</div>
		<div class="project-title">
			<p>
				<?php echo esc_html( $cb_brand ); ?>
				<?php if ( $cb_role ) : ?>
					<span class="project-role"> - <?php echo esc_html( $cb_role ); ?></span>
				<?php endif; ?>
			</p>
		</div>
		<?php if ( $cb_subtitle ) : ?>
			<div class="project-subtitle"><p><?php echo esc_html( $cb_subtitle ); ?></p></div>
		<?php endif; ?>
		<div class="project-category">
			<p>
			<?php
			if ( $cb_tags && ! is_wp_error( $cb_tags ) ) {
				echo esc_html( implode( ' · ', wp_list_pluck( $cb_tags, 'name' ) ) );
			}
			?>
			</p>
		</div>
	</a>
</div>
