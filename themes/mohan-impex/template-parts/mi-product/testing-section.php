<?php
/**
 * Product Image and Content Section.
 *
 * @package mohan-impex
 */

$image = get_field( 'mip_testing_image' );
$content = get_field( 'mip_testing_content' );

if ( is_array( $image ) ) {
    $image_url = $image['url'] ?? '';
    $image_alt = $image['alt'] ?? '';
} elseif ( is_numeric( $image ) ) {
    $image_url = wp_get_attachment_image_url( $image, 'large' );
    $image_alt = get_post_meta( $image, '_wp_attachment_image_alt', true );
} else {
    $image_url = $image;
    $image_alt = '';
}
?>

<section class="product-testing-section">
    <div class="container">
        <div class="product-testing-section__inner">
            <div class="product-testing-section__image">
                <?php if ( $image_url ) : ?>
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                <?php else : ?>
                    <div class="product-testing-section__placeholder"></div>
                <?php endif; ?>
            </div>
            <div class="product-testing-section__content">
                <?php echo $content ? wp_kses_post( $content ) : '<h2>Product Excellence</h2><p>Add the image and content for this section from the block settings.</p>'; ?>
            </div>
        </div>
    </div>
</section>