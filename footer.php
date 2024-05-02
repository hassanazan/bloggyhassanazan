<!-- Footer Start -->
<div class="container py-4 bg-secondary text-center">
    <p class="m-0 text-white">
        &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?> <?php esc_html_e( 'All Rights Reserved. Developed by', 'bloggyhassanazan' ); ?> <a class="text-white font-weight-bold" href="https://github.com/hassanazan"><?php esc_html_e( 'Hassan Azan', 'bloggyhassanazan' ); ?></a>
    </p>
</div>
<!-- Footer End -->
</div>
</div>

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/lib/easing/easing.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/lib/waypoints/waypoints.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/jqBootstrapValidation.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>