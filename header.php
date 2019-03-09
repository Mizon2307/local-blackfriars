<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<link rel="shortcut icon" href="<?php bloginfo("template_directory"); ?>/assets/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo("template_directory"); ?>/assets/img/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/img/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/img/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/img/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php bloginfo("template_directory"); ?>/assets/img/android-chrome-192x192.png" sizes="192x192">
	<meta name="msapplication-square70x70logo" content="<?php bloginfo("template_directory"); ?>/assets/img/smalltile.png" />
	<meta name="msapplication-square150x150logo" content="<?php bloginfo("template_directory"); ?>/assets/img/mediumtile.png" />
	<meta name="msapplication-wide310x150logo" content="<?php bloginfo("template_directory"); ?>/assets/img/widetile.png" />
	<meta name="msapplication-square310x310logo" content="<?php bloginfo("template_directory"); ?>/assets/img/largetile.png" />

	<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/slick.css"/>

	<?php wp_head(); ?>
</head>

<body class="font-sans">

	<header class="fixed bg-brown w-full z-20 flex items-center justify-between px-6 sm:px-8 pt-4 pb-3 lg:py-5">

			<a href="/" class="hidden md:inline-block z-20"><img src="<?php the_field('site_logo', 'option'); ?>" class="w-52"></a>

			<a href="/" class="inline-block md:hidden z-20"><img src="<?php the_field('mobile_logo', 'option'); ?>" class="w-20"></a>



		<?php
			  $parts = get_field('blocks');
			  if(!empty($parts)) {
			    $sections = [];
			      foreach($parts as $section) {
			        if(!empty($section['add_to_nav'])) {
			          array_push($sections, $section['nav_label']);
			        }
			      } //end foreach $parts
			?>


				<ul class="menu bg-brown m-0 pt-20 pb-8 px-6 text-center lg:p-0 absolute w-full lg:inline-block lg:relative lg:w-auto">

					<?php foreach($sections as $section) { ?>
			       <li class="list-reset item block lg:inline-block lg:mx-6 xl:mx-10 pb-5 lg:pb-0"><a href="#section-<?php echo str_replace( ' ', '', $section); ?>" class="text-white hover:text-grey font-bold lg:text-bs lg:no-underline"><?= $section; ?></a></li>
	      	<?php } //end foreach $sections ?>

					<li class="list-reset item block lg:hidden lg:mx-6 xl:mx-10"><a href="<?php the_field('btn_link', 'option'); ?>" class="text-white hover:text-grey font-bold block"><?php the_field('btn_txt', 'option');?></a></li>

				</ul>

			<?php } //endif !empty $parts ?>

		<a href="<?php the_field('btn_link', 'option'); ?>" class="hidden lg:inline-block text-brown bg-white hover:bg-grey-lighter hover:text-brown no-underline text-bs pt-3 pb-2.5 px-5 font-bold rounded-lg"><?php the_field('btn_txt', 'option');?></a>

		<div id="hamburger" class="lg:hidden cursor-pointer z-20 relative">
			<span class="absolute block w-full bg-white bar"></span>
			<span class="absolute block w-full bg-white bar"></span>
			<span class="absolute block w-full bg-white bar"></span>
		</div>

	</header>
