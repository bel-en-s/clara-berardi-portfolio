<?php
/**
 * Front page: hero + selected work.
 */

get_header();
?>

<div class="home">
	<div class="container">
		<?php
		$cb_hero = wp_get_attachment_url( get_post_thumbnail_id( get_option( 'page_on_front' ) ) );

		// Fallback hero image: the latest project cover.
		if ( ! $cb_hero ) {
			$cb_latest = get_posts(
				array(
					'post_type'      => 'project',
					'posts_per_page' => 1,
					'fields'         => 'ids',
				)
			);
			if ( $cb_latest ) {
				$cb_hero = get_the_post_thumbnail_url( $cb_latest[0], 'full' );
			}
		}
		?>
		<div class="hero-img">
			<?php if ( $cb_hero ) : ?>
				<img src="<?php echo esc_url( $cb_hero ); ?>" alt="" />
			<?php endif; ?>
		</div>

		<div class="hero-copy">
			<h1>
				Clara Berardi is a creative lead based in Buenos Aires, shaping
				brands and immersive visual stories for ambitious companies
				worldwide. &nbsp;
				<a href="<?php echo esc_url( home_url( '/studio/' ) ); ?>">About me</a>
			</h1>
		</div>
	</div>
	<div class="divider"></div>

	<div class="container">
		<div class="work-section">
			<div class="work-section-header">
				<div class="section-header-title">
					<h1 class="section-title">Selected Work</h1>
				</div>
				<div class="section-header-copy">
					<p>
						<a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="a-underline">View All</a>
					</p>
					<p>(<?php echo esc_html( wp_count_posts( 'project' )->publish ); ?>)</p>
				</div>
			</div>

			<div class="projects-grid">
				<?php
				$cb_query = new WP_Query(
					array(
						'post_type'      => 'project',
						'posts_per_page' => 6,
					)
				);

				if ( $cb_query->have_posts() ) :
					while ( $cb_query->have_posts() ) :
						$cb_query->the_post();
						get_template_part( 'template-parts/project-card' );
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="divider"></div>
</div>

<?php
get_footer();
