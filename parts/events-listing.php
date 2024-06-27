<?php
// $args_featured = array(
//   'post_type' => 'post',
//   'posts_per_page' => $perpage,
//   'post__in' => get_option( 'sticky_posts' ),
//   'category__not_in'=> array(17)
// );

$current_date = date('Y-m-d H:i:s', strtotime(WP_CURRENT_TIME));
$current_time = date('H:i:s', strtotime(WP_CURRENT_TIME));


$args = array(
  'posts_per_page'  => $perpage,
  'post_type'       => 'ff-events',
  'post_status'     => 'publish',
  'meta_key'        => 'start_date',
  'orderby'         => 'meta_value',
  'order'           => 'ASC'
);

/* ============ UPCOMING EVENTS ============ */
$args['meta_query'][] = array(
  'key' => 'start_date',
  'value' => date('Ymd'),
  'compare' => '>=',
  'type' => 'DATE'
);
$posts = new WP_Query($args);
if ($posts->have_posts()) { 
  $count_events = $posts->found_posts;
  ?>
  <div data-count="<?php echo $count_events ?>" class="events-listing upcoming-events">
    <div class="wrapper">
      <div class="section-title">
        <h2>Upcoming Events</h2>
      </div>
      <div class="flexwrap">
      <?php $i=1; while ( $posts->have_posts() ) : $posts->the_post(); 
        $photo = get_field('featured_photo');
        $location = get_field('location');
        $start_date = get_field('start_date');
        $time = get_field('time');
        $title = get_the_title();
        ?>
        <article>
          <div class="inside">
            <?php if ($photo) { ?>
              <figure>
                <img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['title'] ?>">
              </figure>
            <?php } ?>
            <?php if ($title) { ?>
              <figcaption>
                <h3><?php echo $title ?></h3>
                <?php if ($location) { ?>
                <div class="location"><?php echo $location ?></div> 
                <?php } ?>
                <?php if ($start_date) { ?>
                <div class="event-date"><?php echo date('l, F j, Y', strtotime($start_date)); ?></div> 
                <?php } ?>
                <?php if ($time) { ?>
                <div class="event-time"><?php echo $time; ?></div> 
                <?php } ?>
              </figcaption>
            <?php } ?>
          </div>
        </article>
      <?php $i++; endwhile; wp_reset_postdata(); ?>

        <?php if ( $count_events % 3 ) { 
          $events_info = get_field('events_info','option'); ?>
          <article>
            <div class="inside infobox">
              <div class="textwrap">
                <?php echo anti_email_spam($events_info); ?>
              </div>
            </div>
          </article>
        <?php } ?>

      </div>

      <?php
      $total_pages = $posts->max_num_pages;
      if ($total_pages > 1) { ?>
      <div class="pagination">
        <?php
        $pagination = array(
          'base' => @add_query_arg('pg','%#%'),
          'format' => '?paged=%#%',
          'current' => $paged,
          'total' => $total_pages,
          'prev_text' => __( '&laquo;', 'bellaworks' ),
          'next_text' => __( '&raquo;', 'bellaworks' ),
          'type' => 'plain'
        );
        echo paginate_links($pagination); ?>
      </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>


<?php
/* ============ PAST EVENTS ============ */
$args2 = array(
  'posts_per_page'  => $perpage,
  'post_type'       => 'ff-events',
  'post_status'     => 'publish',
  'meta_key'        => 'start_date',
  'orderby'         => 'meta_value',
  'order'           => 'ASC'
);

//UPCOMING EVENTS
$args2['meta_query'][] = array(
  'key' => 'start_date',
  'value' => date('Ymd'),
  'compare' => '<',
  'type' => 'DATE'
);
$past_events = new WP_Query($args2);
if ($past_events->have_posts()) { ?>
  <div class="events-listing past-events">
    <div class="wrapper">
      <div class="section-title">
        <h2>Past Events</h2>
      </div>
      <div class="flexwrap">
      <?php $i=1; while ( $past_events->have_posts() ) : $past_events->the_post(); 
        $photo = get_field('featured_photo');
        $location = get_field('location');
        $start_date = get_field('start_date');
        $time = get_field('time');
        $title = get_the_title();
        ?>
        <article>
          <div class="inside">
            <?php if ($photo) { ?>
              <figure>
                <img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['title'] ?>">
              </figure>
            <?php } ?>
            <?php if ($title) { ?>
              <figcaption>
                <h3><?php echo $title ?></h3>
                <?php if ($location) { ?>
                <div class="location"><?php echo $location ?></div> 
                <?php } ?>
                <?php if ($start_date) { ?>
                <div class="event-date"><?php echo date('l, F j, Y', strtotime($start_date)); ?></div> 
                <?php } ?>
                <?php if ($time) { ?>
                <div class="event-time"><?php echo $time; ?></div> 
                <?php } ?>
              </figcaption>
            <?php } ?>
          </div>
        </article>
      <?php $i++; endwhile; wp_reset_postdata(); ?>
      </div>

      <?php
      $total_pages = $past_events->max_num_pages;
      if ($total_pages > 1) { ?>
      <div class="pagination">
        <?php
        $pagination = array(
          'base' => @add_query_arg('pg','%#%'),
          'format' => '?paged=%#%',
          'current' => $paged,
          'total' => $total_pages,
          'prev_text' => __( '&laquo;', 'bellaworks' ),
          'next_text' => __( '&raquo;', 'bellaworks' ),
          'type' => 'plain'
        );
        echo paginate_links($pagination); ?>
      </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>