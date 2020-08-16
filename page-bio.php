<? get_header(); ?>
<div class="page-wrapper">
    <div class="content-wrapper">
        <div class="content-main">
 
                <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        ?>
                        <div class="section-header__wrapper">
                            <h3 class="section-header"><?php the_title(); ?><h3>
                        </div>
                        <div class="bio-portrait">  
                            <img class="image" src="<?the_post_thumbnail_url()?>" >
                        </div>
                        <?
                        the_content();
                    } // end while
                } // end if
                ?>
        </div> <!-- /content-main -->
        <div class="content-sidebar">
            <? get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<? get_footer(); ?>