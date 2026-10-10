<?php
/**
 * Single Template: Product
 *
 * @package mohan-impex
 */

get_header();

while ( have_posts() ) :
    the_post();

    $post_id        = get_the_ID();
    $gallery        = get_field( 'mip_gallery', $post_id );
    $hero_image     = get_field( 'mip_hero_image', $post_id );
    $badge_text     = get_field( 'mip_badge_text', $post_id );
    $badge_type     = get_field( 'mip_badge_type', $post_id ) ?: '';
    $subtitle_tag   = get_field( 'mip_subtitle_tag', $post_id );
    $price          = get_field( 'mip_price', $post_id );
    $original_price = get_field( 'mip_original_price', $post_id );
    $rating         = get_field( 'mip_rating', $post_id );
    $review_count   = get_field( 'mip_review_count', $post_id );
    $meta_items     = get_field( 'mip_meta_items', $post_id );

    // Use a dedicated product hero image when supplied; otherwise retain the
    // existing shared product-banner background.
    if ( is_array( $hero_image ) ) {
        $hero_image_url = $hero_image['url'] ?? '';
    } elseif ( is_numeric( $hero_image ) ) {
        $hero_image_url = wp_get_attachment_image_url( $hero_image, 'mohan-impex-hero' );
    } else {
        $hero_image_url = $hero_image;
    }

    // Build gallery images array — fallback to featured image
    $images = [];
    if ( ! empty( $gallery ) ) {
        foreach ( $gallery as $img ) {
            $images[] = [
                'url' => is_array( $img ) ? $img['url'] : wp_get_attachment_url( $img ),
                'alt' => is_array( $img ) ? $img['alt'] : get_post_meta( $img, '_wp_attachment_image_alt', true ),
            ];
        }
    }
    if ( empty( $images ) && has_post_thumbnail() ) {
        $images[] = [
            'url' => get_the_post_thumbnail_url( $post_id, 'large' ),
            'alt' => get_the_title(),
        ];
    }

    $terms = get_the_terms( $post_id, 'mi_product_cat' );
    $term_names = ( ! empty( $terms ) && ! is_wp_error( $terms ) )
        ? implode( ' · ', wp_list_pluck( $terms, 'name' ) )
        : '';
    $display_subtitle = $subtitle_tag ?: $term_names;

    $related_query = new WP_Query( [
        'post_type'      => 'mi_product',
        'posts_per_page' => 3,
        'post__not_in'   => [ $post_id ],
        'tax_query'      => ! empty( $terms ) ? [ [
            'taxonomy' => 'mi_product_cat',
            'field'    => 'term_id',
            'terms'    => wp_list_pluck( $terms, 'term_id' ),
        ] ] : [],
        'orderby'        => 'rand',
    ] );
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ─────────────────────────────────── -->
    <section class="page-banner">
        <div class="shop-hero-bg"<?php echo $hero_image_url ? ' style="background-image: url(\'' . esc_url( $hero_image_url ) . '\');"' : ''; ?>></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> Product
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <?php echo esc_html( get_the_title() ); ?>
                    <?php if ( $display_subtitle ) : ?>
                        <span class="hero-highlight"><?php echo esc_html( $display_subtitle ); ?></span>
                    <?php endif; ?>
                </h2>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="<?php echo esc_url( get_post_type_archive_link( 'mi_product' ) ); ?>">Products</a>
                <i class="fas fa-chevron-right"></i>
                <span><?php echo esc_html( get_the_title() ); ?></span>
            </div>
        </div>
    </section>

    <!-- ── Detail Section ─────────────────────────────── -->
    <section class="detail-section">
        <?php the_content(); ?>
    </section>

    <!-- ── Related Products ───────────────────────────── -->
    <?php if ( $related_query->have_posts() ) : ?>
        <section class="related-section related-products-section">
            <div class="container">
                <div class="related-head" data-aos="fade-up" data-aos-duration="700">
                    <div class="related-head-left">
                        <div class="eyebrow"><span class="eyebrow-line"></span> You May Also Like</div>
                        <h2 class="section-heading mb-0">More from <span class="hero-highlight">Our Range</span></h2>
                        <p>Explore other products from our portfolio.</p>
                    </div>
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'mi_product' ) ); ?>" class="btn-default">
                        View All Products
                    </a>
                </div>
                <div class="related-grid">
                    <?php
                    $delay = 100;
                    while ( $related_query->have_posts() ) :
                        $related_query->the_post();
                        get_template_part( 'template-parts/mi-product/card', null, [
                            'post_id'   => get_the_ID(),
                            'aos_delay' => $delay,
                            'related_card' => true,
                        ] );
                        $delay += 150;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php endwhile; ?>
<?php get_footer(); ?>
