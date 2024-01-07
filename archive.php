<?php get_header();?>
<header>
	<?php 
		the_archive_title('<h1 class="page_title">','</h1>');
		the_archive_description('<div class="page_description">','</div>');
	?>
</header>
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
	</main>

<?php get_footer();
