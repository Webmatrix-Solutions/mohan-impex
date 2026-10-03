<?php
/**
 * Product Benefits List.
 *
 * @package mohan-impex
 */

$title     = get_field( 'mip_benefits_title' ) ?: 'Benefits of';
$highlight = get_field( 'mip_benefits_highlight' ) ?: get_the_title();
$items     = get_field( 'mip_benefits_items' ) ?: [];
$benefits  = [];

foreach ( $items as $item ) {
    $icon = $item['icon'] ?? null;
    $text = $item['text'] ?? '';
    $icon_url = is_array( $icon ) ? ( $icon['url'] ?? '' ) : ( is_numeric( $icon ) ? wp_get_attachment_image_url( $icon, 'medium' ) : $icon );

    if ( $text || $icon_url ) {
        $benefits[] = $item;
    }
}
?>

<section class="product-benefits">
    <div class="container">
        <h2 class="product-benefits__title">
            <?php echo esc_html( $title ); ?> <span><?php echo esc_html( $highlight ); ?></span>
        </h2>

        <?php if ( $benefits ) : ?>
            <div class="product-benefits__grid">
                <?php foreach ( $benefits as $item ) :
                    $icon = $item['icon'] ?? null;
                    $text = $item['text'] ?? '';
                    $icon_url = is_array( $icon ) ? ( $icon['url'] ?? '' ) : ( is_numeric( $icon ) ? wp_get_attachment_image_url( $icon, 'medium' ) : $icon );
                    $icon_alt = is_array( $icon ) ? ( $icon['alt'] ?? '' ) : '';
                    ?>
                    <div class="product-benefits__item">
                        <?php if ( $icon_url ) : ?>
                            <div class="product-benefits__icon">
                                <img src="<?php echo esc_url( $icon_url ); ?>" alt="<?php echo esc_attr( $icon_alt ?: $text ); ?>">
                            </div>
                        <?php endif; ?>
                        <?php if ( $text ) : ?>
                            <div class="product-benefits__label"><?php echo esc_html( $text ); ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>