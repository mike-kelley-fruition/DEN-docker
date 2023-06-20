<?php
/**
* Fru Base Theme functions and definitions.
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package Fru_Base_Theme
*/

if ( ! function_exists( 'frubase_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function frubase_setup() {
/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on Fru Base Theme, use a find and replace
* to change 'frubase' to the name of your theme in all the template files.
*/
load_theme_textdomain( 'frubase', get_template_directory() . '/languages' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
* Let WordPress manage the document title.
* By adding theme support, we declare that this theme does not use a
* hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'frubase' ),
    ) );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    ) );

    /*
    * Enable support for Post Formats.
    * See https://developer.wordpress.org/themes/functionality/post-formats/
    */
    add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    ) );


    }
    endif;
    add_action( 'after_setup_theme', 'frubase_setup' );

    /**
    * Set the content width in pixels, based on the theme's design and stylesheet.
    *
    * Priority 0 to make it available to lower priority callbacks.
    *
    * @global int $content_width
    */
    function frubase_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'frubase_content_width', 640 );
    }
    add_action( 'after_setup_theme', 'frubase_content_width', 0 );


    /* Remove comments from admin bar*/
    add_action( 'admin_menu', 'pk_remove_admin_menus' );
    function pk_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    }
    

    /* Function to get primary cat from SEO Yoast */
    function get_primary_taxonomy_id( $post_id, $taxonomy ) {
    $prm_term = '';
    if (class_exists('WPSEO_Primary_Term')) {
    $wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post_id );
    $prm_term = $wpseo_primary_term->get_primary_term();
    }
    if ( !is_object($wpseo_primary_term) || empty( $prm_term ) ) {
    $term = wp_get_post_terms( $post_id, $taxonomy );
    if (isset( $term ) && !empty( $term ) ) {
    return $term[0]->term_id;
    } else {
    return '';
    }
    }
    return $wpseo_primary_term->get_primary_term();
    }


add_filter('template_include', [ '\\Roots\\Sage\\Wrapper', 'wrap'], 109);





function get_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array(
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
    );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
        while($related_cats_post->have_posts()): $related_cats_post->the_post();
            echo get_template_part('templates/blog-tile');
        endwhile;

        // Restore original Post Data
        wp_reset_postdata();
    endif;

}





