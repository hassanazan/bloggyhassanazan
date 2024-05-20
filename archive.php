<?php get_header(); ?>
<div class="container bg-white pt-5">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
            <div class="row blog-item px-3 pb-5">
                <div class="col-md-5">
                    <?php
                    $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    $default_image_url = get_template_directory_uri().'/img/no-image.png';
                    // Use default image if post thumbnail is empty
                    $thumbnail_url = !empty($post_thumbnail_url) ? $post_thumbnail_url : $default_image_url;
                    ?>
                    <img class="img-fluid mb-4 mb-md-0" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
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
        // Pagination
        the_posts_pagination(array(
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;',
        ));
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>
<?php get_footer(); ?>