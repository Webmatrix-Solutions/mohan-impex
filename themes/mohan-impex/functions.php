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
            'description'     => 'Story-style product image and content section.',
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
    $main_js = get_template_directory() . '/assets/js/main.js';
    $main_js_version = file_exists( $main_js ) ? (string) filemtime( $main_js ) : $version;

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
        $main_js_version,
        true
    );

    wp_localize_script( 'mohan-impex-main', 'mohanImpexData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'mohan_impex_load_logos' ),
    ] );

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

    // Logo-only listing: Our Branded Partners.
    register_post_type( 'branded_partner', [
        'labels' => [
            'name'               => 'Our Branded Partners',
            'singular_name'      => 'Branded Partner',
            'add_new_item'       => 'Add New Branded Partner',
            'edit_item'          => 'Edit Branded Partner',
            'search_items'       => 'Search Branded Partners',
            'not_found'          => 'No branded partners found',
            'not_found_in_trash' => 'No branded partners found in Trash',
            'menu_name'          => 'Branded Partners',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'has_archive'        => 'branded-partners',
        'rewrite'            => [ 'slug' => 'branded-partners', 'with_front' => false ],
        'menu_icon'          => 'dashicons-groups',
        'menu_position'      => 7,
        'supports'           => [ 'title', 'thumbnail' ],
        'show_in_rest'       => true,
    ] );

    // Logo-only listing: Principal Companies.
    register_post_type( 'principal_company', [
        'labels' => [
            'name'               => 'Principal Companies',
            'singular_name'      => 'Principal Company',
            'add_new_item'       => 'Add New Principal Company',
            'edit_item'          => 'Edit Principal Company',
            'search_items'       => 'Search Principal Companies',
            'not_found'          => 'No principal companies found',
            'not_found_in_trash' => 'No principal companies found in Trash',
            'menu_name'          => 'Principal Companies',
        ],
        'public'             => true,
        'publicly_queryable' => true,
        'has_archive'        => 'principal-companies',
        'rewrite'            => [ 'slug' => 'principal-companies', 'with_front' => false ],
        'menu_icon'          => 'dashicons-building',
        'menu_position'      => 8,
        'supports'           => [ 'title', 'thumbnail' ],
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

// Ten company logos per archive page, ordered by business name.
add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_post_type_archive( [ 'branded_partner', 'principal_company' ] ) ) {
        $query->set( 'posts_per_page', 10 );
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
} );

/** Render a logo card used on company archive pages and Load More responses. */
function mohan_impex_render_company_logo_card( $post_id ) {
    $name     = get_the_title( $post_id );
    $logo_url = get_the_post_thumbnail_url( $post_id, 'large' );
    ?>
    <article class="pc company-logo-card">
        <div class="pc-bar"></div>
        <div class="pc-img-wrap company-logo-card__image">
            <?php if ( $logo_url ) : ?>
                <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $name ); ?> logo" loading="lazy">
            <?php else : ?>
                <span class="company-logo-card__placeholder" aria-hidden="true"><?php echo esc_html( strtoupper( substr( $name, 0, 1 ) ) ); ?></span>
            <?php endif; ?>
        </div>
        <div class="pc-body">
            <div class="pc-name company-logo-card__name"><?php echo esc_html( $name ); ?></div>
        </div>
    </article>
    <?php
}

/** Fetch the next page of company logos for the archive Load More control. */
function mohan_impex_load_company_logos() {
    check_ajax_referer( 'mohan_impex_load_logos', 'nonce' );

    $post_type = sanitize_key( $_POST['post_type'] ?? '' );
    $page      = max( 1, absint( $_POST['page'] ?? 1 ) );
    $allowed   = [ 'branded_partner', 'principal_company' ];

    if ( ! in_array( $post_type, $allowed, true ) ) {
        wp_send_json_error( [ 'message' => 'Invalid company listing.' ], 400 );
    }

    $query = new WP_Query( [
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'paged'          => $page,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ] );

    ob_start();
    while ( $query->have_posts() ) {
        $query->the_post();
        mohan_impex_render_company_logo_card( get_the_ID() );
    }
    wp_reset_postdata();

    wp_send_json_success( [
        'html'     => ob_get_clean(),
        'has_more' => $page < (int) $query->max_num_pages,
        'next_url' => add_query_arg( 'paged', $page + 1, get_post_type_archive_link( $post_type ) ),
    ] );
}
add_action( 'wp_ajax_mohan_impex_load_company_logos', 'mohan_impex_load_company_logos' );
add_action( 'wp_ajax_nopriv_mohan_impex_load_company_logos', 'mohan_impex_load_company_logos' );

