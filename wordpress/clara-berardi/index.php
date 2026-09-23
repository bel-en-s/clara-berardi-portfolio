<?php
/**
 * Fallback template.
 */

get_header();
?>

<div class="divider"></div>
<div class="container">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'entry' ); ?>>
				<h1 class="section-title"><?php the_title(); ?></h1>
				<div class="whitespace-100"></div>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
	endif;
	?>
</div>
<div class="divider"></div>

<?php
get_footer();
