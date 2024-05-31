<?php get_header(); ?>
<div id="primary">
  <main class="main-content">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if( have_rows('flexible_content') ) {  ?>
      <?php get_template_part('parts/repeatable-blocks') ?>
    <?php } ?>

  <?php endwhile; ?>
  </main>
</div>
<?php
get_footer();