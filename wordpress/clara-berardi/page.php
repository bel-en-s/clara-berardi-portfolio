<?php
/**
 * Static page template (Studio, Contact, etc.).
 */

get_header();
?>

<div class="divider"></div>
<div class="container">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class(); ?>>
			<h1 class="section-title"><?php the_title(); ?></h1>
			<div class="whitespace-100"></div>
			<div class="page-content"><?php the_content(); ?></div>
		</article>
		<?php
	endwhile;
	?>
</div>
<div class="divider"></div>

<?php
get_footer();
