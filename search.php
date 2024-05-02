<?php
/**
 * The template for displaying search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Your_Theme_Name
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'bloggyhassanazan'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header><!-- .page-header -->

            <?php
            // Start the loop.
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    // Check if the post has a post thumbnail.
                    if (has_post_thumbnail()) {
                    ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div><!-- .post-thumbnail -->
                    <?php
                    }
                    ?>

                    <header class="entry-header">
                        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->

                    <footer class="entry-footer">
                        <?php if ('post' === get_post_type()) : ?>
                            <div class="entry-meta">
                                <?php
                                echo '<span class="posted-on">' . get_the_date() . '</span>'; // Post date.
                                ?>
                            </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

            <?php
            // End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination(array(
                'prev_text' => esc_html__('Previous', 'bloggyhassanazan'),
                'next_text' => esc_html__('Next', 'bloggyhassanazan'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'bloggyhassanazan') . ' </span>',
            ));

        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_sidebar();
get_footer();
?>
