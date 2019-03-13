<?php
 $title = get_sub_field('title');
?>

<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="map bg-white pt-16 pb-4 px-4 md:px-0 md:pb-0">

  <h3 class="text-brown text-center text-4xl sm:text-5xl mb-10"><?php echo $title; ?></h3>

   <?php
     $location = get_sub_field('map');
     if( !empty($location) ):
   ?>
   <div class="acf-map w-full h-2/3">
     <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
   </div>
   <?php endif; ?>

</section>
