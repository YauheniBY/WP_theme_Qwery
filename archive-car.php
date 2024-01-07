<?php get_header();?>

<main>

<!-- Rent A Car Start -->
<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
            <div class="row">
			<?php 
             $pages = (get_query_var('paged')) ? get_query_var('paged') : 1;
             $cars  = new WP_Query(array('post_type'=>'car','posts_per_page'=>3,'paged'=>$pages));

                if ( $cars->have_posts() ) :  while ($cars->have_posts() ) : $cars->the_post();
                            
                            get_template_part( 'partials/content', 'car'); 
                        
                        endwhile;?>
                            <div class="pagination">
                                <?php echo paginate_links(); ?>
                            </div>
                        <?php else :
                    get_template_part( 'partials/content', 'none' );
                endif; 
                wp_reset_postdata();
                ?>
                          
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->

		
	</main>

<?php get_footer();