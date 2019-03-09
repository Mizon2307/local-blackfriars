<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="gallery relative bg-black">

    <div class="slider h-2/3"
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

</section>
