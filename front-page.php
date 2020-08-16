<? get_header(); ?>
<div class="page-wrapper">
    <div class="photobanner">
        <!-- w3-content w3-display-container  -->
    <!-- .photobanner-block -->
            <?php
            $args = array(
            'post_type'      => 'post',
            'category_name'  => 'featured',
            'posts_per_page' => 4,
            'facetwp' => true,
        );
            $query = new WP_Query( $args );
        ?>

        <?php if ( $query->have_posts() ) : while ( $query-> have_posts() ) : $query-> the_post(); ?>


        <div class="photobanner-block" 
            style="background-image:url(<?the_post_thumbnail_url('banner')?>);
                background-repeat: no-repeat;
                background-position: center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;">
                <h1 class="photobanner-title"><a href="<?php echo get_post_permalink(); ?>"><?the_title();?></a></h1>
        </div>
        
        

        <?php
            endwhile;
            wp_reset_postdata(); // this should be inside if - there is no need to rested postdata if the_post hasn’t been called.
            endif; 
        ?> 
        <div class="photobanner-cover"></div>
<!-- /.photobanner-block -->
<!--  w3-container w3-section w3-large w3-text-white w3-display-bottommiddle -->
   <div class="photobanner-button__wrapper" style="width:100%">
    <div class="photobanner-button photobanner-button__left" onclick="plusDivs(-1)">&#10094;</div>
    <div class="photobanner-button photobanner-button__right" onclick="plusDivs(1)">&#10095;</div>
    <span class="demo photobanner-button__dots" onclick="currentDiv(1)"></span>
    <span class="demo photobanner-button__dots" onclick="currentDiv(2)"></span>
    <span class="demo photobanner-button__dots" onclick="currentDiv(3)"></span>
    <span class="demo photobanner-button__dots" onclick="currentDiv(4)"></span>
  </div>
</div>

<!-- Main Conten area -->
<div class="content-wrapper">
    <!-- <div class="section-header__wrapper">
        <h3 class="section-header">Latest Articles<h3>
    </div>    -->
     <div class="post-package__wrapper">
     <?php
            $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
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
    <div class="content-more">
        <a href="<? site_url().'/blog'?>">
            More ->
        <a>
    </div>
</div> <!-- /content-full__width -->
</div><!-- /page-wrapper -->
<? get_footer(); ?>