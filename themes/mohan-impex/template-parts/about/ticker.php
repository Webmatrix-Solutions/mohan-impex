<?php
/**
 * About Us - Partners Section
 *
 * ACF Fields (block: acf/about-ticker):
 *   - about_ticker_items (Repeater: partner_logo [Image], partner_name [Text], partner_url [URL])
 *
 * @package mohan-impex
 */

$items = get_field( 'about_ticker_items' ) ?: [];

// Duplicate items for seamless infinite scroll
$all_items = array_merge( $items, $items );
?>

<section class="ticker partner-ticker" data-aos="fade-up" data-aos-duration="500">
    <?php if ( $items ) : ?>
    <div class="partner-ticker__viewport">
        <div class="partner-ticker__track">
            <?php foreach ( $all_items as $item ) :
                $logo      = $item['partner_logo'] ?? '';
                $logo_url  = is_array( $logo ) ? ( $logo['url'] ?? '' ) : ( is_numeric( $logo ) ? wp_get_attachment_url( (int) $logo ) : $logo );
                $logo_alt  = is_array( $logo ) ? ( $logo['alt'] ?? '' ) : '';
                $name      = $item['partner_name'] ?? '';
                $partner_url = $item['partner_url'] ?? '';

                if ( ! $logo_url ) {
                    continue;
                }
            ?>
                <div class="partner-ticker__item">
                    <?php if ( $partner_url ) : ?><a href="<?php echo esc_url( $partner_url ); ?>" target="_blank" rel="noopener noreferrer"><?php endif; ?>
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ?: $name ?: 'Partner logo' ); ?>" loading="lazy">
                    <?php if ( $partner_url ) : ?></a><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php elseif ( is_admin() ) : ?>
        <p class="partner-ticker__empty">Add partner logos to display this section.</p>
    <?php endif; ?>
</section>
