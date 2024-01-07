<?php get_header(); ?>
<main class="container-fluid py-5">
    <div class="container pt-5 pb-3">
	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'partials/content', 'page' );
			get_the_tags();
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'qwery' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'qwery' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>
</main>
	
<?php
get_footer();
