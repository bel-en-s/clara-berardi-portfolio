<?php
/**
 * Project archive (Work) with a type filter.
 */

get_header();

$cb_active_type = get_query_var( 'project_type' );
$cb_types       = get_terms(
	array(
		'taxonomy'   => 'project_type',
		'hide_empty' => false,
	)
);

$cb_count = 0;
$cb_archive_link = get_post_type_archive_link( 'project' );
?>

<div class="divider"></div>
<div class="container">
	<div class="work-section">
		<div class="work-section-header">
			<div class="section-header-title">
				<h1 class="section-title">Work</h1>
			</div>
			<div class="section-header-copy">
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="a-underline">Back</a></p>
				<p>(<?php echo esc_html( $GLOBALS['wp_query']->found_posts ); ?>)</p>
			</div>
		</div>

		<div class="work-filter">
			<a class="filter-chip <?php echo ! $cb_active_type ? 'active' : ''; ?>" href="<?php echo esc_url( $cb_archive_link ); ?>">All</a>
			<?php
			if ( $cb_types && ! is_wp_error( $cb_types ) ) :
				foreach ( $cb_types as $cb_type ) :
					$cb_is_active = ( $cb_active_type === $cb_type->slug );
					?>
					<a class="filter-chip <?php echo $cb_is_active ? 'active' : ''; ?>" href="<?php echo esc_url( get_term_link( $cb_type ) ); ?>">
						<?php echo esc_html( $cb_type->name ); ?>
					</a>
					<?php
				endforeach;
			endif;
			?>
		</div>

		<div class="projects-grid">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/project-card' );
				endwhile;
			else :
				?>
				<p>No projects found.</p>
				<?php
			endif;
			?>
		</div>

		<?php the_posts_pagination(); ?>
	</div>
</div>
<div class="divider"></div>

<?php
get_footer();
