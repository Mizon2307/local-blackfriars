<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Starter
 */
?>

<footer id="contact" class="flex bg-brown text-white py-16 sm:py-20 md:py-24">
  <div class="container max-w-xl mx-auto flex flex-wrap px-8">
    <div class="w-full md:w-1/2 md:pr-3">
      <h3 class="text-4xl text-5xl tracking-wide"><?php the_field('contact_title', 'option'); ?></h3>
      <p class="underline mt-16 sm:mt-20 mb-12 md:mb-0 text-2xl font-bold">T: <?php the_field('telephone', 'option'); ?></p>
      <p class="mt-12 hidden md:block"><?php the_field('address', 'option'); ?></p>
    </div>
    <div class="w-full md:w-1/2 md:pl-3">
      <?php the_field('form_code', 'option'); ?>
    </div>
  </div>
</footer>

<div class="footer-bottom flex bg-brown text-white pb-6 px-4 sm:px-8">
  <div class="w-full sm:w-1/2 sm:pr-3">
    <p class="m0 font-bold text-sm inline-block"><?php the_field('designed_text', 'option'); ?> <a href="<?php the_field('designed_url', 'option'); ?>" target="_blank" class="text-white no-underline hover:text-grey">90degrees</a></p>
  </div>
  <div class="w-full sm:w-1/2 sm:pl-3 text-right">
    <ul class="m-0 p-0 hidden md:inline-block md:mr-12">
      <?php if( have_rows('links', 'option') ):
						while ( have_rows('links', 'option') ) : the_row();?>

          <li class="list-reset"><a href="<?php the_sub_field('page_link', 'option'); ?>" class="text-white hover:text-grey font-bold text-sm"><?php the_sub_field('link_txt', 'option'); ?></a></li>

      <?php endwhile; endif; ?>
    </ul>
    <p class="font-bold text-sm inline-block">&copy; <?php echo date("Y") ?> <?php the_field('copyright', 'option'); ?></p>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('api_key', 'option'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