// ===============================================
// Load Products via AJAX
// ===============================================
function mohan_impex_load_products() {
    check_ajax_referer( 'mohan_impex_load_logos', 'nonce' );

    $page = max( 1, absint( $_POST['page'] ?? 1 ) );

    $query = new WP_Query( [
        'post_type'      => 'mi_product',
        'post_status'    => 'publish',
        'posts_per_page' => 12,
        'paged'          => $page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ] );

    ob_start();
    while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part( 'template-parts/product-segment/card', null, [ 'post_id' => get_the_ID() ] );
    }
    wp_reset_postdata();

    wp_send_json_success( [
        'html'     => ob_get_clean(),
        'has_more' => $page < (int) $query->max_num_pages,
        'next_url' => add_query_arg( 'paged', $page + 1, get_post_type_archive_link( 'mi_product' ) ),
    ] );
}
add_action( 'wp_ajax_mohan_impex_load_products', 'mohan_impex_load_products' );
add_action( 'wp_ajax_nopriv_mohan_impex_load_products', 'mohan_impex_load_products' );



// These content types are archive-only. Direct item URLs return visitors to
// their respective logo listing rather than exposing a detail page.
add_action( 'template_redirect', function() {
    if ( is_singular( [ 'branded_partner', 'principal_company' ] ) ) {
        wp_safe_redirect( get_post_type_archive_link( get_post_type() ), 302 );
        exit;
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

// ===============================================
// Add Segment Importer to Tools Menu (Fallback)
// ===============================================
add_action( 'admin_menu', function() {
    if ( current_user_can( 'manage_options' ) ) {
        add_management_page(
            'Segment Functionalities Importer',
            'Segment Importer',
            'manage_options',
            'mohan-segment-importer',
            'mohan_segment_importer_page'
        );
    }
}, 5 );

// Ensure the page is accessible
add_action( 'admin_init', function() {
    if ( ! empty( $_GET['page'] ) && 'mohan-segment-importer' === $_GET['page'] ) {
        // Page is already being displayed by add_management_page
    }
    
    // Also handle the import.php dispatch method if needed
    if ( ! empty( $_GET['import'] ) && 'segment_importer' === $_GET['import'] ) {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Unauthorized' );
        }
        mohan_segment_importer_page();
        exit;
    }
}, 5 );


// ===============================================
// Segment Importer Functions
// ===============================================

function mohan_segment_importer_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( 'Unauthorized' );
    }
    
    // Check if ACF is available
    if ( ! function_exists( 'get_field' ) ) {
        echo '<div class="wrap"><div class="notice notice-error"><p>❌ ACF (Advanced Custom Fields) plugin is not active. Please activate it first.</p></div></div>';
        return;
    }
    
    ?>
    <div class="wrap">
        <h1>📊 Segment Functionalities Importer</h1>
        
        <div style="max-width: 600px; margin: 20px 0; padding: 15px; background: #f5f5f5; border-radius: 5px;">
            <h3>📋 Setup Instructions:</h3>
            <ol style="line-height: 1.8;">
                <li><strong>Create this folder:</strong> <code>/wp-content/uploads/segment-csv/</code></li>
                <li><strong>Save your CSV files:</strong> <code>beverage.csv</code>, <code>biscuits.csv</code>, etc.</li>
                <li><strong>CSV Format:</strong> Comma-separated with header row
                    <pre style="background: white; padding: 10px; border-radius: 3px; overflow-x: auto;">Raw Material,Product Functionality / Segment
Citric Acid,Acidulant
Malic Acid,Acidulant</pre>
                </li>
                <li><strong>Click the button below to import</strong></li>
            </ol>
        </div>
        
        <?php
        if ( isset( $_POST['run_import'] ) && check_admin_referer( 'segment_import_nonce' ) ) {
            echo '<div class="notice notice-success" style="padding: 15px; margin: 15px 0;"><p>';
            try {
                $result = mohan_import_segment_csvs();
                echo $result;
            } catch ( Exception $e ) {
                echo '❌ Error: ' . esc_html( $e->getMessage() );
            }
            echo '</p></div>';
        }
        ?>
        
        <form method="post" style="margin: 20px 0;">
            <?php wp_nonce_field( 'segment_import_nonce' ); ?>
            <button type="submit" name="run_import" class="button button-primary button-large" style="padding: 10px 30px; font-size: 16px;">
                🚀 Run Import Now
            </button>
        </form>
    </div>
    <?php
}

