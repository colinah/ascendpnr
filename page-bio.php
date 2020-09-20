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
 
                <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        ?>
                        <div class="section-header__wrapper">
                            <h3 class="section-header"><?php the_title(); ?><h3>
                        </div>

                        <div class="bio-highlight__wrapper">
                            <div class="bio-portrait">  
                                <!-- <img  src="<?php the_post_thumbnail_url()?>" > -->
                                <?php 
                                $image = get_field('portrait');
                                // var_dump($image);
                                if( !empty( $image ) ): ?>
                                    <img class="image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="bio-icons__wrapper">
                                <div class="bio-icons">
                                    <div class="bio-icon">
                                        <i class="fa-blue fa fa-graduation-cap fa-4x" aria-hidden="true"></i>
                                    </div>
                                    <ul class="bio-icon__points">
                                        <li class="bio-icon__point">Doctor of Chiropractic (Chiropractic Physician) </li>
                                        <li class="bio-icon__point">Doctor of Philosophy in Rehabilitation Science</li>
                                        <!-- <li class="bio-icon__point">Certified Strength and Conditioning Specialist (CSCS)</li> -->
                                        <li class="bio-icon__point">Master of Science in Exercise Physiology</li>
                                        <li class="bio-icon__point">Bachelor of Science in Exercise Science</li>
                                        <li class="bio-icon__point">Bachelor of Science in Biological Science</li>
                                    </ul>
                                </div> <!-- bio-icons -->
                                <div class="bio-icons">
                                    <div class="bio-icon">
                                    <i class="fa-blue fa fa-certificate fa-4x" aria-hidden="true"></i>
                                    </div>
                                    <ul class="bio-icon__points">
                                        <li class="bio-icon__point">Certified Strength and Conditioning Specialist (CSCS)</li>
                                        <li class="bio-icon__point">Trained in Musculoskeletal Diagnostic Ultrasound Imaging</li>
                                        <li class="bio-icon__point">Cox Flexion-Distraction Certified</li>
                                        <li class="bio-icon__point">Functional Movement Specialist Certified</li>
                                    </ul>
                                </div> <!-- bio-icons -->
                                <div class="bio-icons">
                                    <div class="bio-icon">
                                        <i class="fa-blue fa fa-user-md fa-4x" aria-hidden="true"></i>
                                    </div> <!-- bio-icon -->
                                    <ul class="bio-icon__points">
                                        <li class="bio-icon__point">Chiropractic Board Certified in Acupuncture and Dry Needling</li>
                                        <li class="bio-icon__point">Chiropractic Board Certified in Injection Therapies: PRP, Ozone, and Homeopathics</li>
                                        <li class="bio-icon__point">Chiropractic Board Certified in Physio-Therapy</li>
                                        <li class="bio-icon__point">Chiropractic Board Certified in the Webster Technique</li>
                                    </ul> <!-- bio-icon__points -->
                                </div> <!-- bio-icons -->
                            </div> <!-- bio-icons__wrapper -->
                        </div> <!-- bio-images__wrapper -->
                        <?php
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