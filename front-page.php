<?php get_header(); ?>
<div class="page-wrapper">
    <div class="photobanner">
    <h1 class="photobanner-title">Ascend Performance helps you excell in climbing by helping you recover faster and train smarter</h1>
        <div class="photobanner-block image-darken" ></div>
        <div class="photobanner-cover"></div>
    </div> <!-- /.photobanner--->
    
<!-- Main Conten area -->
<div class="content-cover__darken">
<div class="content-wrapper">
    <!-- <div class="section-header__wrapper">
        <h3 class="section-header">Latest Articles<h3>
    </div>    -->

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
</div> <!-- /content-full__width -->
</div> <!-- /content-cover__darken -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>