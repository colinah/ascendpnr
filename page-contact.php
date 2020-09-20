<?php get_header(); ?>
<div class="page-wrapper">
<div class="photobanner">
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="photobanner-title"><?php the_title(); ?></h1>
        <div class="photobanner-block image-darken" 
            style="background-image:url(<?php echo get_the_post_thumbnail_url()?>);
                background-repeat: no-repeat;
                background-position: center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
                
        </div>
        <div class="photobanner-cover"></div>
    <?php
    endwhile;
    wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
    endif; 
    ?> 
    </div> <!-- /.photobanner--->
    <div class="content-wrapper">
        <div class="content-main">
            <div class="section-header__wrapper">
                <h3 class="section-header">Contact<h3>
            </div>   
                <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        the_content();
                    } // end while
                } // end if
                ?>
        </div> <!-- /content-main -->
        <div class="content-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>