<?php
/**
 * Front page: hero copy + all work.
 */

get_header();
?>

<div class="home">
	<div class="container">
		<div class="hero-copy">
			<h1>
				<?php echo esc_html( get_theme_mod( 'cb_front_hero', 'Clara Berardi is a creative lead based in Buenos Aires, shaping brands and immersive visual stories for ambitious companies worldwide.' ) ); ?>
				&nbsp;
				<a href="<?php echo esc_url( home_url( '/studio/' ) ); ?>">About me</a>
			</h1>
		</div>
	</div>

	<div class="container">
		<div class="work-section">
	

			<div class="projects-grid">
				<?php
				$cb_query = new WP_Query(
					array(
						'post_type'      => 'project',
						'posts_per_page' => -1,
						'meta_query'     => cb_visibility_meta_query(),
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
