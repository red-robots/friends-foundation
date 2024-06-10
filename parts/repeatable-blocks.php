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
      <style>#section-two_column_text_image-<?php echo $i ?> .textCol { <?php echo $styles ?> }</style>
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
      $textcontent = get_sub_field('textcontent');
      $cta_buttons = get_sub_field('cta_buttons');
      $has_swoosh = get_sub_field('has_swoosh');
      $swoosh = '';
      if($has_swoosh) {
        $swoosh_color = get_sub_field('swoosh_color');
        $swoosh = ($swoosh_color) ? ' has-swoosh ' . $swoosh_color : ' has-swoosh red';
      }
      ?>
      <section id="section-fullwidth_text_block-<?php echo $i ?>" class="repeatable-block section-fullwidth_text_block">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle<?php echo $swoosh ?>"><?php echo $block_title ?></h2>
          <?php } ?>
          <?php if ($textcontent || $cta_buttons) { ?>
            <div class="blockText">
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


  <?php $i++; endwhile; ?>
<?php } ?>