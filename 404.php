<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Starter
 */

get_header(); ?>

<section class="bg-black text-white">
	<div class="container mx-auto max-w-xl px-8 flex">
		<div class="w-full text-center h-screen flex flex-wrap items-center justify-center">
			<div class="content">
				<h1 class="text-teal mb-2"><strong>Whoops! 404 Error</strong></h1>
				<h2 class="mb-3">We're sorry, we couldn't find the page that you were looking for.</h2>
				<p>Please return to our <a href="/">home page</a></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
