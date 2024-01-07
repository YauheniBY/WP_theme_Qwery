<?php get_header(); 
// Template name: Full width Template
    while ( have_posts() ) :
			the_post();

	echo '<main>'. the_content() .'</main>';

		// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; 
get_footer();
