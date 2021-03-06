<?php
/**
 * The template for displaying the Flexible Content.
 *
 * @package Starter_Theme
 */

/*
Template Name: Privacy
*/

get_header(); ?>

<section class="title-text bg-black text-white pt-32 pb-24 lg:pb-16">
  <div class="container mx-auto max-w-xl px-8 flex">
    <div class="w-full">
      <h1 class="mb-10 text-teal">Privacy Policy</h1>
      <?php the_field('content'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
