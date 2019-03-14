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
  <div class="container max-w-xl mx-auto flex flex-wrap px-6 sm:px-8">
    <div class="w-full md:w-1/2 md:pr-3">
      <h3 class="text-4xl sm:text-5xl tracking-wide"><?php the_field('contact_title', 'option'); ?></h3>
      <p class="underline mt-16 sm:mt-20 mb-12 md:mb-0 text-2xl font-bold white">T: <?php the_field('telephone', 'option'); ?></p>
      <p class="mt-12 hidden md:block"><?php the_field('address', 'option'); ?></p>
    </div>
    <div class="w-full md:w-1/2 md:pl-3">
      <?php the_field('form_code', 'option'); ?>
    </div>
  </div>
</footer>

<div class="footer-bottom flex flex-wrap md:flex-no-wrap items-center bg-brown text-white pb-8 px-4 sm:px-8">

  <div class="w-full w-auto sm:w-2/3 md:1/2 sm:pr-3 text-center sm:text-left flex flex-wrap items-start">

    <div class="w-full sm:w-auto sm:inline-block">
      <p class="m0 mb-4"><?php the_field('developed_txt', 'option'); ?></p>
      <img src="<?php the_field('developed_logo', 'option'); ?>" class="mb-8 sm:mb-0 w-28">
    </div>

    <div class="w-full sm:w-auto sm:inline-block sm:ml-8">
      <p class="m0 mb-2"><?php the_field('managed_txt', 'option'); ?></p>
      <img src="<?php the_field('managed_logo', 'option'); ?>" class="w-32">
    </div>

  </div>

  <div class="w-full sm:w-1/3 md:w-1/2 md:pl-3 mt-8 sm:mt-0 text-center sm:text-right">

    <ul class="m-0 p-0 hidden lg:inline-block md:mr-12">
      <?php if( have_rows('links', 'option') ):
						while ( have_rows('links', 'option') ) : the_row();?>

          <li class="list-reset"><a href="<?php the_sub_field('page_link', 'option'); ?>" class="text-white hover:text-grey font-bold text-sm"><?php the_sub_field('link_txt', 'option'); ?></a></li>

      <?php endwhile; endif; ?>
    </ul>

    <p class="font-bold text-sm inline-block text-left">&copy; <?php echo date("Y") ?> <?php the_field('copyright', 'option'); ?></p>

  </div>

</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('api_key', 'option'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
