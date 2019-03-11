<?php
 $bg = get_sub_field('background_colour');
 $img = get_sub_field('image');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="pano bg-<?php echo $bg; ?>">

  <div class="container mx-auto flex md:px-8 md:pt-24">
    <div class="w-full">
      <img src="<?php echo $img; ?>">
    </div>
  </div>

</section>
