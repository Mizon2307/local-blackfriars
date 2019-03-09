<?php
  $label = get_sub_field('nav_label');
?>

<section id="section-<?php echo $label; ?>" class="gallery relative">

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
    ?>

    <?php
      while ( have_rows ('slides') ) : the_row();
      $img = get_sub_field('image_file');
    ?>

        <div class="bg-cover bg-center bg-no-repeat" style="background-image:url('<?php echo $img; ?>');"></div>

      <?php
        endwhile;
      ?>

      <?php
        else :
      ?>

      <?php
        endif;
      ?>

    </div>

</section>
