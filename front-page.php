<?php get_header(); ?>
<div id="primary">
  <main class="main-content">
  <?php while ( have_posts() ) : the_post(); ?>
    
    <?php if( have_rows('flexible_content') ) { ?>
      <?php $i=1; while( have_rows('flexible_content') ): the_row(); ?>

        <?php if( get_row_layout() == 'hero_static' ) {  
          $hero_image = get_sub_field('hero_image');
          $hero_title = get_sub_field('hero_title'); 
          $hero_type = get_sub_field('hero_type'); 
          $hero_slideshow = get_sub_field('hero_slideshow'); 
          $button = get_sub_field('hero_button'); 
          $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
          $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
          $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
          $text_position = get_sub_field('text_position'); 
          $section_class = ($text_position) ? 'text-' . $text_position : 'text-right';
          if($hero_image) { ?>
          <section id="section_hero_static_<?php echo $i?>" class="repeatable_section section_hero_static <?php echo $section_class?>">
            <div class="columns">
              <?php if ($hero_type=='slideshow') { ?>
                <?php if ($hero_slideshow) { ?>
                <div class="imagecol imageSlideshow">
                  <div id="slideshow" class="swiper">
                    <div class="swiper-wrapper">
                      <?php foreach ($hero_slideshow as $img) { ?>
                        <figure class="swiper-slide">
                          <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
                        </figure>
                      <?php } ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                  </div>
                </div>
                <?php } ?>
              <?php } else { ?>
                <figure class="imagecol">
                  <img src="<?php echo $hero_image['url'] ?>" alt="<?php echo $hero_image['title'] ?>">
                </figure>
              <?php } ?>
              <?php if($hero_image) { ?>
              <div class="textcol">
                <div class="inner">
                  <?php echo $hero_title ?>

                  <?php if($btnLink  && $btnTitle) { ?>
                  <div class="button-wrap">
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button"><?php echo $btnTitle ?></a>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          </section>  
          <?php } ?>
        <?php } 

        else if( get_row_layout() == 'two_column_image_text' ) { 
          $title = get_sub_field('title'); 
          $text = get_sub_field('text'); 
          $button = get_sub_field('button'); 
          $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
          $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
          $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
          $image = get_sub_field('image');
          $image_position = get_sub_field('image_position'); 
          $section_class = ($image_position) ? 'image-' . $image_position : 'image-right';
          $section_class .= ( $image && ($title || $text) ) ? ' half':' full';
          if( $image || ($title || $text) ) { ?>
          <section id="section_two_column_image_text_<?php echo $i?>" class="repeatable_section section_two_column_image_text <?php echo $section_class?>">
            <div class="columns">
              <?php if ($image) { ?>
              <figure class="imagecol">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              </figure> 
              <?php } ?>
              <?php if ($title || $text) { ?>
              <div class="textcol">
                <div class="inner">
                  <?php if ($title) { ?>
                   <h2 class="section-title"><?php echo $title ?></h2> 
                  <?php } ?>
                  <?php if ($text) { ?>
                   <div class="section-text"><?php echo $text ?></h2> 
                  <?php } ?>
                  <?php if($btnLink  && $btnTitle) { ?>
                  <div class="button-wrap">
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button"><?php echo $btnTitle ?></a>
                  </div>
                  <?php } ?>
                </div>
              </div> 
              <?php } ?>
            </div>
          </section>
          <?php } ?>
        <?php } 


        else if( get_row_layout() == 'two_column_slant_style' ) { 
          $title = get_sub_field('title'); 
          $icon = get_sub_field('icon'); 
          $text = get_sub_field('textcontent'); 
          $button = get_sub_field('button'); 
          $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
          $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
          $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
          $image = get_sub_field('image');
          $image_position = get_sub_field('image_position'); 
          $button_bgcolor = get_sub_field('button_bgcolor'); 
          $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#FFF'; 
          $bgcolor = (get_sub_field('bgcolor')) ? get_sub_field('bgcolor') : '#CCC'; 


          $section_class = ($image_position) ? 'image-' . $image_position : 'image-right';
          $section_class .= ( $image && ($title || $text) ) ? ' half':' full';
          if( $image || ($title || $text) ) { ?>
          <section id="section_two_column_slant_style_<?php echo $i?>" class="repeatable_section section_two_column_slant_style <?php echo $section_class?>">
            <div class="columns">
              <?php if ($image) { ?>
              <figure class="imagecol">
                <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
              </figure> 
              <?php } ?>
              <?php if ($title || $text) { ?>
              <div class="textcol" style="background-color:<?php echo $bgcolor ?>">
                <span class="skew" style="background-color:<?php echo $bgcolor ?>"></span>
                <div class="inner" style="color:<?php echo $textcolor ?>">
                  <?php if ($icon) { ?>
                   <div class="section-icon">
                      <span style="background-image:url('<?php echo $icon['url'] ?>')"></span>
                   </div> 
                  <?php } ?>
                  <?php if ($title) { ?>
                   <h2 class="section-title"><?php echo $title ?></h2> 
                  <?php } ?>
                  <?php if ($text) { ?>
                   <div class="section-text"><?php echo $text ?></h2> 
                  <?php } ?>
                  <?php if($btnLink  && $btnTitle) { ?>
                  <div class="button-wrap">
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button <?php echo $button_bgcolor; ?>"><?php echo $btnTitle ?></a>
                  </div>
                  <?php } ?>
                </div>
              </div> 
              <?php } ?>
            </div>
          </section>
          <?php } ?>
        <?php } 

        else if( get_row_layout() == 'fullwidth_content' ) { 
          $icon = get_sub_field('icon'); 
          $text = get_sub_field('textcontent'); 
          $button = get_sub_field('button'); 
          $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
          $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
          $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
          $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#FFF'; 
          $bgcolor = (get_sub_field('bgcolor')) ? get_sub_field('bgcolor') : '#CCC'; 
          $button_bgcolor = get_sub_field('button_bgcolor'); 
          if($text) { ?>
            <section id="section_fullwidth_content_<?php echo $i?>" class="repeatable_section section_fullwidth_content" style="background-color:<?php echo $bgcolor ?>;color:<?php echo $textcolor ?>;">
              <div class="wrapper">
                <div class="flexwrap">
                  <div class="textcol">
                    <?php if ($icon) { ?>
                     <div class="section-icon">
                        <span style="background-image:url('<?php echo $icon['url'] ?>')"></span>
                     </div> 
                    <?php } ?>
                    <div class="text"><?php echo $text ?></div>
                    <?php if($btnLink  && $btnTitle) { ?>
                    <div class="button-wrap">
                      <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button <?php echo $button_bgcolor; ?>"><?php echo $btnTitle ?></a>
                    </div>
                    <?php } ?>
                  </div>
                </div>
                
              </div>
            </section>
          <?php } ?>
        <?php } ?>

      <?php $i++; endwhile; ?>
    <?php } ?>

    


  <?php endwhile; ?>
  </main>
</div>
<?php
get_footer();