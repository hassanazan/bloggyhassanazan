<?php
$sidebar_image_url = get_theme_mod('sidebar_image');

// Get sidebar button text
$sidebar_button_text = get_theme_mod('sidebar_button_text', __('Hire Me', 'bloggyhassanazan'));

// Get sidebar button link
$sidebar_button_link = get_theme_mod('sidebar_button_link', '#');

$twitter_link = get_theme_mod('twitter_link', 'https://twitter.com/example');
$facebook_link = get_theme_mod('facebook_link', 'https://facebook.com/example');
$linkedin_link = get_theme_mod('linkedin_link', 'https://linkedin.com/example');
$instagram_link = get_theme_mod('instagram_link', 'https://instagram.com/example');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="skip-link">
        <a href="#main-content" class="screen-reader-text"><?php esc_html_e( 'Skip to main content', 'bloggyhassanazan' ); ?></a>
    </div>
<?php wp_body_open(); ?>
<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
            <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="<?php echo esc_url($sidebar_image_url); ?>" alt="<?php echo esc_attr__('Image', 'bloggyhassanazan'); ?>">
            <h1 class="font-weight-bold">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php echo esc_html(get_bloginfo('name')); ?>
    </a>
</h1>
            <p class="mb-4"><?php echo esc_html(get_bloginfo('description')); ?></p>
            <div class="d-flex justify-content-center mb-5">
                <a class="btn btn-outline-primary mr-2" href="<?php echo esc_url($twitter_link); ?>"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary mr-2" href="<?php echo esc_url($facebook_link); ?>"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary mr-2" href="<?php echo esc_url($linkedin_link); ?>"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary mr-2" href="<?php echo esc_url($instagram_link); ?>"><i class="fab fa-instagram"></i></a>
            </div>
            <a href="<?php echo esc_url($sidebar_button_link); ?>" class="btn btn-lg btn-block btn-primary mt-auto"><?php echo esc_html($sidebar_button_text); ?></a>
        </div>
        <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
            <i class="fas fa-2x fa-angle-double-right text-primary"></i>
        </div>
    </div>
    <div class="content">
        <!-- Navbar Start -->
<div class="container p-0">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand d-block d-lg-none"><?php echo esc_html(get_bloginfo('name')); ?></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav m-auto">
                <?php
                // Check if the menu exists and has items
                if (has_nav_menu('primary_menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary_menu',
                        'container' => '',
                        'menu_class' => 'navbar-nav m-auto',
                        'items_wrap' => '%3$s',
                        'fallback_cb' => false, // Disable fallback menu
                        'walker' => new azan_WPDocs_Walker_Nav_Menu(),
                    ));
                }
                ?>
            </div>
            
            <!-- Search Input -->
<form class="form-inline my-2 my-lg-0" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="s">
        <div class="input-group-prepend">
            <button class="input-group-text"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>
<!-- End Search Input -->
        </div>
    </nav>
</div>
<!-- Navbar End -->
