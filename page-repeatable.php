<?php
/**
 * Template Name: Flexible-Content
 */
get_header(); ?>
<div id="primary" class="content-area-full repeatable-layout ">
	<main id="main" class="site-main" role="main" data-postid="<?php echo get_the_ID() ?>" data-pagetitle="<?php echo get_the_title()?>">
		<?php if( have_rows('flexible_content') ) {  ?>
      <?php get_template_part('parts/repeatable-blocks') ?>
    <?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();