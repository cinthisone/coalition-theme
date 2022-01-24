<?php 
	/*
	Template Name: Homepage
	*/

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php

			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '</p><p id=“breadcrumbs”>','</p><p>' );
			}
			?>

		<?php
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );
			the_content();

			

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();