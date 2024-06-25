<main id="main-content">
    <!-- Your loop or main content goes here -->

<?php
$args = array(
    'post_type'      => 'post',
    'meta_key'       => '_is_featured', // Meta key for featured posts
    'meta_value'     => 'on', // Meta value set for featured posts
    'posts_per_page' => 5, // Number of featured posts to display
);

$featured_query = new WP_Query( $args );

if ( $featured_query->have_posts() ) :
    while ( $featured_query->have_posts() ) : $featured_query->the_post();
        // Output featured post content here
        ?>
        <div>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    // If no featured posts found
    ?>
    <?php esc_html_e( 'No featured posts found.', 'bloggyhassanazan' ); ?>

    <?php
endif;
?>
 <!-- Blog List Start -->
 <div class="container bg-white pt-5">
<?php
    $blog_posts = array(
        array(
            'img'           => get_template_directory_uri() . '/img/blog-1.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
        array(
            'img'           => get_template_directory_uri() . '/img/blog-2.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
        array(
            'img'           => get_template_directory_uri() . '/img/blog-3.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
        array(
            'img'           => get_template_directory_uri() . '/img/blog-4.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
        array(
            'img'           => get_template_directory_uri() . '/img/blog-5.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
        array(
            'img'           => get_template_directory_uri() . '/img/blog-6.jpg',
            'title'         => 'Lorem ipsum dolor sit amet',
            'date'          => '01-Jan-2045',
            'category'      => 'Web Design',
            'comments'      => '15 Comments',
            'excerpt'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero',
        ),
    );

    foreach ( $blog_posts as $post ) :
?>
    <div class="row blog-item px-3 pb-5" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-5">
            <img class="img-fluid mb-4 mb-md-0" src="<?php echo esc_url( $post['img'] ); ?>" alt="Image">
        </div>
        <div class="col-md-7">
            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold"><?php echo esc_html( $post['title'] ); ?></h3>
            <div class="d-flex mb-3">
                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo esc_html( $post['date'] ); ?></small>
                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> <?php echo esc_html( $post['category'] ); ?></small>
                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> <?php echo esc_html( $post['comments'] ); ?></small>
            </div>
            <p><?php echo esc_html( $post['excerpt'] ); ?></p>
            <a class="btn btn-link p-0" href=""><?php esc_html_e( 'Read More', 'bloggyhassanazan' ); ?> <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
<?php endforeach; ?>
</div>
<!-- Blog List End -->
<!-- Subscribe Start -->
<div class="container py-5 px-4 bg-secondary text-center">
    <h1 class="text-white font-weight-bold"><?php esc_html_e( 'Subscribe My Newsletter', 'bloggyhassanazan' ); ?></h1>
    <p class="text-white"><?php esc_html_e( 'Subscribe and get my latest article in your inbox', 'bloggyhassanazan' ); ?></p>
    <form class="form-inline justify-content-center">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="<?php esc_attr_e( 'Your Email', 'bloggyhassanazan' ); ?>">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit"><?php esc_html_e( 'Subscribe', 'bloggyhassanazan' ); ?></button>
            </div>
        </div>
    </form>
</div>
<!-- Subscribe End -->
</main>