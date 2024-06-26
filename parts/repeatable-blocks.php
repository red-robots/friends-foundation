<?php if( have_rows('flexible_content') ) { ?>
  <?php $i=1; while( have_rows('flexible_content') ): the_row(); ?>
 

    <?php if( get_row_layout() == 'two_column_text_image' ) { ?>
      <?php 
      $text_position = get_sub_field('text_position');
      $title = get_sub_field('title');
      $content = get_sub_field('content');
      $bgcolor = get_sub_field('bgcolor');
      $textcolor = get_sub_field('textcolor');
      $image = get_sub_field('image');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      $section_class = ( ($title || $content) && $image ) ? ' twocol':' onecol';
      $styles = '';
      if($bgcolor) {
        $styles .= 'background-color:'.$bgcolor.';';
      }
      if($textcolor) {
        $styles .= 'color:'.$textcolor.';';
      }
      if($styles) { ?>
      <style>
          #section-two_column_text_image-<?php echo $i ?> .textCol { <?php echo $styles ?> } 
          #section-two_column_text_image-<?php echo $i ?> .blockTitle{color:<?php echo $textcolor ?>!important;}
      </style>
      <?php } ?>
      <section id="section-two_column_text_image-<?php echo $i ?>" class="repeatable-block section-two_column_text_image text-<?php echo $text_position ?><?php echo $section_class ?>">
        <div class="flexbox">
          <?php if ($title || $content) { ?>
          <div class="textCol">
            <div class="inner">
            <?php if ($title) { ?>
              <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $title ?></h2>
            <?php } ?>
            <?php if ($content) { ?>
              <div class="blockText"><?php echo $content ?></div>
            <?php } ?>
            </div>
          </div>
          <?php } ?>

          <?php if ($image) { ?>
          <div class="imageCol">
            <figure>
              <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
            </figure>
          </div>
          <?php } ?>
        </div>
      </section>
    <?php } ?>

    <?php if( get_row_layout() == 'three_column_block' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $columns = get_sub_field('columns');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      ?>
      <section id="section-three_column_block-<?php echo $i ?>" class="repeatable-block section-three_column_block">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>

          <?php if ($columns) { ?>
          <div class="flexbox">
            <?php foreach ($columns as $val) { 
              $image = $val['image'];
              $text = $val['text'];
              $link = $val['clickthrough'];
              $blockUrl = (isset($link['url']) && $link['url']) ? $link['url'] : '';
              $blockTitle = (isset($link['title']) && $link['title']) ? $link['title'] : '';
              $blockUrlTarget = (isset($link['target']) && $link['target']) ? $link['target'] : '_self';
              $openLink = '';
              $closeLink = '';
              if($blockUrl) {
                $openLink = '<a href="'.$blockUrl.'" target="'.$blockUrlTarget.'" class="clickthrough">';
                $closeLink = '</a>';
              }
              ?>
              <div class="flexcol">
                <div class="flexInner">
                  <?php echo $openLink; ?>
                  <?php if ($image) { ?>
                  <figure class="imageCol">
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                  </figure>  
                  <?php } ?>

                  <?php if ($text) { ?>
                  <div class="textCol">
                    <div class="inside"><?php echo $text ?></div>
                  </div>  
                  <?php } ?>
                  <?php echo $closeLink; ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </section>
    <?php } ?>

    <?php if( get_row_layout() == 'gallery_block' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $gallery = get_sub_field('gallery');
      $is_rounded = get_sub_field('rounded_images');
      $rounded_images = ($is_rounded) ? ' rounded-images':'';
      $title_color = get_sub_field('title_color');
      $bgcolor = get_sub_field('bgcolor');
      $styles = ($title_color || $bgcolor) ? true : false;
      if($styles) { ?>
      <style>
        #section-gallery_block-<?php echo $i ?> {background-color:<?php echo $bgcolor ?>;}
        #section-gallery_block-<?php echo $i ?> h2 {color:<?php echo $title_color ?>;}
      </style>
      <?php } ?>
      <section id="section-gallery_block-<?php echo $i ?>" class="repeatable-block section-gallery_block">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <?php if ($gallery) { ?>
          <div class="gallery-images-grid<?php echo $rounded_images ?>">
            <?php foreach ($gallery as $img) { 
              $click = get_field('clickthrough', $img['ID']);
              $imgLink = (isset($click['url']) && $click['url']) ? $click['url'] : '';
              $imgTitle = (isset($click['title']) && $click['title']) ? $click['title'] : '';
              $imgTarget = (isset($click['target']) && $click['target']) ? $click['target'] : '_self';
            ?>
            <figure class="gallery-item">
              <?php if ($imgLink) { ?>
              <a href="<?php echo $imgLink ?>" target="<?php echo $imgTarget ?>" class="inner">
                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
              </a>
              <?php } else { ?>
              <div class="inner">
                <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
              </div>
              <?php } ?>
            </figure> 
            <?php } ?>
          </div>  
          <?php } ?>
        </div>
      </section>
    <?php } ?>

    <?php if( get_row_layout() == 'icons_buttons' ) { ?>
      <?php  
      $icon_info = get_sub_field('icon_info');
      $bgcolor = get_sub_field('bgcolor');
      $textcolor = get_sub_field('textcolor');
      $styles = ($textcolor || $bgcolor) ? true : false;
      if($styles) { ?>
      <style>
        #section-icons_buttons-<?php echo $i ?> {background-color:<?php echo $bgcolor ?>;color:<?php echo $textcolor ?>;}
      </style>
      <?php } 
      if($icon_info) { ?>
      <section id="section-icons_buttons-<?php echo $i ?>" class="repeatable-block section-icons_buttons">
        <div class="wrapper">
          <div class="flexbox">
          <?php foreach ($icon_info as $icon) { 
            $iconImg = $icon['icon'];
            $description = $icon['description'];
            $btn = $icon['button'];
            $btnUrl = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
            $btnTitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
            $btnTarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
            ?>
            <?php if ($iconImg || $description) { ?>
            <div class="flexcol">
              <div class="inside">
                <?php if ($iconImg) { ?>
                  <figure class="icon">
                    <span style="background-image:url('<?php echo $iconImg['url'] ?>')"></span>
                  </figure>
                <?php } ?>
                <?php if ($btnUrl && $btnTitle) { ?>
                  <div class="buttondiv">
                    <a href="<?php echo $btnUrl ?>" target="<?php echo $btnTarget ?>" class="button"><?php echo $btnTitle ?></a>
                  </div>
                <?php } ?>
                <?php if ($description) { ?>
                  <div class="description">
                    <?php echo $description ?>
                  </div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          <?php } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>


    <?php if( get_row_layout() == 'fullwidth_text_block' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $block_title_alignment = get_sub_field('block_title_alignment');
      $textcontent = get_sub_field('textcontent');
      $cta_buttons = get_sub_field('cta_buttons');
      $featured_image = get_sub_field('featured_image');
      $image_position = get_sub_field('image_position');
      $image_width = get_sub_field('image_width');
      $imgWidth = ($image_width) ? $image_width : 20;
      $textWidth = 100 - $imgWidth;
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      $classes = array();
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color');
        $classes[] = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      if($block_title_alignment) {
        $classes[] = 'text-' . $block_title_alignment;
      }
      if($classes) {
        $swoosh = implode(' ',$classes);
      }
      if($textWidth < 10) {
        $textWidth = 80;
        $imgWidth = 20;
      }
      $section_classes = '';
      $textBlockStyle = '';
      if($featured_image) {
        $section_classes = ' has-featured-image';
        $textBlockStyle = ' style="width:'.$textWidth.'%"';
      } else {
        $textBlockStyle = ' style="width:100%;padding-left:5vw;padding-right:5vw"';
      }
      ?>
      <section id="section-fullwidth_text_block-<?php echo $i ?>" class="repeatable-block section-fullwidth_text_block<?php echo $section_classes ?>">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <?php if ($textcontent || $cta_buttons || $featured_image) { ?>
            <div class="textWrapper <?php echo ($image_position) ? 'has-image image-'.$image_position : '' ?>">
              <div class="blockText"<?php echo $textBlockStyle ?>>
                <div class="textwrap">
                  <?php echo $textcontent ?>    
                </div>
                <?php if ($cta_buttons) { ?>
                  <div class="buttons-block">
                    <?php foreach ($cta_buttons as $cta) { 
                      $btn = $cta['button'];
                      $btnlink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                      $btntitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                      $btntarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                      if($btntitle && $btnlink) { ?>
                        <a href="<?php echo $btnlink ?>" target="<?php echo $btntarget ?>" class="button"><?php echo $btntitle ?></a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                <?php } ?>
              </div>
              <?php if ($featured_image) { ?>
              <figure class="image-block <?php echo $image_position ?>" style="width:<?php echo $imgWidth ?>%">
                <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>">
              </figure> 
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </section>
    <?php } ?>

    <?php if( get_row_layout() == 'Boxes_checkboxes' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $textcontent = get_sub_field('textcontent');
      $column_content = get_sub_field('column_content');
      //$cta_buttons = get_sub_field('cta_buttons');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      ?>
      <section id="section-boxes_checkboxes-<?php echo $i ?>" class="repeatable-block section-boxes_checkboxes">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <?php if ($textcontent || $column_content) { ?>
            <div class="blockText">
              <div class="textwrap">
                <?php echo $textcontent ?>    
              </div>
              
              <?php if ($column_content) { ?>
              <div class="column-content-checkboxes">
                <?php foreach ($column_content as $col) { 
                  $bulletType = $col['bullet_point_type'];
                  $content = $col['content'];
                  ?>
                  <div class="textCol <?php echo $bulletType ?>">
                    <div class="inner">
                      <?php echo $content ?>
                    </div>
                  </div>
                <?php } ?>
              </div> 
              <?php } ?>
            </div>
          <?php } ?>
            
        </div>
      </section>
    <?php } ?>

    <?php if( get_row_layout() == 'three_columns_with_numbers' ) { ?>
      <?php  
        $block_title = get_sub_field('block_title');
        $textcontent = get_sub_field('textcontent');
        $textcontent_bottom = get_sub_field('textcontent_bottom');
        $cta_buttons = get_sub_field('cta_buttons');
        $column_content = get_sub_field('column_content');
        $has_swoosh = get_sub_field('has_swoosh');
        $swoosh = '';
        if($has_swoosh) {
          $swoosh_color = get_sub_field('swoosh_color_column_w_numbers');
          $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
        }
      ?>
      <section id="section-three_columns_with_numbers-<?php echo $i ?>" class="repeatable-block section-three_columns_with_numbers">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <?php if ($textcontent || $cta_buttons) { ?>
            <div class="blockText">

              <?php if ($textcontent) { ?>
              <div class="textwrap">
                <?php echo $textcontent ?>    
              </div>
              <?php } ?>

              <?php if ($column_content) { ?>
              <div class="column-content">
                <div class="flexwrap">
                <?php foreach ($column_content as $col) { 
                  $number = $col['number_title'];
                  $description = $col['description'];
                  if($number) { ?>
                  <div class="fxcol">
                    <?php if ($number) { ?>
                    <div class="number"><span><em><?php echo $number ?></em></span></div> 
                    <?php } ?>
                    <?php if ($description) { ?>
                    <div class="text"><?php echo $description ?></div> 
                    <?php } ?>
                  </div>
                  <?php } ?>
                <?php } ?>
                 </div> 
              </div>
              <?php } ?>

              <?php if ($textcontent_bottom) { ?>
              <div class="textcontent-bottom">
                <div class="textcontent-inner">
                  <?php echo anti_email_spam($textcontent_bottom); ?>
                </div>
              </div>
              <?php } ?>

              <?php if ($cta_buttons) { ?>
                <div class="buttons-block center">
                  <?php foreach ($cta_buttons as $cta) { 
                    $btn = $cta['button'];
                    $btnlink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                    $btntitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                    $btntarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                    if($btntitle && $btnlink) { ?>
                      <a href="<?php echo $btnlink ?>" target="<?php echo $btntarget ?>" class="button"><?php echo $btntitle ?></a>
                    <?php } ?>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </section>
    <?php } ?>


    <?php if( get_row_layout() == 'heart_middle_section' ) { ?>
      <?php  
        $block_title = get_sub_field('block_title');
        $contents = get_sub_field('content');
        $has_swoosh = get_sub_field('has_swoosh');
        $swoosh = '';
        if($has_swoosh) {
          $swoosh_color = get_sub_field('swoosh_color_heart_middle');
          $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
        }

      if($contents) { $count = count($contents);  ?>
      <section id="section-heart_middle_section-<?php echo $i ?>" class="repeatable-block section-heart_middle_section numrows-<?php echo ($count) ?>">
        <div class="section-inner">
          <div class="flexwrap">
          <?php $n=1; foreach ($contents as $con) { 
            $has_title = $con['prepend_title'];
            $text = $con['text'];
            $image = $con['image'];
            $columnClass = ($text && $image) ? 'half':'full';
            $columnClass .= ($n % 2) ? ' odd':' even';
            ?>
            <?php if ($text || $image) { ?>
            <div class="fxcol <?php echo $columnClass ?>">
              <?php if ($text) { ?>
                <div class="textBox">
                  <?php if ($has_title) { ?>
                    <?php if ($block_title) { ?>
                      <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
                    <?php } ?>
                  <?php } ?>
                  <div class="text">
                    <?php echo anti_email_spam($text) ?>
                  </div>
                </div>    
              <?php } ?>  
              <?php if ($image) { ?>
                <figure class="imageBox">
                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['title'] ?>">
                </figure>    
              <?php } ?>  
            </div>
            <?php } ?>
          <?php $n++; } ?>
          </div>
        </div>
        <span class="heart-graphic"></span>
      </section>
      <?php } ?>
    <?php } ?>

    <?php if( get_row_layout() == 'video_text_block' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $contents = get_sub_field('content');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color_heart_middle');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      if($contents) { ?>
      <section id="section-video_text_block-<?php echo $i ?>" class="repeatable-block section-video_text_block">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <div class="columns">
          <?php $n=1; foreach ($contents as $con) { 
            $videoUrl = $con['video_url'];
            $video_thumbnail = $con['video_thumbnail'];
            $text = $con['text'];
            $columnClass = ($videoUrl && $text) ? 'half':'full';
            $columnClass .= ($n % 2) ? ' odd':' even'; ?>
            <div class="flexwrap <?php echo $columnClass ?>">
              <?php if ($videoUrl) { 
                $video_class = '';
                if (strpos($videoUrl, 'vimeo') !== false) {
                  $video_class = 'vimeo';
                }
                else if ( (strpos($videoUrl, 'youtube.com') !== false) || (strpos($videoUrl, 'youtu.be')!== false) ) {
                  $video_class = 'youtube';
                }
                if($video_thumbnail) {
                  $video_class .= ' has-thumbnail';
                }
                ?>
                <figure class="videoCol <?php echo $video_class ?>">
                  <a href="<?php echo $videoUrl ?>" data-fancybox>
                    <?php if ($video_thumbnail) { ?>
                      <img src="<?php echo $video_thumbnail['url'] ?>" alt="<?php echo $video_thumbnail['title'] ?>">
                    <?php } ?>
                  </a>
                </figure>  
              <?php } ?>
              <?php if ($text) { ?>
              <div class="textCol">
                <div class="inner"><?php echo anti_email_spam($text) ?></div>
              </div>
              <?php } ?>
            </div>
          <?php $n++; } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>


    <?php if( get_row_layout() == 'two_column_large_title' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $contents = get_sub_field('content');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color_heart_middle');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      
      ?>
      <?php if ($contents) { ?>
      <section id="section-two_column_large_title-<?php echo $i ?>" class="repeatable-block section-two_column_large_title">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <div class="columns">
          <?php $i=1; foreach ($contents as $con) { 
              $large_text = $con['large_text'];
              $normal_text = $con['normal_text'];
              $columnClass = ($large_text && $normal_text) ? 'half':'full';
              $columnClass .= ($i % 2) ? ' odd':' even';
              $columnClass .= ($i==1) ? ' first':'';
            ?>
            <div class="flexwrap <?php echo $columnClass ?>">
              <?php if ($large_text) { ?>
              <div class="fxcol left">
                <div class="inner"><?php echo $large_text ?></div>  
              </div>
              <?php } ?>
              <?php if ($normal_text) { ?>
              <div class="fxcol right">
                <div class="inner"><?php echo $normal_text ?></div>
              </div>
              <?php } ?>
            </div>
          <?php $i++; } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>


    <?php if( get_row_layout() == 'three_column_boxed_shadow' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $contents = get_sub_field('content');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color_heart_middle');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      
      ?>
      <?php if ($contents) { $count = count($contents); ?>
      <section id="section-three_column_boxed_shadow-<?php echo $i ?>" class="repeatable-block section-three_column_boxed_shadow count-<?php echo $count ?>">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <div class="flexwrap">
          <?php $v=1; foreach ($contents as $con) { 
              $featured_image = $con['featured_image'];
              $text = $con['textcontent'];
              $highlight = $con['highlight_box'];
              $cta_buttons = $con['cta_buttons'];
              $fxclass = ($v % 2) ? ' odd':' even';
              $fxclass .= ($v==1) ? ' first':'';
              if($highlight) {
                $fxclass .= ' highlight';
              }
              if($featured_image) {
                $fxclass .= ' has-image';
              }
              if($text) { ?>
              <div class="fxcol <?php echo $fxclass ?>">
                <div class="inner">
                  <?php if ($featured_image) { ?>
                  <figure class="feat-image">
                    <img src="<?php echo $featured_image['url'] ?>" alt="<?php echo $featured_image['title'] ?>">
                  </figure>
                  <?php } ?>
                  <div class="text">
                    <?php echo anti_email_spam($text) ?>

                    <?php if ($cta_buttons) { ?>
                    <div class="buttons-block">
                      <?php foreach ($cta_buttons as $cta) { 
                        $btn = $cta['button'];
                        $btnlink = (isset($btn['url']) && $btn['url']) ? $btn['url'] : '';
                        $btntitle = (isset($btn['title']) && $btn['title']) ? $btn['title'] : '';
                        $btntarget = (isset($btn['target']) && $btn['target']) ? $btn['target'] : '_self';
                        if($btntitle && $btnlink) { ?>
                          <div><a href="<?php echo $btnlink ?>" target="<?php echo $btntarget ?>" class="button"><?php echo $btntitle ?></a></div>
                        <?php } ?>
                      <?php } ?>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
          <?php $v++; } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>

    <?php if( get_row_layout() == 'stats_section' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $contents = get_sub_field('content');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color_stats');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      
      ?>
      <?php if ($contents) { $count = count($contents); ?>
      <section id="section-stats_section-<?php echo $i ?>" class="repeatable-block section-stats_section count-<?php echo $count ?>">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <div class="flexwrap">
          <?php $v=1; foreach ($contents as $con) { 
              $top_text = $con['top_text'];
              $large_text = $con['large_text'];
              $bottom_text = $con['bottom_text'];
              $item_class = ($top_text) ? 'has-top-text':'no-top-text';
              if($top_text || $large_text || $bottom_text) { ?>
              <div class="fxcol <?php echo $item_class ?>">
                <div class="wrap">
                  <div class="inner">
                    <?php if ($top_text) { ?>
                     <div class="top-text"><?php echo $top_text ?></div> 
                    <?php } ?>
                    <?php if ($large_text) { ?>
                     <div class="large-text"><?php echo $large_text ?></div> 
                    <?php } ?>
                    <?php if ($bottom_text) { ?>
                     <div class="bottom-text"><?php echo $bottom_text ?></div> 
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>
          <?php $v++; } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>


    <?php if( get_row_layout() == 'simple_columns' ) { ?>
      <?php  
      $block_title = get_sub_field('block_title');
      $columns_per_row = get_sub_field('columns_per_row');
      $per_row = ($columns_per_row) ? $columns_per_row : 3;
      $contents = get_sub_field('simple_blocks');
      $has_swoosh = get_sub_field('has_swoosh_simple_columns');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color_simple_columns');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      
      ?>
      <?php if ($contents) { $count = count($contents); ?>
      <section id="section-simple_columns-<?php echo $i ?>" class="repeatable-block section-simple_columns colnum-<?php echo $per_row ?> count-<?php echo $count ?>">
        <div class="section-inner">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <div class="flexwrap">
          <?php $v=1; foreach ($contents as $con) { 
            $title = $con['title'];
            $description = $con['description'];
            if($title || $description) { ?>
            <div class="fxcol">
              <div class="wrap">
                <div class="inner">
                  <?php if ($title) { ?>
                   <div class="title"><?php echo $title ?></div> 
                  <?php } ?>
                  <?php if ($description) { ?>
                   <div class="description"><?php echo $description ?></div> 
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
          <?php $v++; } ?>
          </div>
        </div>
      </section>
      <?php } ?>
    <?php } ?>


  <?php $i++; endwhile; ?>
<?php } ?>