<?php
/**
 * Mohan Impex Theme Functions
 *
 * @package mohan-impex
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// -----------------------------------------------
// ACF JSON Save/Load Point
// -----------------------------------------------
add_filter( 'acf/settings/save_json', function() {
    return get_template_directory() . '/acf-json';
} );

add_filter( 'acf/settings/load_json', function( $paths ) {
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
} );

// -----------------------------------------------
// ACF Block Registration
// -----------------------------------------------
add_action( 'acf/init', function() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    $blocks = [
        [
            'name'            => 'hero-section',
            'title'           => 'Hero Section',
            'description'     => 'Homepage hero with video background and stat cards.',
            'render_template' => 'template-parts/home/hero.php',
            'category'        => 'mohan-impex',
            'icon'            => 'slides',
            'keywords'        => [ 'hero', 'banner', 'video' ],
        ],
        [
            'name'            => 'categories-section',
            'title'           => 'Categories Section',
            'description'     => 'Product category cards grid.',
            'render_template' => 'template-parts/home/categories.php',
            'category'        => 'mohan-impex',
            'icon'            => 'grid-view',
            'keywords'        => [ 'categories', 'products', 'grid' ],
        ],
        [
            'name'            => 'counters-section',
            'title'           => 'Counters Section',
            'description'     => 'Animated number counters.',
            'render_template' => 'template-parts/home/counters.php',
            'category'        => 'mohan-impex',
            'icon'            => 'chart-bar',
            'keywords'        => [ 'counters', 'stats', 'numbers' ],
        ],
        [
            'name'            => 'story-section',
            'title'           => 'Story Section',
            'description'     => 'About / Our Story section.',
            'render_template' => 'template-parts/home/story.php',
            'category'        => 'mohan-impex',
            'icon'            => 'info',
            'keywords'        => [ 'about', 'story', 'legacy' ],
        ],
        [
            'name'            => 'timeline-section',
            'title'           => 'Timeline Section',
            'description'     => 'History milestone timeline.',
            'render_template' => 'template-parts/home/timeline.php',
            'category'        => 'mohan-impex',
            'icon'            => 'clock',
            'keywords'        => [ 'timeline', 'history', 'milestones' ],
        ],
        [
            'name'            => 'team-section',
            'title'           => 'Team Section',
            'description'     => 'Leadership team member cards.',
            'render_template' => 'template-parts/home/team.php',
            'category'        => 'mohan-impex',
            'icon'            => 'groups',
            'keywords'        => [ 'team', 'people', 'leadership' ],
        ],
        [
            'name'            => 'faq-section',
            'title'           => 'FAQ Section',
            'description'     => 'Accordion FAQ section.',
            'render_template' => 'template-parts/home/faq.php',
            'category'        => 'mohan-impex',
            'icon'            => 'editor-help',
            'keywords'        => [ 'faq', 'questions', 'accordion' ],
        ],
        [
            'name'            => 'blog-section',
            'title'           => 'Blog Section',
            'description'     => 'Latest blog posts grid.',
            'render_template' => 'template-parts/home/blog.php',
            'category'        => 'mohan-impex',
            'icon'            => 'admin-post',
            'keywords'        => [ 'blog', 'posts', 'news' ],
        ],
        [
            'name'            => 'cta-section',
            'title'           => 'CTA Strip',
            'description'     => 'Call-to-action strip.',
            'render_template' => 'template-parts/home/cta.php',
            'category'        => 'mohan-impex',
            'icon'            => 'megaphone',
            'keywords'        => [ 'cta', 'call to action', 'button' ],
        ],
        // ── About Us page blocks ──────────────────────────────────────
        [
            'name'            => 'about-hero',
            'title'           => 'About — Hero',
            'description'     => 'About Us page hero section.',
            'render_template' => 'template-parts/about/hero.php',
            'category'        => 'mohan-impex',
            'icon'            => 'welcome-view-site',
            'keywords'        => [ 'about', 'hero', 'banner' ],
        ],
        [
            'name'            => 'about-ticker',
            'title'           => 'About — Ticker',
            'description'     => 'Scrolling ticker strip.',
            'render_template' => 'template-parts/about/ticker.php',
            'category'        => 'mohan-impex',
            'icon'            => 'randomize',
            'keywords'        => [ 'ticker', 'marquee', 'scroll' ],
        ],
        [
            'name'            => 'about-story',
            'title'           => 'About — Story',
            'description'     => 'About Us story section with images and pull quote.',
            'render_template' => 'template-parts/about/story.php',
            'category'        => 'mohan-impex',
            'icon'            => 'book-alt',
            'keywords'        => [ 'story', 'about', 'history' ],
        ],
        [
            'name'            => 'about-cta',
            'title'           => 'About — CTA',
            'description'     => 'About Us CTA split section with stats.',
            'render_template' => 'template-parts/about/cta.php',
            'category'        => 'mohan-impex',
            'icon'            => 'button',
            'keywords'        => [ 'cta', 'about', 'reservation' ],
        ],
        [
            'name'            => 'about-values',
            'title'           => 'About — Values',
            'description'     => 'About Us values and standards cards.',
            'render_template' => 'template-parts/about/values.php',
            'category'        => 'mohan-impex',
            'icon'            => 'awards',
            'keywords'        => [ 'about', 'values', 'standards', 'why choose us' ],
        ],
        [
            'name'            => 'about-history',
            'title'           => 'About — History',
            'description'     => 'About Us history timeline and statistics.',
            'render_template' => 'template-parts/about/history.php',
            'category'        => 'mohan-impex',
            'icon'            => 'backup',
            'keywords'        => [ 'about', 'history', 'timeline', 'milestones' ],
        ],
        // ── Testimonials ─────────────────────────────────────────────
        [
            'name'            => 'testimonials-section',
            'title'           => 'Testimonials Section',
            'description'     => 'Scrolling testimonials slider with star ratings.',
            'render_template' => 'template-parts/home/testimonials.php',
            'category'        => 'mohan-impex',
            'icon'            => 'format-quote',
            'keywords'        => [ 'testimonials', 'reviews', 'stars' ],
        ],
        // ── Gallery page blocks ──────────────────────────────────────
        [
            'name'            => 'gallery-hero',
            'title'           => 'Gallery — Hero',
            'description'     => 'Gallery page hero banner.',
            'render_template' => 'template-parts/gallery/hero.php',
            'category'        => 'mohan-impex',
            'icon'            => 'format-image',
            'keywords'        => [ 'gallery', 'hero', 'banner' ],
        ],
        [
            'name'            => 'gallery-mosaic',
            'title'           => 'Gallery — Mosaic',
            'description'     => 'Mosaic image grid with fancybox lightbox.',
            'render_template' => 'template-parts/gallery/mosaic.php',
            'category'        => 'mohan-impex',
            'icon'            => 'grid-view',
            'keywords'        => [ 'gallery', 'mosaic', 'images', 'lightbox' ],
        ],
        [
            'name'            => 'product-testing-section',
            'title'           => 'Product — Image & Content',
            'description'     => 'Overlapping product image and rich-content section.',
            'render_template' => 'template-parts/mi-product/testing-section.php',
            'category'        => 'mohan-impex',
            'icon'            => 'media-document',
            'keywords'        => [ 'product', 'testing', 'image', 'content' ],
            'post_types'      => [ 'mi_product' ],
        ],
        [
            'name'            => 'product-applications',
            'title'           => 'Product — Applications',
            'description'     => 'Application icon grid for a product.',
            'render_template' => 'template-parts/mi-product/applications.php',
            'category'        => 'mohan-impex',
            'icon'            => 'screenoptions',
            'keywords'        => [ 'product', 'applications', 'uses', 'icons' ],
            'post_types'      => [ 'mi_product' ],
        ],
        [
            'name'            => 'product-benefits',
            'title'           => 'Product — Benefits',
            'description'     => 'Product benefits list with icons.',
            'render_template' => 'template-parts/mi-product/benefits.php',
            'category'        => 'mohan-impex',
            'icon'            => 'yes-alt',
            'keywords'        => [ 'product', 'benefits', 'features', 'icons' ],
            'post_types'      => [ 'mi_product' ],
        ],
    ];

    foreach ( $blocks as $block ) {
    acf_register_block_type( array_merge( $block, [
        'supports' => [ 
            'align' => false, 
            'mode'  => true,
        ],
        'mode' => 'preview',
        'enqueue_assets' => function() {},
    ] ) );
}
} );

// Register custom block category
add_filter( 'block_categories_all', function( $categories ) {
    array_unshift( $categories, [
        'slug'  => 'mohan-impex',
        'title' => 'Mohan Impex',
        'icon'  => null,
    ] );
    return $categories;
} );

// -----------------------------------------------
// Theme Setup
// -----------------------------------------------
function mohan_impex_setup() {
    load_theme_textdomain( 'mohan-impex', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Custom image sizes
    add_image_size( 'mohan-impex-card', 640, 400, true );
    add_image_size( 'mohan-impex-hero', 1920, 600, true );

    // Navigation menus
    register_nav_menus( [
        'primary' => esc_html__( 'Primary Menu', 'mohan-impex' ),
        'footer'  => esc_html__( 'Footer Menu', 'mohan-impex' ),
    ] );
}
add_action( 'after_setup_theme', 'mohan_impex_setup' );

// -----------------------------------------------
// Content Width
// -----------------------------------------------
function mohan_impex_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'mohan_impex_content_width', 860 );
}
add_action( 'after_setup_theme', 'mohan_impex_content_width', 0 );

// -----------------------------------------------
// Enqueue Scripts & Styles
// -----------------------------------------------
function mohan_impex_scripts() {
    $version = wp_get_theme()->get( 'Version' );

    // Main stylesheet
    wp_enqueue_style(
        'mohan-impex-style',
        get_stylesheet_uri(),
        [],
        $version
    );

    // Google Fonts
    wp_enqueue_style(
        'mohan-impex-google-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Merriweather:wght@400;700&display=swap',
        [],
        null
    );

    // Main JS
    wp_enqueue_script(
        'mohan-impex-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $version,
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'mohan_impex_scripts' );

// -----------------------------------------------
// Register Widget Areas (Sidebars)
// -----------------------------------------------
function mohan_impex_widgets_init() {
    register_sidebar( [
        'name'          => esc_html__( 'Main Sidebar', 'mohan-impex' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here to appear in the sidebar.', 'mohan-impex' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ] );

    register_sidebar( [
        'name'          => esc_html__( 'Footer Column 1', 'mohan-impex' ),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );

    register_sidebar( [
        'name'          => esc_html__( 'Footer Column 2', 'mohan-impex' ),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );

    register_sidebar( [
        'name'          => esc_html__( 'Footer Column 3', 'mohan-impex' ),
        'id'            => 'footer-3',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'mohan_impex_widgets_init' );

// -----------------------------------------------
// Excerpt length
// -----------------------------------------------
function mohan_impex_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'mohan_impex_excerpt_length' );

function mohan_impex_excerpt_more( $more ) {
    return '&hellip; <a class="read-more" href="' . get_permalink() . '">' . esc_html__( 'Read More', 'mohan-impex' ) . '</a>';
}
add_filter( 'excerpt_more', 'mohan_impex_excerpt_more' );

// -----------------------------------------------
// Body classes
// -----------------------------------------------
function mohan_impex_body_classes( $classes ) {
    if ( is_singular() ) {
        $classes[] = 'singular';
    }
    if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'templates/page-full-width.php' ) ) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter( 'body_class', 'mohan_impex_body_classes' );

// -----------------------------------------------
// Product Segments Custom Post Type + Taxonomy
// -----------------------------------------------
function mohan_impex_register_post_types() {

    // Taxonomy: Product Category
    register_taxonomy( 'product_segment_cat', 'product_segment', [
        'labels' => [
            'name'              => 'Segment Categories',
            'singular_name'     => 'Segment Category',
            'search_items'      => 'Search Categories',
            'all_items'         => 'All Categories',
            'parent_item'       => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item'         => 'Edit Category',
            'update_item'       => 'Update Category',
            'add_new_item'      => 'Add New Category',
            'new_item_name'     => 'New Category Name',
            'menu_name'         => 'Categories',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => [ 'slug' => 'product-segment-category' ],
        'show_in_rest'      => true,
    ] );

    // Post Type: Product Segment
    register_post_type( 'product_segment', [
        'labels' => [
            'name'               => 'Product Segments',
            'singular_name'      => 'Product Segment',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Product Segment',
            'edit_item'          => 'Edit Product Segment',
            'new_item'           => 'New Product Segment',
            'view_item'          => 'View Product Segment',
            'search_items'       => 'Search Product Segments',
            'not_found'          => 'No product segments found',
            'not_found_in_trash' => 'No product segments found in Trash',
            'menu_name'          => 'Product Segments',
        ],
        'public'             => true,
        'has_archive'        => 'product-segments',
        'rewrite'            => [ 'slug' => 'product-segment', 'with_front' => false ],
        'menu_icon'          => 'dashicons-products',
        'menu_position'      => 5,
        'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'tags' ],
        'taxonomies'         => [ 'product_segment_cat' ],
        'show_in_rest'       => true,
    ] );

    // Taxonomy: Product Category
    register_taxonomy( 'mi_product_cat', 'mi_product', [
        'labels' => [
            'name'              => 'Product Categories',
            'singular_name'     => 'Product Category',
            'search_items'      => 'Search Categories',
            'all_items'         => 'All Categories',
            'parent_item'       => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item'         => 'Edit Category',
            'update_item'       => 'Update Category',
            'add_new_item'      => 'Add New Category',
            'new_item_name'     => 'New Category Name',
            'menu_name'         => 'Categories',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => [ 'slug' => 'product-category' ],
        'show_in_rest'      => true,
    ] );

    // Post Type: Products
    register_post_type( 'mi_product', [
        'labels' => [
            'name'               => 'Products',
            'singular_name'      => 'Product',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Product',
            'edit_item'          => 'Edit Product',
            'new_item'           => 'New Product',
            'view_item'          => 'View Product',
            'search_items'       => 'Search Products',
            'not_found'          => 'No products found',
            'not_found_in_trash' => 'No products found in Trash',
            'menu_name'          => 'Products',
        ],
        'public'             => true,
        'has_archive'        => 'products',
        'rewrite'            => [ 'slug' => 'product', 'with_front' => false ],
        'menu_icon'          => 'dashicons-cart',
        'menu_position'      => 6,
        'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'tags' ],
        'taxonomies'         => [ 'mi_product_cat' ],
        'show_in_rest'       => true,
    ] );
}
add_action( 'init', 'mohan_impex_register_post_types' );

// 12 posts per page on the product segment archive
add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'product_segment' ) ) {
        $query->set( 'posts_per_page', 12 );
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
} );

// 12 posts per page on the products archive
add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( 'mi_product' ) ) {
        $query->set( 'posts_per_page', 12 );
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'ASC' );
    }
} );

// -----------------------------------------------
// Custom logo helper
// -----------------------------------------------
function mohan_impex_site_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-title-link">';
        echo esc_html( get_bloginfo( 'name' ) );
        echo '</a>';
    }
}
