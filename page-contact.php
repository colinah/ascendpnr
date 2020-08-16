<? get_header(); ?>
<div class="page-wrapper">
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
            <? get_sidebar(); ?>
        </div>
    </div><!-- content-wrapper -->
</div><!-- /page-wrapper -->
<? get_footer(); ?>