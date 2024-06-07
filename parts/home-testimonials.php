<?php
$display_testimonials = get_field('display_testimonials');
if($display_testimonials=='show') {
  $testimonial_heading = get_field('testimonials_heading');
  $selected_testimonials = get_field('selected_testimonials');
  if($selected_testimonials) {
    $selected_ids = array();
    foreach($selected_testimonials as $id) {
      $selected_ids[] = $id;
    }
    $args = array(
      'post_type'       => 'testimonials',
      // 'posts_per_page'  => 5,
      'orderby'         => 'date',
      'order'           => 'desc',
      'post_status'     => 'publish',
      'post__in'        => $selected_ids
    );
    $testimonials = new WP_Query($args);
    if ( $testimonials->have_posts() ) {  $count = $testimonials->found_posts; ?>
    <div class="testimonials-section">
      <div class="flexwrap">
        <?php if ($testimonial_heading) { ?>
        <div class="flexcol left">
          <div class="textwrap">
            <h2><?php echo $testimonial_heading ?></h2>
          </div>
          <span class="bgnoise">
            <span class="s1"></span>
            <span class="s2"></span>
          </span>
        </div>
        <?php } ?>
        
        <div class="flexcol right">
          <div class="swiper-outer-wrap">
            <div class="swiper" id="swiperTestimonials">
              <div class="swiper-wrapper">
              <?php while ( $testimonials->have_posts() ) : $testimonials->the_post();   ?>
                <div class="swiper-slide">
                  <div class="testimonial">
                    <?php the_content(); ?>
                  </div>
                  <div class="author">
                    – <?php echo get_the_title(); ?> –
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <!-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  <?php } ?>
<?php } ?>