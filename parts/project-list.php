<?php
$paged = ( get_query_var( 'pg' ) ) ? absint( get_query_var( 'pg' ) ) : 1;
$args = array(
  'posts_per_page'  => $perpage,
  'post_type'       => 'projects',
  'post_status'     => 'publish'
);

if($perpage>0) {
  $args['paged'] = $paged;
}
$offset = $paged;
if($paged>1) {
  $offset = (($paged * $perpage)  - $perpage) + 1;
}



$entries = new WP_Query($args);
if ( $entries->have_posts() ) {  $count = $entries->found_posts; ?>
<div class="projects-wrapper" data-count="<?php echo $count ?>">
  <div class="wrapper">
    <div class="flexwrap entries-container">
      <?php $ctr=$offset; while ( $entries->have_posts() ) : $entries->the_post();  
        $project_location = get_field('project_location');
        $project_name = get_the_title();
        $pagelink = get_permalink();
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $photo = wp_get_attachment_image_url($thumbnail_id,'full');
        ?>
        <div class="item-block">
          <figure data-group="project-group-<?php echo $ctr ?>" class="entry photo animated fadeIn <?php echo ($photo) ? 'has-photo':'no-photo' ?>">
            <a href="<?php echo $photo ?>" class="imglink inner" data-fancybox="project-group-<?php echo $ctr ?>">
              <?php if ($photo) { ?>
               <img src="<?php echo $photo ?>" alt="<?php echo $project_name ?>"> 
              <?php } ?>
              <figcaption>
                <div class="info">
                  <span class="project_name"><?php echo $project_name ?></span>
                  <?php if ($project_location) { ?>
                    <span class="project_location"><?php echo $project_location ?></span>
                  <?php } ?>
                </div>
                <span class="plus-symbol"></span>
              </figcaption>
            </a>
          </figure>
          <?php if( $gallery = get_field('gallery') ) { ?>
          <div data-group="project-group-<?php echo $ctr ?>" class="project-gallery__group" style="display:none;">
            <?php foreach ($gallery as $img) { 
              if($photo!=$img['url']) { ?>
              <a href="<?php echo $img['url'] ?>" class="image-inner fancybox" data-fancybox="project-group-<?php echo $ctr ?>">
                  <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
                </a>
              <?php } ?>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      <?php $ctr++; endwhile; wp_reset_postdata(); ?>
    </div>

    <?php
    $total_pages = $entries->max_num_pages;
    if ($total_pages > 1){  ?>
      <div id="pagination" data-section="#blogs" class="pagination sr-only">
          <?php
              $pagination = array(
                  'base' => @add_query_arg('pg','%#%'),
                  'format' => '?paged=%#%',
                  'mid-size' => 1,
                  'current' => $paged,
                  'total' => $total_pages,
                  'prev_next' => True,
                  'prev_text' => __( '<span class="previous fas fa-chevron-left"></span>' ),
                  'next_text' => __( '<span class="next fas fa-chevron-right"></span>' )
              );
              echo paginate_links($pagination);
          ?>
      </div>
    <?php } ?>
  </div>
</div>
<?php }