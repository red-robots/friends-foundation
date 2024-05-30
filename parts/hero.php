<?php
$hero_type = get_field('hero_type');
$hero_image = get_field('hero_image');
$hero_video_url = get_field('hero_video_url');
$videos['youtube'] = ['youtube','youtu.be'];
$videos['vimeo'] = ['vimeo.com'];
if($hero_image || $hero_video_url) { ?>
  <?php if (is_front_page()) { ?>
  <?php  
    $hero_title = get_field('hero_title');
    $hero_text = get_field('hero_text');
  ?>
  <section class="hero-section">
    <?php if ($hero_type=='image') { ?>
      <?php if ($hero_image) { ?>
      <figure class="hero-graphic hero-image">
        <img src="<?php echo $hero_image['url'] ?>" alt="<?php echo $hero_image['title'] ?>">
      </figure>
      <?php } ?>
    <?php } else { ?>
      <?php if ($hero_video_url) { ?>
      <div class="hero-graphic hero-video">
        <?php foreach ($videos as $k=>$arrs) {  
          $videoId = getYoutubeVideoId($hero_video_url);
          foreach ($arrs as $ar) {
            if( strpos($hero_video_url, $ar) !== false ) {
              if ($k=='youtube') { ?>
                <iframe src="https://www.youtube.com/embed/<?php echo $videoId ?>?autoplay=1&mute=1&controls=0&loop=1&rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              <?php } 
            }
          }
          ?>
        <?php } ?>
      </div>
      <?php } ?>
    <?php } ?>

    <?php if ($hero_title || $hero_text) { ?>
    <div class="hero-text">
      <div class="wrapper">
        <div class="innerText">
        <?php if ($hero_title) { ?>
          <h2 class="hero-title"><?php echo $hero_title ?></h2>
        <?php } ?>
        <?php if ($hero_text) { ?>
          <div class="hero-desc"><?php echo $hero_text ?></div>
        <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>

    <div class="hero-overlay"></div>
  </section>
  <?php } ?>
<?php } ?>