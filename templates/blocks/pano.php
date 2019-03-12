<?php
 $bg = get_sub_field('background_colour');
 $img = get_sub_field('image');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="pano bg-<?php echo $bg; ?>">

  <div class="container mx-auto flex md:px-8 md:pt-24">
    <div class="w-full">

      <div class="panoramic-container">

        <div class="twirl-icon"></div>

        <div class="pano-select">
          <a href="#" class="pano" data-pano="<?php bloginfo("template_directory"); ?>/assets/img/BLACKFRIARS_PANO_COURTYARD.jpg"></a>
        </div>

        <div id="vrview"></div>

      </div>

    </div>
  </div>

</section>
