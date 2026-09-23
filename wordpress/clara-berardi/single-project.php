<?php
/**
 * Single project template.
 */

get_header();

$cb_id          = get_the_ID();
$cb_type_terms  = get_the_terms( $cb_id, 'project_type' );
$cb_type_slug   = ( $cb_type_terms && ! is_wp_error( $cb_type_terms ) ) ? $cb_type_terms[0]->slug : '';
$cb_type_label  = cb_project_type_label( $cb_type_slug );
$cb_tags        = get_the_tags();

$cb_brand      = get_field( 'brand' );
$cb_role       = get_field( 'role' );
$cb_year       = get_field( 'year' );
$cb_client     = get_field( 'client' );
$cb_video      = get_field( 'video' );
$cb_gallery    = get_field( 'gallery' );
$cb_credits    = get_field( 'credits' );

$cb_agency             = get_field( 'agency' );
$cb_production_company = get_field( 'production_company' );
$cb_event              = get_field( 'event' );
$cb_space              = get_field( 'space' );
$cb_curators           = get_field( 'curators' );
$cb_artists            = get_field( 'artists' );

// Build the type-specific meta list.
$cb_meta = array();

switch ( $cb_type_slug ) {
	case 'production':
		if ( $cb_client ) {
			$cb_meta['Client'] = $cb_client;
		}
		if ( $cb_agency ) {
			$cb_meta['Agency'] = $cb_agency;
		}
		if ( $cb_production_company ) {
			$cb_meta['Production Company'] = $cb_production_company;
		}
		if ( $cb_role ) {
			$cb_meta['Role'] = $cb_role;
		}
		if ( $cb_year ) {
			$cb_meta['Year'] = $cb_year;
		}
		break;

	case 'identity':
		if ( $cb_client ) {
			$cb_meta['Client'] = $cb_client;
		}
		if ( $cb_agency ) {
			$cb_meta['Agency'] = $cb_agency;
		}
		if ( $cb_production_company ) {
			$cb_meta['Production Company'] = $cb_production_company;
		}
		if ( $cb_role ) {
			$cb_meta['Role'] = $cb_role;
		}
		break;

	case 'curation':
		if ( $cb_event ) {
			$cb_meta['Event'] = $cb_event;
		}
		if ( $cb_space ) {
			$cb_meta['Space'] = $cb_space;
		}
		if ( $cb_curators ) {
			$cb_meta['Curators'] = implode( ', ', wp_list_pluck( $cb_curators, 'name' ) );
		}
		if ( $cb_artists ) {
			$cb_meta['Artists'] = implode( ', ', wp_list_pluck( $cb_artists, 'name' ) );
		}
		break;
}
?>

<div class="divider"></div>
<div class="container">
	<div class="project-head">
		<div class="project-head-col">
			<h1 class="section-title"><?php the_title(); ?></h1>
			<?php if ( $cb_brand ) : ?>
				<p class="project-brand"><?php echo esc_html( $cb_brand ); ?></p>
			<?php endif; ?>
		</div>
		<div class="project-head-col">
			<p><?php echo esc_html( $cb_type_label ); ?></p>
			<?php foreach ( $cb_meta as $cb_label => $cb_value ) : ?>
				<p class="project-copy-sec"><?php echo esc_html( $cb_label ); ?>: <?php echo esc_html( $cb_value ); ?></p>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="project-sub-head">
		<div class="back-link">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'project' ) ); ?>" class="a-underline">Back to work</a>
		</div>
		<?php if ( $cb_tags && ! is_wp_error( $cb_tags ) ) : ?>
			<div class="project-tags">
				<?php foreach ( $cb_tags as $cb_tag ) : ?>
					<span class="tag"><?php echo esc_html( $cb_tag->name ); ?></span>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="project-description">
		<?php the_content(); ?>
	</div>

	<div class="project-featured">
		<?php if ( $cb_video ) : ?>
			<video src="<?php echo esc_url( $cb_video ); ?>" controls playsinline></video>
		<?php elseif ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
	</div>
</div>
<div class="divider"></div>

<?php if ( $cb_gallery ) : ?>
	<div class="container">
		<div class="project-gallery masonry">
			<?php foreach ( $cb_gallery as $cb_image ) : ?>
				<div class="masonry-item">
					<img src="<?php echo esc_url( $cb_image ); ?>" alt="" />
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="divider"></div>
<?php endif; ?>

<?php if ( $cb_credits ) : ?>
	<div class="container">
		<div class="credits">
			<div class="credits-title">
				<h2 class="section-h2">Credits</h2>
			</div>
			<div class="credits-groups">
				<?php foreach ( $cb_credits as $cb_group ) : ?>
					<div class="credit-group">
						<?php if ( ! empty( $cb_group['group'] ) ) : ?>
							<h3><?php echo esc_html( $cb_group['group'] ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $cb_group['items'] ) ) : ?>
							<?php foreach ( $cb_group['items'] as $cb_item ) : ?>
								<p class="credit-item">
									<?php if ( ! empty( $cb_item['role'] ) ) : ?>
										<span class="credit-role"><?php echo esc_html( $cb_item['role'] ); ?></span>
									<?php endif; ?>
									<?php echo esc_html( $cb_item['name'] ); ?>
								</p>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="divider"></div>
<?php endif; ?>

<?php
get_footer();
