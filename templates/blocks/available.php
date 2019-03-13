<?php
 $title = get_sub_field('title');
 $txt = get_sub_field('text');
?>


<section id="section-<?php echo str_replace(' ', '', get_sub_field('nav_label')); ?>" class="available relative bg-black text-white">

  <div class="container mx-auto max-w-md flex flex-wrap px-8 sm:px-4 pt-16 sm:pt-20">
    <h3 class="text-teal text-4xl sm:text-5xl text-left mb-10"><?php echo $title; ?></h3>
    <p class="mb-4"><?php echo $txt; ?></p>

  </div>

</section>


<section class="relative bg-black text-black">

  <div class="tabs relative flex flex-wrap justify-center bottom">

      <?php
        if( have_rows('plans') ): $counter = 0;
        while ( have_rows('plans') ) : the_row();
        $counter++;
        $name = get_sub_field('name');
      ?>

          <input type="radio" name="plans" id="tab-<?php echo $counter;?>">
					<label for="tab-<?php echo $counter;?>" class="btn"><?php echo $name; ?></label>

          <div class="tab panel-<?php echo $counter;?> bg-grey">

            <div class="container mx-auto">

              <div class="tab-slider px-6 py-24"
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
                  <div>
                    <img src="<?php echo $img; ?>" class="plan">
                  </div>
                <?php } ?>


                <?php if(get_sub_field('content_type') == "list") { ?>
                  <div class="flex flex-wrap items-center justify-center">

                    <span class="container mx-auto flex flex-wrap max-w-lg xl:max-w-xl px-4 lg:px-0 h-full list-container">

                      <h3 class="text-black text-4xl sm:text-5xl text-left mb-10 w-full"><?php echo $title; ?></h3>

                      <?php
                        if( have_rows ('lists') ):
                        while ( have_rows ('lists') ) : the_row();
                      ?>

                      <ul class="p-0 w-full md:mb-3 md:w-1/2 xl:w-1/3 lists">

                        <?php
                          if( have_rows ('items') ):
                          while ( have_rows ('items') ) : the_row();
                          $icon = get_sub_field('icon');
                          $txt = get_sub_field('text');
                        ?>

                          <li class="list-reset mb-3 flex flex-wrap items-center xl:mb-8">
                            <img src="<?php echo $icon; ?>" class="inline-block mr-4 w-6 ">
                            <p class="inline-block text-sm xl:text-base"><?php echo $txt; ?></p>
                          </li>


                        <?php endwhile; endif; ?>

                      </ul>

                      <?php endwhile; endif; ?>

                    </span>

                  </div>
                <?php } ?>


                <?php endwhile; endif; ?>

              </div>
            </div>
            </div>

      <?php endwhile; endif; ?>

  </div>

</section>

  <!-- <ul class="tabs" role="tablist">
    <li>
        <input type="radio" name="tabs" id="tab1" checked />
        <label for="tab1" role="tab" aria-selected="false" aria-controls="panel1" tabindex="0">1 Bed apartment</label>
        <div id="tab-content1" class="tab-content bg-grey" role="tabpanel" aria-labelledby="specification" aria-hidden="true">

        </div>
    </li>

      <li>
          <input type="radio" name="tabs" id="tab2" />
          <label for="tab2" role="tab" aria-selected="false" aria-controls="panel2" tabindex="0">2 Bed apartment</label>
          <div id="tab-content2" class="tab-content bg-grey" role="tabpanel" aria-labelledby="specification" aria-hidden="true">

          </div>
      </li>

  </ul> -->
