<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */
global $heroImg;
get_header(); 
?>

<div id="primary" class="content-area-full generic-layout subpage-content">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

      <?php if( have_rows('flexible_content') ) {  ?>
        <?php get_template_part('parts/repeatable-blocks') ?>
      <?php } else { ?>

        <?php if (!$heroImg) { ?>
          <h1 class="page-title"><span><?php the_title(); ?></span></h1>
        <?php } ?>
        
        <div class="entry-content">
          <?php the_content(); ?>
        </div>  
      <?php } ?>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
