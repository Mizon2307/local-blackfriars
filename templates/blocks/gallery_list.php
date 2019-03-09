<?php
 $title = get_sub_field('title');
 $txt = get_sub_field('text');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="gallery-list bg-white text-black pt-16 sm:pt-20 md:pt-24">

  <div class="container mx-auto max-w-xl flex flex-wrap">

    <div class="item w-full md:w-1/2 pl-24 mb-12 sm:mb-16 md:py-6 md:mb-0 lg:pl-32">
      <ul class="features relative">
        <?php
          if( have_rows ('list') ):
          while ( have_rows ('list') ) : the_row();
          $item = get_sub_field('item');
        ?>

          <li class="relative w-full list-reset font-bold mb-1 text-3xl sm:text-4xl"><span class="inline-block bg-teal text-white px-2"><?php echo $item; ?></span></li>

        <?php endwhile; endif; ?>
      </ul>
    </div>

    <div class="item w-full md:w-1/2 md:px-6">

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
