<?php if( have_rows('flexible_content') ) { ?>
  <?php $i=1; while( have_rows('flexible_content') ): the_row(); ?>

    <?php if( get_row_layout() == 'hero_static' ) {  
      $hero_image = get_sub_field('hero_image');
      $hero_title = get_sub_field('hero_title'); 
      $button = get_sub_field('hero_button'); 
      $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
      $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
      $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
      $text_position = get_sub_field('text_position'); 
      $section_class = ($text_position) ? 'text-' . $text_position : 'text-right';
      if($hero_image) { ?>
      <section id="section_hero_static_<?php echo $i?>" class="repeatable_section section_hero_static <?php echo $section_class?>">
        <div class="columns">
          <figure class="imagecol">
            <img src="<?php echo $hero_image['url'] ?>" alt="<?php echo $hero_image['title'] ?>">
          </figure>
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
      //$title = get_sub_field('title'); 
      $text_alignment = get_sub_field('text_alignment'); 
      if(empty($text_alignment)) {
        $text_alignment = 'center';
      }
      $text = get_sub_field('text'); 
      $button = get_sub_field('button'); 
      $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
      $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
      $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
      $image = get_sub_field('image');
      $image_position = get_sub_field('image_position'); 
      $button_bgcolor = get_sub_field('button_bgcolor'); 
      $bgcolor = get_sub_field('bgcolor'); 
      $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#FFF'; 
      $styles = '';
      if ($bgcolor) {
        $styles .= 'background-color:'.$bgcolor.';';
      }
      $styleAtt = ($styles) ? ' style="'.$styles.'"' : '';

      $section_class = ($image_position) ? 'image-' . $image_position : 'image-right';
      $section_class .= ( $image && ($title || $text) ) ? ' half':' full';
      if( $image || ($title || $text) ) { ?>
      <section id="section_two_column_image_text_<?php echo $i?>" class="repeatable_section section_two_column_image_text <?php echo $section_class?>"<?php echo $styleAtt ?>>
        <div class="columns">
          <?php if ($image) { ?>
          <figure class="imagecol">
            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
          </figure> 
          <?php } ?>
          <?php if ($text) { ?>
          <div class="textcol text-<?php echo $text_alignment ?>" style="color:<?php echo $textcolor ?>">
            <div class="inner">
              <?php if ($text) { ?>
               <div class="section-text"><?php echo anti_email_spam($text) ?></h2> 
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
               <div class="section-text"><?php echo anti_email_spam($text) ?></h2> 
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


    else if( get_row_layout() == 'two_column_slant_alltext' ) { 
      $column1_width = get_sub_field('column1_width');
      $column2_width = get_sub_field('column2_width');
      $width1 = ($column1_width) ? 'width:'.$column1_width.'%':'';
      $width2 = ($column2_width) ? 'width:'.$column2_width.'%':'';

      //Column 1
      $icon = get_sub_field('icon'); 
      $text = get_sub_field('textcontent'); 
      $button = get_sub_field('button'); 
      $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
      $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
      $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';
      $button_bgcolor = get_sub_field('button_bgcolor'); 
      $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#FFF'; 
      $bgcolor = (get_sub_field('bgcolor')) ? get_sub_field('bgcolor') : '#CCC'; 

      //Column 2
      $text2 = get_sub_field('textcontent_col2'); 
      $button2 = get_sub_field('button_col2'); 
      $btnLink2 = (isset($button2['url']) && $button2['url']) ? $button2['url'] : '';
      $btnTitle2 = (isset($button2['title']) && $button2['title']) ? $button2['title'] : '';
      $btnTarget2 = (isset($button2['target']) && $button2['target']) ? $button2['target'] : '_self';
      $button_bgcolor2 = get_sub_field('button_bgcolor_col2'); 
      $textcolor2 = (get_sub_field('textcolor_col2')) ? get_sub_field('textcolor_col2') : '#808184'; 
      $bgcolor2 = (get_sub_field('bgcolor_col2')) ? get_sub_field('bgcolor_col2') : '#FFF'; 

      $section_class = ($text && $text2) ? 'half':'full';

      


      if( $text || $text2 ) { ?>
      <section id="two_column_slant_alltext_<?php echo $i?>" class="repeatable_section section_two_column_slant_alltext <?php echo $section_class?>">
        <div class="columns">
          <?php if ($text) { ?>
          <div class="textcol column1" style="color:<?php echo $textcolor ?>;<?php echo $width1; ?>">
            <span class="bgcolor" style="background-color:<?php echo $bgcolor ?>;"></span>
            <span class="slant" style="background-color:<?php echo $bgcolor ?>;"></span>
            <div class="inner">
              <?php echo anti_email_spam($text) ?>
              <?php if($btnLink  && $btnTitle) { ?>
              <div class="button-wrap">
                <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button <?php echo $button_bgcolor; ?>"><?php echo $btnTitle ?></a>
              </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
          <?php if ($text2) { ?>
          <div class="textcol column2" style="background-color:<?php echo $bgcolor2 ?>;color:<?php echo $textcolor2 ?>;<?php echo $width2; ?>">
            <div class="inner">
              <?php echo anti_email_spam($text2) ?>
              <?php if($btnLink2  && $btnTitle2) { ?>
              <div class="button-wrap">
                <a href="<?php echo $btnLink2 ?>" target="<?php echo $btnTarget2 ?>" class="button <?php echo $button_bgcolor2; ?>"><?php echo $btnTitle2 ?></a>
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
      $text_alignment = get_sub_field('text_alignment'); 
      if(empty($text_alignment)) {
        $text_alignment = 'center';
      }
      $icon = get_sub_field('icon'); 
      $text = get_sub_field('textcontent'); 

      $textcolor = (get_sub_field('textcolor')) ? get_sub_field('textcolor') : '#FFF'; 
      $bgcolor = (get_sub_field('bgcolor')) ? get_sub_field('bgcolor') : '#CCC'; 
      $button_bgcolor = get_sub_field('button_bgcolor');

      //Button 1
      $button = get_sub_field('button'); 
      $btnLink = (isset($button['url']) && $button['url']) ? $button['url'] : '';
      $btnTitle = (isset($button['title']) && $button['title']) ? $button['title'] : '';
      $btnTarget = (isset($button['target']) && $button['target']) ? $button['target'] : '_self';

      //Button 2
      $button2 = get_sub_field('button2'); 
      $btnLink2 = (isset($button2['url']) && $button2['url']) ? $button2['url'] : '';
      $btnTitle2 = (isset($button2['title']) && $button2['title']) ? $button2['title'] : '';
      $btnTarget2 = (isset($button2['target']) && $button2['target']) ? $button2['target'] : '_self';
      $button_bgcolor2 = get_sub_field('button_bgcolor2');


       
      if($text) { ?>
        <section id="section_fullwidth_content_<?php echo $i?>" class="repeatable_section section_fullwidth_content" style="background-color:<?php echo $bgcolor ?>;color:<?php echo $textcolor ?>;">
          <div class="wrapper">
            <div class="flexwrap">
              <div class="textcol text-<?php echo $text_alignment ?>">
                <?php if ($icon) { ?>
                 <div class="section-icon">
                    <span style="background-image:url('<?php echo $icon['url'] ?>')"></span>
                 </div> 
                <?php } ?>
                <div class="text"><?php echo anti_email_spam($text) ?></div>
                <?php if( ($btnLink  && $btnTitle) || ($btnLink2  && $btnTitle2) ) { ?>
                <div class="button-wrap">
                  <?php if ($btnLink  && $btnTitle) { ?>
                    <a href="<?php echo $btnLink ?>" target="<?php echo $btnTarget ?>" class="button <?php echo $button_bgcolor; ?>"><?php echo $btnTitle ?></a>
                  <?php } ?>
                  
                  <?php if ($btnLink2  && $btnTitle2) { ?>
                    <a href="<?php echo $btnLink2 ?>" target="<?php echo $btnTarget2 ?>" class="button <?php echo $button_bgcolor2; ?>"><?php echo $btnTitle2 ?></a>
                  <?php } ?>
                </div>
                <?php } ?>
              </div>
            </div>
            
          </div>
        </section>
      <?php } ?>
    <?php } 

    else if( get_row_layout() == 'shortcode_section' ) { 
      $shortcode = get_sub_field('shortcode');
      $section_title = get_sub_field('section_title');
      if( $shortcode && do_shortcode($shortcode) ) { ?>
      <section id="section_shortcode_content_<?php echo $i?>" class="repeatable_section section_shortcode_content">
        <?php if ($section_title) { ?>
         <div class="titlediv wrapper">
           <h2 class="section-title"><?php echo $section_title ?></h2>
         </div> 
        <?php } ?>
        <?php echo do_shortcode($shortcode); ?>
      </section>
      <?php } ?>
    <?php } 

    else if( get_row_layout() == 'flexible_columns' ) { 
      $numcols = get_sub_field('numcols');
      $cols = ($numcols) ? $numcols : 1;
      if( have_rows('column_content') ) { ?>
      <section id="section_flexible_columns_<?php echo $i?>" class="repeatable_section section_flexible_columns numcols_<?php echo $cols?>">
        <div class="columns">
        <?php $fn=$i; while( have_rows('column_content') ): the_row(); 

          if( get_row_layout() == 'text_content') {
            $text = get_sub_field('text');
            $textcolor = get_sub_field('textcolor');
            $bg_color = get_sub_field('bg_color');
            $bg_image = get_sub_field('bg_image');
            $bg_overlay = get_sub_field('bg_overlay');
            $styles = '';
            $sec_class = '';
            if($textcolor) {
              $styles = 'color:'.$textcolor.';';
            }
            if($bg_color) {
              $styles .= 'background-color:'.$bg_color.';';
              $sec_class = ' has-bg-color';
            }
            if($bg_image) {
              $sec_class .= ' has-bg-image';
            }
            if($bg_overlay) {
              $sec_class .= ' has-bg-overlay';
            }
            
            if($text) { ?>
            <div class="flexcol textCol<?php echo $sec_class?>" style="<?php echo $styles?>">
              <?php if ($bg_image) { ?>
              <div class="background-image<?php echo ($bg_overlay) ? ' has-overlay':'' ?>" style="background-image:url('<?php echo $bg_image['url'] ?>');">
                <?php if ($bg_overlay) { ?>
                <div class="overlay" style="background-color:<?php echo $bg_overlay ?>"></div>
                <?php } ?>
              </div> 
              <?php } ?>
              <div class="inside">
                <?php echo anti_email_spam($text); ?>
              </div>
            </div>
            <?php } ?>

          <?php } ?>

        <?php $fn++; endwhile; ?>
        </div>
      </section>  
      <?php } ?>
    <?php } ?>

  <?php $i++; endwhile; ?>
<?php } ?>