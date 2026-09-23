<?php
/**
 * Project card (used on the front page and the work archive).
 */

$cb_cover = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$cb_tags  = get_the_tags();
?>
<div class="project">
	<a href="<?php the_permalink(); ?>">
		<div class="project-img">
			<?php if ( $cb_cover ) : ?>
				<img src="<?php echo esc_url( $cb_cover ); ?>" alt="<?php the_title_attribute(); ?>" />
			<?php endif; ?>
		</div>
		<div class="project-title"><p><?php the_title(); ?></p></div>
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
