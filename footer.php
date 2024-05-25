	</div><!-- #content -->

  <?php 
    $footLogo = get_field('footer_logo','option'); 
    $branches = get_field('branches','option'); 

  ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper">

			<?php if ($footLogo || $branches) { ?>
       <div class="flexwrap">
          <div class="footcol footLogo">
           <?php if ($footLogo) { ?>
            <figure>
              <img src="<?php echo $footLogo['url'] ?>" alt="<?php echo $footLogo['title'] ?>">
            </figure> 
           <?php } ?>
          </div>

         <?php if ($branches) { ?>
          <div class="footcol branches">
            <div class="columns">
            <?php foreach ($branches as $b) { ?>
              <?php if ($b['branch']) { ?>
                <div class="branch"><?php echo $b['branch'] ?></div>
              <?php } ?>
            <?php } ?>
            </div>
          </div> 
           <?php } ?>

          <?php $social_media = get_social_media(); ?>
          <?php if($social_media) { ?>
            <div class="footcol socialMedia">
              <div class="inner">
              <?php foreach ($social_media as $icon) { ?>
              <a href="<?php echo $icon['url'] ?>" target="_blank" arial-label="<?php echo ucwords($icon['type']) ?>"><i class="<?php echo $icon['icon'] ?>"></i></a> 
              <?php } ?>
              </div>
            </div>
          <?php } ?>
         </div>
       </div> 
      <?php } ?>

		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<div id="loaderContainer">
  <span class="loader"></span>
</div>

<div class="popupContainer">
  <div class="popupInner animated fadeInDown">
    <a href="javascript:void(0)" class="close-popup" role="button"><span class="sr-only">close</span><i class="fa fa-times" aria-hidden="true"></i></a>
    <div id="popupContent"></div>
  </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
