<? get_header(); ?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <div class="content-main">
        <div class="section-header__wrapper">
         <h3 class="section-header">Featured Articles<h3>
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
        <h3 class="section-header">Latest Articles<h3>
    </div>   
     <div class="post-package__wrapper">
     <?php
            $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
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
            <? get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<? get_footer(); ?>