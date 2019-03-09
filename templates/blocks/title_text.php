<?php
 $title = get_sub_field('title');
 $title_mob = get_sub_field('title_mobile');
 $txt = get_sub_field('text');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="title-text bg-black text-white py-16 sm:py-20 md:py-24">

  <div class="container mx-auto max-w-xl flex flex-wrap items-center px-8">
    <div class="w-full md:w-1/2">
      <h3 class="text-teal text-5xl sm:text-6xl tracking-wide leading-tight"><?php echo $title; ?></h3>
      <h3 class="text-teal text-4xl sm:text-5xl md:text-6xl tracking-wide leading-tight mb-8 md:hidden"><?php echo $title_mob; ?></h3>
    </div>
    <div class="w-full md:w-1/2 md:px-6">
      <?php echo $txt; ?>
    </div>
  </div>

</section>
