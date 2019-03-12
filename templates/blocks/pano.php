<?php
 $bg = get_sub_field('background_colour');
 $vr = get_sub_field('vr_image');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="pano bg-<?php echo $bg; ?>">

  <div class="container mx-auto flex lg:px-8 sm:pt-24">
    <div class="w-full relative flex flex-wrap items-center justify-center">

      <img src="<?php bloginfo("template_directory"); ?>/assets/img/twirl-icon.svg" class="absolute w-24">
      <?php echo $vr; ?>

    </div>
  </div>

</section>
