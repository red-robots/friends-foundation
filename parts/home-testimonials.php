<?php
$args = array(
  'post_type' => 'testimonials',
  'posts_per_page' => 5,
  'orderby'         => 'date',
  'order'           => 'desc',
  'post_status'     => 'publish'
);

$testimonials = new WP_Query($args);
$testimonial_heading = get_field('testimonial_heading');
if ( $testimonials->have_posts() ) {  $count = $testimonials->found_posts; ?>
<div class="testimonials-section">
  <div class="flexwrap">
    <?php if ($testimonial_heading) { ?>
    <div class="flexcol left">
      <div class="textwrap">
        <h2><?php echo $testimonial_heading ?></h2>
      </div>
    </div>
    <?php } ?>
    
    <div class="flexcol right">
      <?php while ( $testimonials->have_posts() ) : $testimonials->the_post();   ?>

      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<?php } ?>