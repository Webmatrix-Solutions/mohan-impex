<?php
/**
 * Gallery — Grid Section
 *
 * ACF Fields (block: acf/gallery-mosaic):
 *   - gallery_items (Repeater)
 *       - gallery_image   (Image — array return)
 *       - gallery_caption (Text — lightbox caption, optional)
 *
 * @package mohan-impex
 */

$items = get_field( 'gallery_items' );

if ( empty( $items ) ) {
    if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        echo '<p style="padding:40px;text-align:center;color:#999;">Add images via the Gallery Items repeater field.</p>';
    }
    return;
}

$total   = count( $items );
$initial = 12;
?>

<section class="gallery-section" style="background:#fff;">
    <div class="container">
        <div class="gallery-grid" id="gallery-grid">
            <?php foreach ( $items as $i => $item ) :
                $img_field = $item['gallery_image'];
                if ( empty( $img_field ) ) continue;

                // Handle array, integer (attachment ID), or plain URL string
                if ( is_array( $img_field ) ) {
                    $img_url = $img_field['url'];
                    $img_alt = $img_field['alt'];
                } elseif ( is_numeric( $img_field ) ) {
                    $img_url = wp_get_attachment_url( (int) $img_field );
                    $img_alt = get_post_meta( (int) $img_field, '_wp_attachment_image_alt', true );
                } else {
                    $img_url = $img_field;
                    $img_alt = '';
                }

                if ( empty( $img_url ) ) continue;

                $caption = ! empty( $item['gallery_caption'] ) ? $item['gallery_caption'] : $img_alt;
                $hidden  = ( $i >= $initial ) ? ' gal-hidden' : '';
            ?>
            <div class="gal-item<?php echo esc_attr( $hidden ); ?>"
                 data-aos="fade-up"
                 data-aos-duration="600"
                 data-aos-delay="<?php echo ( $i % 3 ) * 60; ?>">
                <img src="<?php echo esc_url( $img_url ); ?>"
                     alt="<?php echo esc_attr( $img_alt ); ?>"
                     loading="lazy">
                <div class="gal-overlay"></div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ( $total > $initial ) : ?>
        <div class="gallery-load-more-wrap">
            <button class="btn btn-outline js-gallery-load-more" data-target="#gallery-grid">
                Load More
                <span class="glm-count">(<?php echo intval( $total - $initial ); ?> more)</span>
            </button>
        </div>
        <?php endif; ?>
    </div>
</section>