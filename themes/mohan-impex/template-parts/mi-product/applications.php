<?php
/**
 * Product Applications Grid.
 *
 * @package mohan-impex
 */

$title     = get_field( 'mip_applications_title' ) ?: 'Applications of';
$highlight = get_field( 'mip_applications_highlight' ) ?: get_the_title();
$items     = get_field( 'mip_applications_items' ) ?: [];
$applications = [];

foreach ( $items as $item ) {
    $icon = $item['icon'] ?? null;
    $label = $item['label'] ?? '';
    $icon_url = is_array( $icon ) ? ( $icon['url'] ?? '' ) : ( is_numeric( $icon ) ? wp_get_attachment_image_url( $icon, 'medium' ) : $icon );

    if ( $label || $icon_url ) {
        $applications[] = $item;
    }
}

$application_count = count( $applications );
?>

<section class="product-applications">
    <div class="container">
        <h2 class="product-applications__title">
            <?php echo esc_html( $title ); ?> <span><?php echo esc_html( $highlight ); ?></span>
        </h2>

        <?php if ( $applications ) : ?>
            <div class="product-applications__grid product-applications__grid--count-<?php echo esc_attr( $application_count ); ?>">
                <?php foreach ( $applications as $item ) :
                    $icon = $item['icon'] ?? null;
                    $label = $item['label'] ?? '';
                    $icon_url = is_array( $icon ) ? ( $icon['url'] ?? '' ) : ( is_numeric( $icon ) ? wp_get_attachment_image_url( $icon, 'medium' ) : $icon );
                    $icon_alt = is_array( $icon ) ? ( $icon['alt'] ?? '' ) : '';

                    if ( ! $label && ! $icon_url ) {
                        continue;
                    }
                    ?>
                    <div class="product-applications__item">
                        <?php if ( $icon_url ) : ?>
                            <div class="product-applications__icon">
                                <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( $icon_alt ?: $label ); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ( $label ) : ?>
                            <div class="product-applications__label"><?php echo esc_html( $label ); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>