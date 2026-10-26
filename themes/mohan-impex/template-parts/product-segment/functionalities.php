<?php
/**
 * Template Part: Segment Functionalities & Raw Materials
 *
 * Displays product functionalities with associated raw materials as cards.
 *
 * Args:
 *   $args['post_id'] (int) — Post ID (default: current post)
 *
 * @package mohan-impex
 */

$post_id = isset( $args['post_id'] ) ? (int) $args['post_id'] : get_the_ID();
$functionalities = get_field( 'ps_functionalities', $post_id );

if ( empty( $functionalities ) || ! is_array( $functionalities ) ) {
    return; // Don't render if no functionalities
}
?>

<section class="segment-functionalities-section">
    <div class="container">
        <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
            <span class="eyebrow-line"></span>Product Functionalities
        </div>
        
        <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
            Raw Materials & Ingredients
        </h2>

        <div class="functionalities-grid" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            <?php foreach ( $functionalities as $index => $func ) : ?>
                <?php
                $functionality_name = isset( $func['functionality_name'] ) ? $func['functionality_name'] : '';
                $raw_materials = isset( $func['raw_materials'] ) ? $func['raw_materials'] : '';

                if ( empty( $functionality_name ) ) {
                    continue;
                }

                // Split raw materials by line breaks (handle both br tags and newlines)
                $raw_materials_clean = preg_replace( '/<br\s*\/?>/i', "\n", $raw_materials );
                $materials_array = array_filter( array_map( 'trim', explode( "\n", $raw_materials_clean ) ) );
                ?>

                <div class="functionality-card" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( ( $index * 100 ) + 300 ); ?>" data-aos-duration="700">
                    <h3 class="functionality-card__title"><?php echo esc_html( $functionality_name ); ?></h3>
                    
                    <div class="functionality-card__materials">
                        <?php if ( ! empty( $materials_array ) ) : ?>
                            <ul class="materials-list">
                                <?php foreach ( $materials_array as $material ) : ?>
                                    <li><?php echo esc_html( $material ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <p class="no-materials">No raw materials listed</p>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
