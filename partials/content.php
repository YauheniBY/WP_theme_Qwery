<article <?php post_class(); ?> id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>">
	<?php the_content(); ?>
    <a href="<?php the_permalink(); ?>"> Read more </a>
</article>