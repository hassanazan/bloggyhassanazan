<?php
function azan_custom_theme_assets() {
    // Enqueue Open Sans font from Google Fonts
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap');
}
add_action('wp_enqueue_scripts', 'azan_custom_theme_assets');

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' ); // Add support for the title tag
}

function azan_theme_customizer_settings($wp_customize) {
    // Add a setting for the sidebar image
    $wp_customize->add_setting('sidebar_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add a setting for the button text
    $wp_customize->add_setting('sidebar_button_text', array(
        'default' => esc_html__('Hire Me', 'bloggyhassanazan'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add a setting for the button link
    $wp_customize->add_setting('sidebar_button_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add settings for social media links
    $social_media_links = array(
        'twitter_link' => esc_html__('Twitter Link', 'bloggyhassanazan'),
        'facebook_link' => esc_html__('Facebook Link', 'bloggyhassanazan'),
        'linkedin_link' => esc_html__('LinkedIn Link', 'bloggyhassanazan'),
        'instagram_link' => esc_html__('Instagram Link', 'bloggyhassanazan'),
    );

    foreach ($social_media_links as $key => $label) {
        $wp_customize->add_setting($key, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
    }

    // Add control for uploading sidebar image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'sidebar_image_control', array(
        'label' => esc_html__('Sidebar Image', 'bloggyhassanazan'),
        'section' => 'title_tagline', // Change this section to wherever you want the control to appear
        'settings' => 'sidebar_image',
    )));

    // Add control for button text
    $wp_customize->add_control('sidebar_button_text_control', array(
        'label' => esc_html__('Button Text', 'bloggyhassanazan'),
        'section' => 'title_tagline', // Change this section to wherever you want the control to appear
        'settings' => 'sidebar_button_text',
        'type' => 'text',
    ));

    // Add control for button link
    $wp_customize->add_control('sidebar_button_link_control', array(
        'label' => esc_html__('Button Link', 'bloggyhassanazan'),
        'section' => 'title_tagline', // Change this section to wherever you want the control to appear
        'settings' => 'sidebar_button_link',
        'type' => 'url',
    ));

    // Add controls for social media links
    foreach ($social_media_links as $key => $label) {
        $wp_customize->add_control($key . '_control', array(
            'label' => $label,
            'section' => 'title_tagline', // Change this section to wherever you want the control to appear
            'settings' => $key,
            'type' => 'url',
        ));
    }
}

add_action('customize_register', 'azan_theme_customizer_settings');


function azan_theme_register_menus() {
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'bloggyhassanazan'),
            // You can add more menu locations here if needed
        )
    );
}
add_action('after_setup_theme', 'azan_theme_register_menus');

// Display the primary menu
if (has_nav_menu('primary_menu')) {
    wp_nav_menu(
        array(
            'theme_location' => 'primary_menu',
            'menu_class' => 'your-menu-class', // Add your custom menu class here
            // You can add more parameters as needed
        )
    );
}

class azan_WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start Level
    public function start_lvl(&$output, $depth = 0, $args = null) {
        if ($depth == 0) {
            // $output .= '<div class="dropdown-menu">';
        } elseif ($depth == 1) {
            // $output .= '<div class="dropdown-menu">';
        }
    }

    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $is_active = in_array('current-menu-item', $classes) || in_array('current-page-item', $classes);
        $class_names = $is_active ? 'nav-item nav-link active' : 'nav-item nav-link';
        $childclass= ($depth == 1 ?  "dropdown-item" : $class_names);
        if (in_array('menu-item-has-children', $classes)) {
            // Check if the item has children and set appropriate link attributes
            $output .= '<div class="nav-item dropdown">';
            $output .= '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">' . esc_html($item->title) . '</a>';
            $output .= '<div class="dropdown-menu">';
        } else {
            $output .= '<a href="' . esc_url($item->url) . '" class=" '.$childclass.'">' . esc_html($item->title) . '</a>';
        }
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if (in_array('menu-item-has-children', $classes)) {
            $output .= '</div>'; // Close the dropdown-menu div
            $output .= '</div>'; // Close the dropdown div
        }
    }
}

