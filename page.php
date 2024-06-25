<?php
get_header();
?>
<main id="main-content">
    <!-- Your loop or main content goes here -->

<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-sm-6 text-center text-md-left">
            <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold"><?php single_post_title(); ?></h1>
        </div>
        <div class="col-sm-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Home', 'bloggyhassanazan'); ?></a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white"><?php single_post_title(); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white pt-5">
    <?php
    // Query posts
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6, // Number of posts to display
    );
    $query = new WP_Query($args);

    // Check if there are posts
    if ($query->have_posts()) :
        // Loop through posts
        while ($query->have_posts()) : $query->the_post();
    ?>
            <div class="row blog-item px-3 pb-5">
                <div class="col-md-5">
                    <img class="img-fluid mb-4 mb-md-0" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
                <div class="col-md-7">
                    <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold"><?php the_title(); ?></h3>
                    <div class="d-flex mb-3">
                        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo esc_html(get_the_date('d-M-Y')); ?></small>
                        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> <?php the_category(', '); ?></small>
                        <small class="mr-2 text-muted"><i class="fa fa-comments"></i> <?php echo esc_html(get_comments_number()); ?> <?php esc_html_e('Comments', 'bloggyhassanazan'); ?></small>
                    </div>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                    <a class="btn btn-link p-0" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'bloggyhassanazan'); ?> <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset post data
    else :
        // If no posts are found
        echo '<p>' . esc_html__('No posts found.', 'bloggyhassanazan') . '</p>';
    endif;
    ?>
    
</div>
<div class="page-content">
    
    <?php wp_link_pages(array(
        'before'      => '<div class="pagination">' . __('Pages:', 'bloggyhassanazan'),
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'bloggyhassanazan') . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    )); ?>
</div>
</main>
<?php
get_footer();
?>