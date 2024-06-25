<?php
/*
 * Template Name: Contact Page Template
 */

 get_header(); ?>
<div class="container py-5 px-2 bg-primary">
    <div class="row py-5 px-4">
        <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
            <h1 class="text-white text-uppercase font-weight-bold"><?php esc_html_e('Contact Me', 'bloggyhassanazan'); ?></h1>
        </div>
        <div class="col-md-6 text-center text-md-right">
            <div class="d-inline-flex pt-2">
                <h4 class="m-0 text-white"><a class="text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'bloggyhassanazan'); ?></a></h4>
                <h4 class="m-0 text-white px-2">/</h4>
                <h4 class="m-0 text-white"><?php esc_html_e('Contact Me', 'bloggyhassanazan'); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white pt-5">
    <div class="row px-3 pb-2">
        <div class="col-sm-4 text-center mb-3">
            <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
            <h4 class="font-weight-bold"><?php esc_html_e('Address', 'bloggyhassanazan'); ?></h4>
            <p><?php echo esc_html(get_theme_mod('contact_address', '620 g block, lahore, pakistan')); ?></p>
        </div>
        <div class="col-sm-4 text-center mb-3">
            <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
            <h4 class="font-weight-bold"><?php esc_html_e('Phone', 'bloggyhassanazan'); ?></h4>
            <p><?php echo esc_html(get_theme_mod('contact_phone', '03164984429')); ?></p>
        </div>
        <div class="col-sm-4 text-center mb-3">
            <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
            <h4 class="font-weight-bold"><?php esc_html_e('Email', 'bloggyhassanazan'); ?></h4>
            <p><?php echo esc_html(get_theme_mod('contact_email', 'hassanazan99999@gmail.com')); ?></p>
        </div>
    </div>
</div>

<div class="col-md-12 pb-5">
    <div class="contact-form">
        <div id="success"></div>
        <form name="sentMessage" id="contactForm" method="post" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" novalidate="novalidate">
            <div class="control-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="<?php esc_attr_e('Your Name', 'bloggyhassanazan'); ?>" required="required" data-validation-required-message="<?php esc_attr_e('Please enter your name', 'bloggyhassanazan'); ?>">
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="<?php esc_attr_e('Your Email', 'bloggyhassanazan'); ?>" required="required" data-validation-required-message="<?php esc_attr_e('Please enter your email', 'bloggyhassanazan'); ?>">
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="<?php esc_attr_e('Subject', 'bloggyhassanazan'); ?>" required="required" data-validation-required-message="<?php esc_attr_e('Please enter a subject', 'bloggyhassanazan'); ?>">
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <textarea class="form-control" rows="8" id="message" name="message" placeholder="<?php esc_attr_e('Message', 'bloggyhassanazan'); ?>" required="required" data-validation-required-message="<?php esc_attr_e('Please enter your message', 'bloggyhassanazan'); ?>"></textarea>
                <p class="help-block text-danger"></p>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" id="sendMessageButton"><?php esc_html_e('Send Message', 'bloggyhassanazan'); ?></button>
            </div>
        </form>
    </div>
</div>


<?php get_footer(); ?>