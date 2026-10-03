<?php
/**
 * Single Template: Product Segment
 *
 * @package mohan-impex
 */

get_header();

while ( have_posts() ) :
    the_post();

    $post_id       = get_the_ID();
    $gallery       = get_field( 'ps_gallery', $post_id );        // Gallery field → array of image arrays
    $badge_text    = get_field( 'ps_badge_text', $post_id );
    $badge_type    = get_field( 'ps_badge_type', $post_id ) ?: 'badge-hot'; // CSS class
    $subtitle_tag  = get_field( 'ps_subtitle_tag', $post_id );
    $price         = get_field( 'ps_price', $post_id );
    $original_price = get_field( 'ps_original_price', $post_id );
    $rating        = get_field( 'ps_rating', $post_id );
    $review_count  = get_field( 'ps_review_count', $post_id );
    $meta_items    = get_field( 'ps_meta_items', $post_id );     // Repeater: ps_meta_icon, ps_meta_text

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

    // Taxonomy terms for breadcrumb / subtitle
    $terms = get_the_terms( $post_id, 'product_segment_cat' );
    $term_names = ( ! empty( $terms ) && ! is_wp_error( $terms ) )
        ? implode( ' · ', wp_list_pluck( $terms, 'name' ) )
        : '';
    $display_subtitle = $subtitle_tag ?: $term_names;

    // Related posts: same category, exclude current
    $related_query = new WP_Query( [
        'post_type'      => 'product_segment',
        'posts_per_page' => 3,
        'post__not_in'   => [ $post_id ],
        'tax_query'      => ! empty( $terms ) ? [ [
            'taxonomy' => 'product_segment_cat',
            'field'    => 'term_id',
            'terms'    => wp_list_pluck( $terms, 'term_id' ),
        ] ] : [],
        'orderby'        => 'rand',
    ] );
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ─────────────────────────────────── -->
    <section class="page-banner">
        <div class="shop-hero-bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> Product Segment
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
                <a href="<?php echo esc_url( get_post_type_archive_link( 'product_segment' ) ); ?>">Product Segments</a>
                <i class="fas fa-chevron-right"></i>
                <span><?php echo esc_html( get_the_title() ); ?></span>
            </div>
        </div>
    </section>

    <!-- ── Detail Section ─────────────────────────────── -->
    <section class="detail-section">
        <div class="container">
            <div class="detail-grid">

                <!-- LEFT: Gallery -->
                <div class="detail-gallery" data-aos="fade-right" data-aos-duration="900">
                    <?php if ( ! empty( $images ) ) : ?>
                        <div class="gallery-main gallery-main--segment image-animation" id="galleryMain">
                            <img id="mainImage"
                                 src="<?php echo esc_url( $images[0]['url'] ); ?>"
                                 alt="<?php echo esc_attr( $images[0]['alt'] ); ?>">
                            <?php if ( count( $images ) > 1 ) : ?>
                                <button class="gallery-arrow prev" id="prevBtn" aria-label="Previous image">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="gallery-arrow next" id="nextBtn" aria-label="Next image">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            <?php endif; ?>
                            <?php if ( $badge_text ) : ?>
                                <div class="gallery-badges">
                                    <span class="g-badge g-badge-primary">
                                        <i class="fa-solid fa-certificate"></i> <?php echo esc_html( $badge_text ); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <?php if ( $rating ) : ?>
                                <div class="gallery-rating">
                                    <i class="fa-solid fa-star"></i>
                                    <?php echo esc_html( $rating ); ?>
                                    <?php if ( $review_count ) : ?>
                                        <small>(<?php echo esc_html( $review_count ); ?> reviews)</small>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ( count( $images ) > 1 ) : ?>
                            <div class="gallery-thumbs" id="galleryThumbs">
                                <?php foreach ( $images as $idx => $img ) : ?>
                                    <div class="gallery-thumb image-animation<?php echo $idx === 0 ? ' active' : ''; ?>"
                                         data-index="<?php echo esc_attr( $idx ); ?>">
                                        <img src="<?php echo esc_url( $img['url'] ); ?>"
                                             alt="<?php echo esc_attr( $img['alt'] ); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <div class="gallery-main gallery-main--segment image-animation">
                            <div style="width:100%;aspect-ratio:4/3;background:#f0f0f0;display:flex;align-items:center;justify-content:center;color:#999;">
                                No image
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="detail-color-bar mt-4"></div>
                </div>

                <!-- RIGHT: Info Panel -->
                <div class="detail-panel" data-aos="fade-left" data-aos-delay="100" data-aos-duration="900">

                    <?php if ( $display_subtitle ) : ?>
                        <div class="detail-cat"><?php echo esc_html( $display_subtitle ); ?></div>
                    <?php endif; ?>

                    <h1 class="detail-name"><?php the_title(); ?></h1>

                    <!-- Meta row -->
                    <?php if ( $rating || ! empty( $meta_items ) ) : ?>
                        <div class="detail-meta">
                            <?php if ( $rating ) : ?>
                                <div class="detail-meta-item">
                                    <div class="detail-stars">
                                        <?php
                                        $full  = floor( $rating );
                                        $half  = ( $rating - $full ) >= 0.5 ? 1 : 0;
                                        $empty = 5 - $full - $half;
                                        for ( $s = 0; $s < $full; $s++ ) echo '<i class="fa-solid fa-star"></i>';
                                        if ( $half ) echo '<i class="fa-solid fa-star-half-stroke"></i>';
                                        for ( $s = 0; $s < $empty; $s++ ) echo '<i class="fa-regular fa-star"></i>';
                                        ?>
                                    </div>
                                    <span class="detail-review-count">
                                        <?php echo esc_html( $rating ); ?>
                                        <?php if ( $review_count ) : ?>(<?php echo esc_html( $review_count ); ?>)<?php endif; ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                            <?php if ( ! empty( $meta_items ) ) :
                                foreach ( $meta_items as $mi ) : ?>
                                    <div class="detail-meta-item">
                                        <i class="fa-solid <?php echo esc_attr( $mi['ps_meta_icon'] ); ?>"></i>
                                        <?php echo esc_html( $mi['ps_meta_text'] ); ?>
                                    </div>
                                <?php endforeach;
                            endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Description -->
                    <div class="detail-desc">
                        <?php the_content(); ?>
                    </div>

                    <!-- Price -->
                    <?php if ( $price ) : ?>
                        <div class="detail-price-row">
                            <div>
                                <div class="detail-price"><sup>₹</sup><?php echo esc_html( $price ); ?></div>
                                <?php if ( $original_price ) : ?>
                                    <div class="detail-price-was">Was ₹<?php echo esc_html( $original_price ); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Tags -->
                    <?php
                    $tags = get_the_tags();
                    if ( $tags && ! is_wp_error( $tags ) ) : ?>
                        <div class="detail-tags">
                            <?php foreach ( $tags as $tag ) : ?>
                                <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
                                   class="detail-tag"><?php echo esc_html( $tag->name ); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Share -->
                    <!--<div class="detail-share">-->
                    <!--    <span class="detail-share-label">Share</span>-->
                    <!--    <?php $share_url = urlencode( get_permalink() ); $share_title = urlencode( get_the_title() ); ?>-->
                    <!--    <a class="share-btn" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener" title="Facebook">-->
                    <!--        <i class="fa-brands fa-facebook-f"></i>-->
                    <!--    </a>-->
                    <!--    <a class="share-btn" href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener" title="Twitter">-->
                    <!--        <i class="fa-brands fa-twitter"></i>-->
                    <!--    </a>-->
                    <!--    <a class="share-btn" href="https://wa.me/?text=<?php echo $share_title . '%20' . $share_url; ?>" target="_blank" rel="noopener" title="WhatsApp">-->
                    <!--        <i class="fa-brands fa-whatsapp"></i>-->
                    <!--    </a>-->
                    <!--    <button class="share-btn js-copy-link" data-url="<?php echo esc_attr( get_permalink() ); ?>" title="Copy link">-->
                    <!--        <i class="fa-solid fa-link"></i>-->
                    <!--    </button>-->
                    <!--</div>-->

                </div>
            </div>
        </div>
    </section>

    <!-- ── Related Segments ───────────────────────────── -->
    <?php if ( $related_query->have_posts() ) : ?>
        <section class="related-section">
            <div class="container">
                <div class="related-head" data-aos="fade-up" data-aos-duration="700">
                    <div class="related-head-left">
                        <div class="eyebrow"><span class="eyebrow-line"></span> You May Also Like</div>
                        <h2 class="section-heading mb-0">
                            More from <span class="hero-highlight">Our Range</span>
                        </h2>
                        <p>Explore other product segments from our portfolio.</p>
                    </div>
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'product_segment' ) ); ?>" class="btn-default">
                        View All Segments
                    </a>
                </div>
                <div class="related-grid">
                    <?php
                    $delay = 100;
                    while ( $related_query->have_posts() ) :
                        $related_query->the_post();
                        get_template_part( 'template-parts/product-segment/card', null, [
                            'post_id'   => get_the_ID(),
                            'aos_delay' => $delay,
                            'variant'   => 'related',
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
