<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

/**
 * The template for displaying course archive page
 * @package wikilms
 * Version: 1.0.0
 */
get_header(); 

?>

<div class="content-area">
    <div class="wikilms-container">
        <?php if ( have_posts() ) : ?>
        <div class="wikilms-row">

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post(); 

                   wikilms_get_tpl_part('/templates/course','content'); 

    
                endwhile; ?>

                <?php
                else :

                 wikilms_get_tpl_part('/templates/content','none'); ?>
            
        </div>
        <div class="pagination-wrap">
            <?php
            the_posts_pagination( array(
                'prev_text' => '<i><svg height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg" id="fi_2722991"><g id="_17" data-name="17"><path d="m15 19a1 1 0 0 1 -.71-.29l-6-6a1 1 0 0 1 0-1.41l6-6a1 1 0 0 1 1.41 1.41l-5.29 5.29 5.29 5.29a1 1 0 0 1 -.7 1.71z"></path></g></svg></i>',
                'next_text' => '<i><svg height="16" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg" id="fi_2722985"><g id="_15" data-name="15"><path d="m9 19a1 1 0 0 1 -.71-1.71l5.3-5.29-5.3-5.29a1 1 0 0 1 1.42-1.42l6 6a1 1 0 0 1 0 1.41l-6 6a1 1 0 0 1 -.71.3z"></path></g></svg></i>',
            ) ); ?>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php get_footer();