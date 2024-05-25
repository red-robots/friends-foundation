<?php
$hero = get_field('hero_image');
if($hero) { ?>
<section class="hero-section">
  <figure class="hero-image">
    <img src="<?php echo $hero['url'] ?>" alt="<?php echo $hero['title'] ?>">
  </figure>
  <div class="wrapper hero-text">
    <div class="flexwrap">
      <h1 class="page-title"><?php echo get_the_title(); ?></h1>
    </div>
  </div>
</section>
<?php } ?>