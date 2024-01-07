<?php get_header();?>

<main class="container-fluid py-5">
    <div class="container pt-5 pb-3">

		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post();
					get_template_part( 'partials/content', get_post_type() ); 
				  endwhile;?>
					<div class="pagination">
						<?php echo paginate_links(); ?>
					</div>
				  <?php else :
			get_template_part( 'partials/content', 'none' );
		endif; ?>
	</div>

	</main><!-- #main -->

<?php 
get_footer();

