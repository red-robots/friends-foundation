<?php if( have_rows('flexible_content') ) { ?>
  <?php $i=1; while( have_rows('flexible_content') ): the_row(); ?>
 

    <?php if( get_row_layout() == 'two_column_text_image' ) { ?>
      <?php 
      $text_position = get_sub_field('text_position');
      $title = get_sub_field('title');
      $content = get_sub_field('content');
      $bgcolor = get_sub_field('bgcolor');
      $textcolor = get_sub_field('textcolor');
      $swoosh_color = get_sub_field('swoosh_color');
      $swoosh = ($swoosh_color) ? $swoosh_color : 'red';
      $image = get_sub_field('image');
      $styles = '';
      $section_class = ( ($title || $content) && $image ) ? ' twocol':' onecol';
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
              <h2 class="blockTitle <?php echo $swoosh ?>"><?php echo $title ?></h2>
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
      $swoosh_color = get_sub_field('swoosh_color');
      $swoosh = ($swoosh_color) ? $swoosh_color : 'red';
      ?>
      <section id="section-three_column_block-<?php echo $i ?>" class="repeatable-block section-three_column_block">
        <div class="wrapper">
          <?php if ($block_title) { ?>
            <h2 class="blockTitle <?php echo $swoosh ?>"><?php echo $block_title ?></h2>
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


  <?php $i++; endwhile; ?>
<?php } ?>