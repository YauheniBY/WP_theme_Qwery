<?php get_header();?>

<main>

		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post();
					get_template_part( 'partials/content', get_post_type() ); 
				  endwhile;?>
					<div class="pagination">
						<?php echo paginate_links(); ?>
					</div>
				  <?php else :
			get_template_part( 'partials/content', 'none' );
		endif; ?>
</main><!-- #main -->

<?php 
get_sidebar();
get_footer();
