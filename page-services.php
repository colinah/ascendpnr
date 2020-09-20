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
                <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        ?>
                            <div class="services-main__content"><?php the_content(); ?></div>
                        <?php
                    } // end while
                } // end if
                ?>
    <div class=services-wrapper>
                    <?php
                        $args = array(
                    'post_type'      => 'services',
                    'facetwp' => true,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );
                    $query = new WP_Query( $args );
                    $postNumberOnPage = 1;
                    ?>

                    <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();
                    // var_dump('THE DUMPS');
                    // var_dump(the_field('services-image')[0]);
                    // var_dump(the_field('services_excerpt'));
                    // the_field('services-image')[0];
                    servicesPackage($postNumberOnPage);

                    $postNumberOnPage ++;

                    endwhile;
                    wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
                    endif; 
                    ?> 
                </div> <!-- .services-wrapper -->
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>