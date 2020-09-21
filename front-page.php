<?php get_header(); ?>
<div class="page-wrapper">
    <div class="photobanner">
    <h1 class="photobanner-title__front-page">Ascend Performance helps you excell in climbing by helping you recover faster and train smarter</h1>
        <div class="photobanner-block image-darken" 
        style="background-image:url(<?php echo wp_get_attachment_image_src( 154, 'large' )[0]?>);
                background-repeat: no-repeat;
                background-position: 50% 50%;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">

        </div>
        <div class="photobanner-cover"></div>
    </div> <!-- /.photobanner--->
    
<!-- Main Conten area -->
<div class="front-wrapper">
    <div class=front-packages__wrapper>
                    <?php
                        $args = array(
                    'post_type'      => 'front-page',
                    'facetwp' => true,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );
                    $query = new WP_Query( $args );
                    $postNumberOnPage = 1;
                    ?>

                    <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();
 
                    frontPackage($postNumberOnPage);

                    $postNumberOnPage ++;

                    endwhile;
                    wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
                    endif; 
                    ?> 
                </div> <!-- .services-wrapper -->
    </div> <!-- /front-wrapper -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>