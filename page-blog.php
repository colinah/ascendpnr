<?php get_header(); ?>
<div class="page-wrapper">
<div class="photobanner">
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <h1 class="photobanner-title"><?php the_title(); ?></h1>
        <div class="photobanner-block image-darken" 
            style="background-image:url(<?php echo get_the_post_thumbnail_url()?>);
                background-repeat: no-repeat;
                background-position: 50% 15%;
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
        <?php 
            $link = get_category_by_slug('featured');
        // var_dump($link['cat_ID']); 
        ?>
        <div class="section-header__wrapper">
         <h3 class="section-header"><a href="<?php echo get_category_link('featured') ?>">Featured Articles</a><h3>
        </div>   
     <div class="post-package__wrapper">
     <?php
            $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'category_name' => 'featured',
            'facetwp' => true,
            'order' => 'DESC',
            'orderby' => 'date',
        );
            $query = new WP_Query( $args );
        ?>

        <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();

            postPackages();

        endwhile;
        wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
        endif; 
    ?> 
    </div>  <!-- /post-package__wrapper -->

    <div class="section-header__wrapper">
        <h3 class="section-header">Strength And Conditioning<h3>
    </div>   
     <div class="post-package__wrapper">
     <?php
            $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'category_name' => 'strength-and-conditioning',
            'facetwp' => true,
            'order' => 'DESC',
            'orderby' => 'date',
        );
            $query = new WP_Query( $args );
        ?>

        <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();

            postPackages();

        endwhile;
        wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
        endif; 
    ?> 
    </div>  <!-- /post-package__wrapper -->
    <div class="section-header__wrapper">
        <h3 class="section-header">Rehab<h3>
    </div>   
     <div class="post-package__wrapper">
     <?php
            $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'category_name' => 'rehab',
            'facetwp' => true,
            'order' => 'DESC',
            'orderby' => 'date',
        );
            $query = new WP_Query( $args );
        ?>

        <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post();

            postPackages();

        endwhile;
        wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
        endif; 
    ?> 
    </div>  <!-- /post-package__wrapper -->
    </div> <!-- /content-main -->
        <div class="content-sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<?php get_footer(); ?>