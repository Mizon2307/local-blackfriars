<?php
 $title = get_sub_field('title');
 $txt = get_sub_field('text');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="text-gallery bg-white text-black pt-16 sm:pt-20 md:pt-24">

  <div class="container mx-auto max-w-xl flex flex-wrap">
    <div class="w-full md:w-1/2 sm:pr-10 md:pr-16 lg:pr-24 mb-12 md:mb-0 px-8 self-center">
      <h3 class="text-teal text-4xl sm:text-5xl lg:text-6xl tracking-wide leading-tight mb-8 sm:mb-10"><?php echo $title; ?></h3>
      <?php echo $txt; ?>
    </div>
    <div class="w-full md:w-1/2 md:px-6">

      <div class="slider h-full"
        <?php
          $options = get_sub_field('gallery_options');
          if( $options ): ?>

        <?php foreach( $options as $option ): ?>
  		     data-<?php echo $option; ?>="true"
      	<?php endforeach; ?>

         <?php endif; ?>
      >

      <?php
        if( have_rows ('slides') ):
        while ( have_rows ('slides') ) : the_row();
        $img = get_sub_field('image_file');
      ?>

        <div class="bg-cover bg-center bg-no-repeat" style="background-image:url('<?php echo $img; ?>');"></div>

      <?php endwhile; endif; ?>

      </div>

    </div>
  </div>

</section>