function azan_theme_customizer_register($wp_customize) {
    // Add a section for Theme Options
    $wp_customize->add_section('theme_options', array(
        'title'    => esc_html__('Theme Settings', 'bloggyhassanazan'),
        'priority' => 120,
    ));

    // Add setting for Address
    $wp_customize->add_setting('contact_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for Address
    $wp_customize->add_control('contact_address', array(
        'label'    => esc_html__('Contact Address', 'bloggyhassanazan'),
        'section'  => 'theme_options',
        'type'     => 'text',
    ));

    // Add setting for Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for Phone
    $wp_customize->add_control('contact_phone', array(
        'label'    => esc_html__('Contact Phone', 'bloggyhassanazan'),
        'section'  => 'theme_options',
        'type'     => 'text',
    ));

    // Add setting for Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    // Add control for Email
    $wp_customize->add_control('contact_email', array(
        'label'    => esc_html__('Contact Email', 'bloggyhassanazan'),
        'section'  => 'theme_options',
        'type'     => 'email',
    ));

    // Add a setting for a custom logo
    $wp_customize->add_setting('custom_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    // Add a control for the custom logo setting
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
        'label'    => esc_html__('Custom Logo', 'bloggyhassanazan'),
        'section'  => 'theme_options',
        'settings' => 'custom_logo',
    )));
    // Add more settings and controls as needed    
}

// Add meta box to post editor
function azan_add_featured_meta_box() {
    add_meta_box(
        'featured-meta-box', // Meta box ID
        esc_html__('Featured Post', 'bloggyhassanazan'), // Title
        'render_featured_meta_box', // Callback function to render the meta box
        'post', // Post type where the meta box should appear
        'side', // Context (normal, advanced, side)
        'default' // Priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'azan_add_featured_meta_box');

// Callback function to render the meta box
function render_featured_meta_box($post) {
    // Retrieve existing meta value if it exists
    $is_featured = get_post_meta($post->ID, '_is_featured', true);

    // Display checkbox
    echo '<label><input type="checkbox" name="is_featured" value="1" ' . checked($is_featured, '1', false) . '> ' . esc_html__("Mark as featured", "bloggyhassanazan") . '</label>';


}

// Save meta box data
function azan_save_featured_meta_box($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['is_featured'])) {
        update_post_meta($post_id, '_is_featured', '1');
    } else {
        delete_post_meta($post_id, '_is_featured');
    }
}
add_action('save_post', 'azan_save_featured_meta_box');

function my_theme_setup() {
    // Add support for automatic feed links
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

// Add custom text below the featured image in the post editor
function azan_custom_featured_image_text($content, $post_id) {
    // Check if we're on the post editor screen
    if (get_current_screen()->id === 'post') {
        $content .= '<p>post size (5:3)</p>';
    }
    return $content;
}
add_filter('admin_post_thumbnail_html', 'azan_custom_featured_image_text', 10, 2);

add_theme_support( 'wp-block-styles' );
function azan_custom_theme_block_styles() {
    // Register custom block styles
    register_block_style(
        'core/button', // Block name
        array(
            'name'         => 'custom-button-style', // Style name
            'label'        => __( 'Custom Button', 'bloggyhassanazan' ), // Style label
            'inline_style' => '.wp-block-button__link { background-color: #ff0000; color: #ffffff; }', // Custom CSS
        )
    );
}
add_action( 'init', 'azan_custom_theme_block_styles' );

add_theme_support( 'block-patterns' );
function azan_custom_theme_block_patterns() {
    // Register custom block patterns
    register_block_pattern(
        'custom-pattern', // Pattern name
        array(
            'title'       => __( 'Custom Pattern', 'bloggyhassanazan' ), // Pattern title
            'description' => __( 'This is a custom block pattern.', 'bloggyhassanazan' ), // Pattern description
            'content'     => '<!-- Your block pattern content here -->', // Pattern content
        )
    );
}
add_action( 'init', 'azan_custom_theme_block_patterns' );

// Add support for responsive embeds
add_theme_support( 'responsive-embeds' );

// Add support for HTML5 markup elements
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Add support for custom logo
add_theme_support( 'custom-logo' );

// Add support for custom header
add_theme_support( 'custom-header' );

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for wide alignments
add_theme_support( 'align-wide' );

// Add editor styles
add_editor_style();

add_theme_support( 'title-tag' );
?>