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
        $photo = get_field('photo');
        $job_title = get_field('job_title');
        $bio = get_field('bio');
        $section_class = ($bio && $photo) ? 'half':'full';
      ?>
      <div class="team-info">
        <div class="details">
          <div class="flexwrap <?php echo $section_class ?>">
            <div class="leftcol">
              <header class="entry-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php if ($job_title) { ?>
                <div class="jobtitle"><?php echo $job_title ?></div> 
                <?php } ?>
              </header>
              <?php if ($bio) { ?>
              <div class="bio"><?php echo $bio ?></div>
              <?php } ?>
            </div>
            <?php if ($photo) { ?>
            <div class="rightcol">
              <figure><img src="<?php echo $photo['url'] ?>" alt="<?php get_the_title() ?>"></figure>
            </div>
            <?php } ?>
          </div>
        </div>
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
