<div id="primary-footer" class="footer-widget bg-white">
    <?php dynamic_sidebar( 'primary-footer' ); ?>
</div>
<!-- Footer Start -->
<div class="container py-4 bg-secondary text-center">
    <p class="m-0 text-white">
        &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> <?php esc_html_e( 'All Rights Reserved. Developed by', 'bloggyhassanazan' ); ?> <a class="text-white font-weight-bold" href="https://github.com/hassanazan"><?php esc_html_e( 'Hassan Azan', 'bloggyhassanazan' ); ?></a>
    </p>
</div>
<!-- Footer End -->
</div><!-- content -->
</div><!-- wrapper -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>