function mohan_import_segment_csvs() {
    $upload_dir = wp_upload_dir();
    $csv_folder = $upload_dir['basedir'] . '/segment-csv';

    if ( ! is_dir( $csv_folder ) ) {
        wp_mkdir_p( $csv_folder );
        return "📁 <strong>Folder created!</strong><br>Location: <code>$csv_folder</code><br><br>Please add your CSV files and click 'Run Import Now' again.";
    }

    $csv_files = glob( $csv_folder . '/*.csv' );
    if ( empty( $csv_files ) ) {
        return "❌ <strong>No CSV files found</strong><br>Expected location: <code>$csv_folder</code><br><br>Please add CSV files and try again.";
    }

    $imported = 0;
    $errors = [];
    $output = '<ul style="list-style: disc; padding-left: 20px;">';

    foreach ( $csv_files as $file ) {
        $filename = basename( $file, '.csv' );
        $result = mohan_import_single_segment( $file, $filename );
        
        if ( is_wp_error( $result ) ) {
            $errors[] = "❌ <strong>$filename:</strong> " . $result->get_error_message();
            $output .= "<li style='color: red;'><strong>$filename:</strong> " . $result->get_error_message() . "</li>";
        } else {
            $imported += $result;
            $output .= "<li style='color: green;'><strong>✅ $filename.csv:</strong> Imported {$result} functionalities</li>";
        }
    }

    $output .= '</ul>';
    $message = $output . "<br><strong style='font-size: 16px;'>Total: $imported functionalities imported ✅</strong>";
    
    return $message;
}

function mohan_import_single_segment( $file, $segment_name ) {
    // Normalize segment name: remove underscores, trim spaces, and convert to lowercase for matching
    $normalized_name = trim( str_replace( '_', ' ', $segment_name ) );
    $normalized_lower = strtolower( $normalized_name );
    
    // Find segment by name (case-insensitive, space-flexible)
    $segments = get_posts( [
        'post_type'   => 'product_segment',
        'post_status' => 'publish',
        'numberposts' => -1,
    ] );

    $matching_segment = null;
    foreach ( $segments as $segment ) {
        $segment_title_lower = strtolower( trim( $segment->post_title ) );
        
        // Try exact match first
        if ( $segment_title_lower === $normalized_lower ) {
            $matching_segment = $segment;
            break;
        }
        
        // Try normalized match (remove multiple spaces)
        $segment_title_normalized = preg_replace( '/\s+/', ' ', $segment_title_lower );
        $search_normalized = preg_replace( '/\s+/', ' ', $normalized_lower );
        
        if ( $segment_title_normalized === $search_normalized ) {
            $matching_segment = $segment;
            break;
        }
    }

    if ( ! $matching_segment ) {
        // List available segments for debugging
        $available = array_map( function( $s ) { return $s->post_title; }, $segments );
        return new WP_Error( 'not_found', "Segment '$segment_name' not found. Available: " . implode( ', ', $available ) );
    }

    $post_id = $matching_segment->ID;
    $handle = fopen( $file, 'r' );
    
    if ( ! $handle ) {
        return new WP_Error( 'file_error', "Cannot open file: $file" );
    }

    $functionalities = [];
    $header_skipped = false;

    while ( ( $data = fgetcsv( $handle, 2000, ',' ) ) !== false ) {
        // Skip header row on first iteration
        if ( ! $header_skipped ) {
            $header_skipped = true;
            continue;
        }

        // Skip empty rows
        if ( empty( $data[0] ) || empty( $data[1] ) ) {
            continue;
        }

        $raw_material = trim( $data[0] );
        $functionality = trim( $data[1] );

        // Group by functionality name
        $found = false;
        foreach ( $functionalities as &$func ) {
            if ( strtolower( $func['functionality_name'] ) === strtolower( $functionality ) ) {
                $func['raw_materials'] .= "\n" . $raw_material;
                $found = true;
                break;
            }
        }

        if ( ! $found ) {
            $functionalities[] = [
                'functionality_name' => $functionality,
                'raw_materials'      => $raw_material,
            ];
        }
    }

    fclose( $handle );

    if ( empty( $functionalities ) ) {
        return new WP_Error( 'empty', "No valid data found in file" );
    }

    // Update ACF field
    update_field( 'ps_functionalities', $functionalities, $post_id );

    return count( $functionalities );
}

