<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/**
 * The template for displaying course single page
 * @package wikilms
 * Version: 1.0.0
 */

get_header(); 

?>

<div class="wikilms-content-area">

    <div class="wikilms-container">
        <div class="wikilms-row wikilms-row-8-4">
    
            <div class="wikilms-col-md-8 wikilms-content-wrapper">
          
                <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
         
                        if ( has_post_thumbnail() ) : ?>
                            <div class="wikilms-post-thumbnaill">
                                <?php the_post_thumbnail( 'full' ); ?>
                            </div>
                        <?php endif; ?>

                        <?php the_title( '<h2 class="wikilms-entry-title">', '</h2>' ); ?>

                     <?php

                     the_content(); 
  
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                        
                    endwhile; // End of the loop.
                ?>
            
            </div>

            <div class="wikilms-col-md-4">
               <?php   
                 wikilms_get_tpl_part('/templates/course','sidebar');
               ?>
            </div>
    
            
        </div>
    </div>

</div>
<?php get_footer();