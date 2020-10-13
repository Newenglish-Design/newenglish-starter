<?php 
/**
 *  Theme setup
 *  @action after_setup_theme
 *  @return void
 */

function newenglish_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'newenglish' ),
    ) );
    // Disable Custom Colors
    add_theme_support( 'disable-custom-colors' );       
    // Editor Color Palette
    add_theme_support( 'editor-color-palette', array(
        array( 'name'  => __( 'White', 'newenglish' ),'slug'  => 'white', 'color'	=> '#FFFFFF',),
        array( 'name'  => __( 'Black', 'newenglish' ),'slug'  => 'black', 'color'	=> '#000000',),
        array( 'name'  => __( 'Teal', 'newenglish' ),'slug'  => 'teal', 'color'	=> '#19485a',),
        array( 'name'  => __( 'Light Teal', 'newenglish' ),'slug'  => 'lightteal', 'color'	=> '#14738b',),
        array( 'name'  => __( 'Off-White', 'newenglish' ),'slug'  => 'offwhite', 'color'	=> '#F6F7F8',),
        array( 'name'  => __( 'Grey', 'newenglish' ),'slug'  => 'grey', 'color'	=> '#a1b0b6',),
    ) );
    add_theme_support( 'editor-font-sizes', array(
        array( 'name' => 'Small', 'size' => 12, 'slug' => 'small'),
        array( 'name' => 'Regular', 'size' => 16, 'slug' => 'regular'),
        array( 'name' => 'Large', 'size' => 24, 'slug' => 'large'),
        array( 'name' => 'Very large', 'size' => 36, 'slug' => 'verylarge'),
    ) );
}

add_action( 'after_setup_theme', 'newenglish_setup' );

/**
 * Enqueue scripts and styles.
 *  @action wp_enqueue_scripts
 *  @return void
 */

function newenglish_scripts() {
    wp_enqueue_style( 'newenglish-style', get_template_directory_uri() . '/dist/assets.css');
    wp_enqueue_script( 'newenglish-script', get_template_directory_uri() . '/dist/assets.js', array(), '1.0', true );
    wp_enqueue_script('jquery'); // we need to do this for Gravity Forms sadly...
}

add_action( 'wp_enqueue_scripts', 'newenglish_scripts', 999 );

/**
 * Customise the login logo
 * 
 */

function newenglish_login_logo() { ?>
    <style type="text/css">
        body.login { background-color: #19485a; }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/humphris_logo.svg);
            height:65px;
            width:320px;
            background-size: contain;
            background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        body.login #backtoblog a, body.login #nav a {
            text-decoration: none;
            color: #FFFFFF;
        }
        body.login form {
            background: #14738b;
            color: #FFFFFF;
            border: none;
            border-radius: 10px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'newenglish_login_logo' );

/**
 * Clean up
 */
require get_template_directory() . '/inc/clean-up.php';

/**
 * Gutenburg blocks
 */
// require get_template_directory() . '/blocks/blocks.php';

/**
 * Include Custom Post Types
 */
// require get_template_directory() . '/inc/cpt.php';

/**
 * Add ACF Options page
 * 
 */

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Error_log function
 * 
 */

if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}