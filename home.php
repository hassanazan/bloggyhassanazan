<?php get_header(); ?>
<?php
$default_image_url = get_template_directory_uri() . '/img/no-image.png';
// Set the query parameters
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$query_args = array(
    'post_type'      => 'post',
    'paged'          => $paged,
    'meta_query'     => array(
        array(
            'key'     => '_is_featured', // Custom field key for featured posts
            'value'   => '1', // Value to indicate a featured post
            'compare' => '=', // Compare for equality
            'type'    => 'NUMERIC' // Ensure numeric comparison
        )
    )
);

// Check if it's the first page
$is_first_page = ($paged == 1);

// If it's the first page, fetch featured posts and display carousel
if ($is_first_page) {
    $query = new WP_Query($query_args);

    // Check if there are any featured posts
    if ($query->have_posts()) :
?>
        <!-- Carousel Start -->
        <div class="container p-0">
            <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $active = 'active'; // Variable to handle the 'active' class for the first item

                    while ($query->have_posts()) : $query->the_post();
                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

                        // Use default image if featured image is empty
                        $image_url = !empty($featured_image) ? $featured_image : $default_image_url;
                    ?>
                        <div class="carousel-item <?php echo $active; ?>">
                            <img class="w-100" style="height: 400px; object-fit: cover;" src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <h2 class="mb-3 text-white font-weight-bold"><?php the_title(); ?></h2>
                                <div class="d-flex text-white">
                                    <small class="mr-2"><i class="fa fa-calendar-alt"></i> <?php echo get_the_date('d-M-Y'); ?></small>
                                    <small class="mr-2" style="color: white;"><i class="fa fa-folder"></i> <?php the_category(', '); ?></small>
                                    <small class="mr-2"><i class="fa fa-comments"></i> <?php comments_number(); ?></small>
                                </div>
                                <a href="<?php echo esc_url( the_permalink() ); ?>" class="btn btn-lg btn-outline-light mt-4"><?php esc_html_e( 'Read More', 'bloggyhassanazan' ); ?></a>

                            </div>
                        </div>
                    <?php
                        $active = ''; // Remove 'active' class after the first item
                    endwhile;
                    ?>
                </div>
                <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <!-- Carousel End -->
<?php
    else :
        echo '<p>No featured posts found.</p>';
    endif;

    // Reset post data
    wp_reset_postdata();
}

// Fetch regular posts for the current page
$query = new WP_Query($query_args);

// Display regular posts
?>
<!-- Blog List Start -->
<div class="container bg-white pt-5">
    <?php
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>
            <div class="row blog-item px-3 pb-5">
                <div class="col-md-5">
                    <?php
                    $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    // Use default image if post thumbnail is empty
                    $thumbnail_url = !empty($post_thumbnail_url) ? $post_thumbnail_url : $default_image_url;
                    ?>
                    <div class="blog-image-wrapper" style="max-width: 273px; max-height: 241px; overflow: hidden;">
                        <img class="img-fluid" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-md-7">
                    <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold"><?php the_title(); ?></h3>
                    <div class="d-flex mb-3">
                        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo get_the_date('d-M-Y'); ?></small>
                        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> <?php the_category(', '); ?></small>
                        <small class="mr-2 text-muted"><i class="fa fa-comments"></i> <?php comments_number(); ?></small>
                    </div>
                    <p>
                        <?php the_excerpt(); ?>
                    </p>
                    <a class="btn btn-link p-0" href="<?php echo esc_url( the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'bloggyhassanazan' ); ?> <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<div class="pagination">
    <?php
    echo paginate_links(array(
        'total'   => $query->max_num_pages,
        'current' => max(1, $paged),
        'prev_text' => '&laquo; Previous',
        'next_text' => 'Next &raquo;',
    ));
    ?>
</div>
<!-- Blog List End -->
<div class="comments-pagination">
    <?php
    // Check if comment pagination is needed
    $paginate_comments_args = array(
        'prev_text' => '&laquo; ' . esc_html__('Previous', 'bloggyhassanazan'),
        'next_text' => esc_html__('Next', 'bloggyhassanazan') . ' &raquo;',
    );

    paginate_comments_links($paginate_comments_args);
    ?>
</div>


<?php get_footer(); ?>