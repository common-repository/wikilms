<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
 
/**
 * The template for displaying course content
 * @package wikilms
 * Version: 1.0.0
 */

  $price =  get_post_meta( get_the_ID(), 'wikilms_price', true );
  $duration =  get_post_meta( get_the_ID(), 'wikilms_duration', true );
  $skill_level =  get_post_meta( get_the_ID(), 'wikilms_level', true );
  $max_students =  get_post_meta( get_the_ID(), 'wikilms_students', true );
  $course_access =  get_post_meta( get_the_ID(), 'wikilms_access', true );
  $course_language =  get_post_meta( get_the_ID(), 'wikilms_language', true );

 ?>


<div class="wikilms-course wikilms-col-md-4">
  <div class="course__container">
         <?php
        if ( has_post_thumbnail() ) : ?>
            <div class="wikilms-post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'full' ); ?>
                </a>

            </div>
        <?php endif; ?>

    <div class="course__content">

      <div class="course__content--info">
        <!--  End review -->
        <h4 class="course__title">
          <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
        </h4>

      </div>

    <div class="course__content--meta">
     <div class="course__meta-left">
        <span class="course-enroll">
            <i><svg height="15" viewBox="0 0 384 384" width="15" xmlns="http://www.w3.org/2000/svg" id="fi_1124602"><path d="m343.59375 101.039062c-7.953125 3.847657-11.28125 13.417969-7.433594 21.367188 10.511719 21.714844 15.839844 45.121094 15.839844 69.59375 0 88.222656-71.777344 160-160 160s-160-71.777344-160-160 71.777344-160 160-160c36.558594 0 70.902344 11.9375 99.328125 34.519531 6.894531 5.503907 16.976563 4.351563 22.480469-2.566406 5.503906-6.914063 4.351562-16.984375-2.570313-22.480469-33.652343-26.746094-76-41.472656-119.238281-41.472656-105.863281 0-192 86.136719-192 192s86.136719 192 192 192 192-86.136719 192-192c0-29.335938-6.40625-57.449219-19.039062-83.527344-3.839844-7.96875-13.441407-11.289062-21.367188-7.433594zm0 0"></path><path d="m192 64c-8.832031 0-16 7.167969-16 16v112c0 8.832031 7.167969 16 16 16h80c8.832031 0 16-7.167969 16-16s-7.167969-16-16-16h-64v-96c0-8.832031-7.167969-16-16-16zm0 0"></path></svg></i>
            <?php echo esc_html( $duration ); ?>
        </span>
        <span class="course-enroll">
            <i><svg id="fi_3068380" enable-background="new 0 0 511.989 511.989" height="16" viewBox="0 0 511.989 511.989" width="16" xmlns="http://www.w3.org/2000/svg"><g><path d="m470.994 330c0-24.146-17.205-44.348-40-48.994v-54.006c0-4.92-2.412-9.526-6.456-12.329s-9.206-3.445-13.811-1.716l-28.629 10.736c-18.8-19.545-41.652-34.266-66.694-43.303 24.608-18.234 40.59-47.478 40.59-80.388 0-55.141-44.859-100-100-100s-100 44.859-100 100c0 32.91 15.982 62.154 40.59 80.388-25.043 9.038-47.894 23.759-66.694 43.303l-28.629-10.736c-4.606-1.729-9.768-1.087-13.811 1.716-4.044 2.803-6.456 7.409-6.456 12.329v54.006c-22.795 4.646-40 24.847-40 48.994s17.205 44.348 40 48.994v58.006c0 6.253 3.879 11.85 9.733 14.045l160 60c3.374 1.258 7.159 1.258 10.533 0l160-60c5.854-2.195 9.733-7.792 9.733-14.045v-58.006c22.796-4.646 40.001-24.848 40.001-48.994zm-285-230c0-38.598 31.402-70 70-70s70 31.402 70 70-31.402 70-70 70-70-31.402-70-70zm70 100c35.143 0 68.709 12.701 94.899 35.393l-94.899 35.587-94.899-35.587c26.191-22.692 59.757-35.393 94.899-35.393zm-185 130c0-11.028 8.972-20 20-20h10v40h-10c-11.028 0-20-8.972-20-20zm40 49.497c11.397-2.323 20-12.424 20-24.497v-50c0-12.073-8.603-22.174-20-24.497v-31.858l130 48.75v177.961l-130-48.75zm160 95.858v-177.96l130-48.75v31.858c-11.397 2.323-20 12.424-20 24.497v50c0 12.073 8.603 22.174 20 24.497v47.108zm150-125.355h-10v-40h10c11.028 0 20 8.972 20 20s-8.971 20-20 20z"></path></g></svg></i>
            <?php echo esc_html( $max_students ); ?>
        </span>
     </div>

    </div>

      <div class="course__border"></div>

      <div class="course__content--meta">

        <div class="course__meta-left">
          <div class="price__1">
            <span class="price"> <?php echo esc_html( $price ); ?></span>
          </div>
        </div>

        <div class="course__meta-right">

            <span class="course-enroll">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'See More', 'wikilms' )?></a>
            </span>
        </div>

      </div>
      <!-- End course__content--meta -->
    </div>
  </div>
</div>

