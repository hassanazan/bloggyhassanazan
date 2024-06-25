<?php get_header(); ?>
<main id="main-content">
    <!-- Your loop or main content goes here -->

<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-sm-6 text-center text-md-left">
            <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold"><?php esc_html_e('Blog Detail', 'bloggyhassanazan'); ?></h1>
        </div>
        <div class="col-sm-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e('Home', 'bloggyhassanazan'); ?></a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white"><?php esc_html_e('Blog Detail', 'bloggyhassanazan'); ?></h4>
            </div>
        </div>
    </div>
</div>

<?php
// Start the loop
while (have_posts()) : the_post();
?>
    <div class="container py-5 px-2 bg-white">
        <div class="row px-4">
            <div class="col-12">
                <img class="img-fluid mb-4" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <h2 class="mb-3 font-weight-bold"><?php the_title(); ?></h2>
                <div class="d-flex">
                    <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo esc_html(get_the_date('d-M-Y')); ?></p>
                    <p class="mr-3 text-muted"><i class="fa fa-folder"></i> <?php the_category(', '); ?></p>
                    <p class="mr-3 text-muted"><i class="fa fa-comments"></i> <?php comments_number(); ?> <?php esc_html_e('Comments', 'bloggyhassanazan'); ?></p>
                </div>
                <?php the_content(); ?>

                <!-- Custom HTML Starts -->
 <h2 class="mb-3 font-weight-bold"><?php the_title(); ?></h2>
                <img class="w-50 float-left mr-4 mb-3" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="Featured Image">
                <?php the_content(); ?>
                <!-- Custom HTML Ends -->

                <?php
                // Display post tags
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="mb-3">';
                    echo '<span class="font-weight-bold mr-2">' . esc_html__('Tags:', 'bloggyhassanazan') . '</span>';
                    foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag->term_id);
                        echo '<a href="' . esc_url($tag_link) . '" class="badge badge-secondary mr-2">' . esc_html($tag->name) . '</a>';
                    }
                    echo '</div>';
                }
                ?>

            </div>

            <div class="col-12 py-4">
                <?php
                // Check if there are previous or next posts
                $prev_post = get_previous_post();
                $next_post = get_next_post();

                if ($prev_post || $next_post) {
                    echo '<div class="btn-group btn-group-lg w-100">';

                    // Previous post button
                    if ($prev_post) {
                        echo '<a href="' . esc_url(get_permalink($prev_post->ID)) . '" class="btn btn-outline-primary"><i class="fa fa-angle-left mr-2"></i> ' . esc_html__('Previous', 'bloggyhassanazan') . '</a>';
                    }

                    // Next post button
                    if ($next_post) {
                        echo '<a href="' . esc_url(get_permalink($next_post->ID)) . '" class="btn btn-outline-primary">' . esc_html__('Next', 'bloggyhassanazan') . ' <i class="fa fa-angle-right ml-2"></i></a>';
                    }

                    echo '</div>';
                }
                ?>
            </div>

            <?php
            // Check if comments are open or we have at least one comment.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            
        </div>
    </div>
<?php
endwhile;
?>
</main>
<?php get_footer();
?>
