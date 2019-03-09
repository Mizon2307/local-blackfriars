<?php
 $title = get_sub_field('title');
 $txt = get_sub_field('text');
?>


<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="available relative bg-black text-white">

  <div class="container mx-auto max-w-md flex flex-wrap px-8 py-16 sm:py-20 md:py-24">
    <h3 class="text-teal text-4xl sm:text-5xl tracking-wide text-left mb-10"><?php echo $title; ?></h3>
    <p class="mb-3"><?php echo $txt; ?></p>

    <?php
      if( have_rows ('plans') ):
      while ( have_rows ('plans') ) : the_row();
      $name = get_sub_field('name');
    ?>

    <div class="w-full mt-10"><?php echo $name; ?></div>

  </div>
</section>


<section class="bg-grey py-16 sm:py-20 md:py-24">

  <div class="container mx-auto">

    <div class="slider"
      <?php
        $options = get_sub_field('gallery_options');
        if( $options ): ?>

      <?php foreach( $options as $option ): ?>
         data-<?php echo $option; ?>="true"
      <?php endforeach; ?>

       <?php endif; ?>
    >

      <?php
        if( have_rows ('slider') ):
        while ( have_rows ('slider') ) : the_row();
        $img = get_sub_field('image');
        $title = get_sub_field('title');
      ?>

      <?php if(get_sub_field('content_type') == "image") { ?>
        <div><img src="<?php echo $img; ?>"></div>
      <?php } ?>


      <?php if(get_sub_field('content_type') == "list") { ?>
        <div>

          <h3 class="text-black text-4xl sm:text-5xl tracking-wide text-left mb-10"><?php echo $title; ?></h3>

          <?php
            if( have_rows ('lists') ):
            while ( have_rows ('lists') ) : the_row();
          ?>

          <ul>

            <?php
              if( have_rows ('items') ):
              while ( have_rows ('items') ) : the_row();
              $icon = get_sub_field('icon');
              $txt = get_sub_field('text');
            ?>

              <li><img src="<?php echo $icon; ?>"><p><?php echo $txt; ?></p></li>


            <?php endwhile; endif; ?>

          </ul>

          <?php endwhile; endif; ?>

        </div>
      <?php } ?>


      <?php endwhile; endif; ?>

    </div>

  </div>

  <?php endwhile; endif; ?>

</section>