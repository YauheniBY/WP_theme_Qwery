<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package qwery
 */


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php global $qwery_options; ?>
  <!-- Topbar Start -->
  <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
				<?php if($qwery_options['phone']){ ?>
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i> <?php echo esc_url($qwery_options['phone']); ?> </a>
                    <span class="text-body">|</span>
					<?php } ?>
					<?php if($qwery_options['email']) { ?>
                    <a class="text-body px-3" href="mailto:<?php echo esc_url($qwery_options['email']); ?>"><i class="fa fa-envelope mr-2"></i><?php echo esc_url($qwery_options['email']); ?></a>
					<?php } ?>
				</div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
				<?php if($qwery_options['facebook']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_url($qwery_options['facebook'])?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
					<?php } ?>
					<?php if($qwery_options['twitter']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_url($qwery_options['twitter'])?>">
                        <i class="fab fa-twitter"></i>
                    </a>
					<?php } ?>
					<?php if($qwery_options['ld']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_url($qwery_options['ld'])?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
					<?php } ?>
					<?php if($qwery_options['instagram']){ ?>
                    <a class="text-body px-3" href="<?php echo esc_url($qwery_options['instagram'])?>">
                        <i class="fab fa-instagram"></i>
                    </a>
					<?php } ?>
					<?php if($qwery_options['youtube']){ ?>
                    <a class="text-body pl-3" href="<?php echo esc_url($qwery_options['youtube'])?>">
                        <i class="fab fa-youtube"></i>
                    </a>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1"><?php echo esc_html(bloginfo('name')); ?></h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <?php  wp_nav_menu(
                        array(
                            'theme_location' => 'header_nav',
							'menu_class' => 'navbar-nav ml-auto py-0',
                            'container' => false,
							'add_li_class' => 'nav-item nav-link',
                        )
                        );
                    ?>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

	<?php if(!is_front_page()){ 
		$bg_image = '';
		if (get_the_post_thumbnail_url(get_the_ID(), 'full') and is_singular()){
			$bg_image = 'style = "background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url(' . get_the_post_thumbnail_url(get_the_id(), 'full') . '); background-attachment: fixed;" ';

		} else if ($qwery_options['bg_header_img']['url']){
			$bg_image = 'style = "background: linear-gradient(rgba(28, 30, 50, .9), rgba(28, 30, 50, .9)), url(' . $qwery_options['bg_header_img']['url'] . '); background-attachment: fixed;" ';
		}
	?>
		<div class="container-fluid page-header" <?php echo esc_html($bg_image); ?> >
        <h1 class="display-3 text-uppercase text-white mb-3">
            <?php 
            if(is_date()){
                the_archive_title('','');

            } else if (is_search()){
                printf( esc_html__( 'Search Results for: %s', 'qwery' ), '<span>' . get_search_query() . '</span>' );
					
            } else {
                echo wp_title('');
            }
        ?></h1>
    </div>			
	<?php } ?>

	<?php 
	global $qwery_options;
	