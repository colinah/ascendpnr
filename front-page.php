<?php get_header(); ?>
<div class="page-wrapper">
    <div class="photobanner">
    <h1 class="photobanner-title">Ascend Performance helps you excell in climbing by helping you recover faster and train smarter</h1>
        <div class="photobanner-block image-darken" 
            style="background-image:url(<?php echo wp_get_attachment_image_src( 92,'banner')[0]?>);
                background-repeat: no-repeat;
                background-position: center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
                
        </div>
        <div class="photobanner-cover"></div>
    </div> <!-- /.photobanner-block -->
    
<!-- Main Conten area -->
<div class="content-wrapper">
    <!-- <div class="section-header__wrapper">
        <h3 class="section-header">Latest Articles<h3>
    </div>    -->

    <?php global $wp_query; ?>
     <div class="post-package__wrapper posts-list"
     data-page= 1
     data-max="<?php  echo $wp_query->max_num_pages; ?>"
     >
        <?php 
 
        if ( have_posts() ) : while ( have_posts() ) : the_post();

            postPackages();

        endwhile;
        wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
        endif; 
    ?> 
    </div>  <!-- /post-package__wrapper -->
    <div class="content-more">
        <button class="button-load load-more" style="overflow-anchor: none">Load More Posts</button>
    </div>
</div> <!-- /content-full__width -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>