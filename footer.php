	</div><!-- #content -->

  <?php 
    $footLogo = get_field('footer_logo','option'); 
    $address = get_field('address','option'); 
    $email = get_field('email','option'); 
    $phone = get_field('phone','option'); 

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

         <?php if ($address || $email || $phone) { ?>
          <div class="footcol branches">
            <div class="company-info">
              <?php if ($address) { ?>
                <span class="address-info"><?php echo $address ?></span>
              <?php } ?>
                <span class="wrapinfo">
                <?php if ($email) { ?>
                  <span class="email-info"><a href="mailto:<?php echo antispambot($email,true) ?>"><?php echo antispambot($email,false) ?></a></span>
                <?php } ?>
                <?php if ($phone) { ?>
                  <span class="phone-info"><a href="tel:<?php echo format_phone_number($phone) ?>"><?php echo $phone ?></a></span>
                </span>
              <?php } ?>
            </div>
            <div class="copyright-info">
              <span class="copyright">&copy; <?php echo get_bloginfo('name') ?></span>
              <span class="poweredby">Website by <a href="https://bellaworksweb.com/" target="_blank">Bellaworks</a></span>
            </div>
          </div> 
           <?php } ?>

          <?php 
          $donate = get_field('donate_button','option');
          $donateTitle = ( isset($donate['title']) && $donate['title'] ) ? $donate['title'] : '';
          $donateLink = ( isset($donate['url']) && $donate['url'] ) ? $donate['url'] : '';
          $donateTarget = ( isset($donate['target']) && $donate['target'] ) ? $donate['target'] : '_self';

          $social_media = get_social_media(); ?>
          <?php if($social_media) { ?>
            <div class="footcol socialMedia">
              <div class="wrap">
                <div class="inner">
                <?php foreach ($social_media as $icon) { ?>
                <a href="<?php echo $icon['url'] ?>" target="_blank" arial-label="<?php echo ucwords($icon['type']) ?>"><i class="<?php echo $icon['icon'] ?>"></i></a> 
                <?php } ?>
                </div>

                <?php if ($donateTitle && $donateLink) { ?>
                <div class="buttondiv">
                  <a href="<?php echo $donateLink ?>" target="<?php echo $donateTarget ?>" class="button"><?php echo $donateTitle ?></a>
                </div>
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

<?php wp_footer(); ?>
</body>
</html>
