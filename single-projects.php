<?php
/**
 * The template for displaying all pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bellaworks
 */

$postType = get_post_type();
get_header(); 
?>

<div id="primary" class="content-area-full content-default page-default-template post-type-<?php echo $postType ?>">
  
  <main id="main" class="site-main wrapper" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
      <?php 
        $project_location = get_field('project_location');
        $gallery = get_field('gallery');
      ?>
      <header class="entry-header">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if ($project_location) { ?>
        <div class="project-location"><?php echo $project_location ?></div> 
        <?php } ?>
      </header>
      <div class="entry-content">
        <?php if (get_the_content()) { ?>
          <div class="description"><?php the_content(); ?></div>
        <?php } ?>

        <?php if ($gallery) { ?>
        <div class="grid-gallery">
          <div class="grid">
          <?php foreach ($gallery as $img) { ?>
            <figure>
              <a href="<?php echo $img['url'] ?>" class="image-inner fancybox" data-fancybox="gallery">
                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
              </a>
            </figure>
          <?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>

		<?php endwhile; ?>

	</main><!-- #main -->

  <?php if($postType=='post' || $postType=='stories') { ?>
  <aside id="single-post-widget">
    <?php get_template_part('parts/recent-news-widget'); ?>
  </aside>
  <?php } ?>			
</div><!-- #primary -->

<?php
get_footer();
