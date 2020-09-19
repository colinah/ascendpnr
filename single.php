<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ascend_Performance_and_Rehab
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="page-wrapper">
		<div class="content-wrapper">
			<div class="content-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'ascend' ) . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'ascend' ) . '</span> <span class="nav-title">%title</span>',
			)
		);

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

				</div> <!-- /content-main -->
			<div class="content-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- content-wrapper -->
	</div><!-- /page-wrapper -->
</main><!-- #main -->

<?php
get_footer();
