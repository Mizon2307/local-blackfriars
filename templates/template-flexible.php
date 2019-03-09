<?php
/**
 * The template for displaying the Flexible Content.
 *
 * @package Starter_Theme
 */

/*
Template Name: Flexible Content
*/

get_header(); ?>



<?php

    // Check if the flexible content field has rows of data
    if( have_rows('blocks') ):

      // Loop through the rows of data
      while ( have_rows('blocks') ) : the_row();

        // Get the reference to this block
        $block = get_row_layout();

        // Set file name
        $file = get_template_directory() . '/templates/blocks/'.$block.'.php';

        // Check file exists
        if( file_exists($file) ) {

          // Ok to include
          include($file);

        }

      endwhile;

    else :

      // No layouts found

    endif;

?>



<?php
get_footer();
