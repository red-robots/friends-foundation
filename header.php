<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if ( is_singular(array('post')) ) { 
global $post;
$post_id = $post->ID;
$thumbId = get_post_thumbnail_id($post_id); 
$featImg = wp_get_attachment_image_src($thumbId,'full'); ?>
<!-- SOCIAL MEDIA META TAGS -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:url"   content="<?php echo get_permalink(); ?>" />
<meta property="og:type"  content="article" />
<meta property="og:title" content="<?php echo get_the_title(); ?>" />
<meta property="og:description" content="<?php echo (get_the_excerpt()) ? strip_tags(get_the_excerpt()):''; ?>" />
<?php if ($featImg) { ?>
<meta property="og:image" content="<?php echo $featImg[0] ?>" />
<?php } ?>
<!-- end of SOCIAL MEDIA META TAGS -->
<?php } ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<?php wp_head(); ?>
<?php  
  global $heroImg;
  $heroImg = page_has_hero();
  $extraClass = ($heroImg) ? 'has-hero-image':'';
  $announcement = get_field('announcement','option');
  $announcement_visibility = get_field('announcement_visibility','option');
  if($announcement) {
    $extraClass .= 'has-announcement-bar';
  }
?>
<script>var assetsUrl='<?php echo get_template_directory_uri();?>/assets/';</script>
</head>
<body <?php body_class($extraClass); ?>>
<?php if ($announcement && $announcement_visibility=='on') { ?>
<div class="announcementBar">
  <div class="announcementMessage"><?php echo anti_email_spam($announcement); ?></div>
  <button class="announcementClose" aria-label="Close Announcement"></button>
</div> 
<?php } ?>

<div id="page" class="site cf">
  <div id="overlay"></div>
  <a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
  
  <header id="masthead" class="site-header">
    <div class="wrapper">
      <div class="header-inner">
        <?php if ( has_custom_logo() ) { ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php } ?>
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <?php
          $donate = get_field('donate_link','option');
          $donateBtnTitle = (isset($donate['title']) && $donate['title']) ? $donate['title'] : 'Donate';
          $donateBtnUrl = (isset($donate['url']) && $donate['url']) ? $donate['url'] : '';
          $donateBtnTarget = (isset($donate['target']) && $donate['target']) ? $donate['target'] : '_self';
          $donate_button = ($donateBtnTitle && $donateBtnUrl) ? '<li class="donateLink"><a href="'.$donateBtnUrl.'" target="'.$donateBtnTarget.'" class="donate-button">'.$donateBtnTitle.'</a></li>':'';
          wp_nav_menu(
            array(
              'theme_location'  => 'primary',
              'menu_class'      => 'menu-wrapper',
              'container_class' => 'primary-menu-container',
              'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s'.$donate_button.'</ul>',
              'fallback_cb'     => false,
            )
          );
          ?>
        </nav>
        <a href="#" id="menu-toggle" class="menu-toggle" aria-label="Menu Toggle"><span class="sr">Menu</span><span class="bar"></span></a>
        <div class="navOverlay"></div>
      </div>
    </div>
  </header>


  <?php get_template_part('parts/hero'); ?>

  <div id="content" class="site-content">