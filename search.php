<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ascend_Performance_and_Rehab
 */

get_header();
?>
<div class="page-wrapper">
<div class="content-wrapper">
	<div class="content-main">
	<main id="primary" class="site-main">

	<header class="page-header">
		<h1 class="page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'ascend' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</header><!-- .page-header -->

     <div class="post-package__wrapper">
		<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();
		
            postPackages();

        endwhile;
        wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
		else :
			?>
			<h1>No Results</h1>
			<?php
		endif; 
		
			
    ?> 
    </div>  <!-- /post-package__wrapper -->

	</main><!-- #main -->
	</div> <!-- /content-main -->
        <div class="content-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<?php
get_sidebar();
get_footer();
