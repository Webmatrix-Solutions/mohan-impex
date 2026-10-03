<?php
/**
 * Template Part: Product Segment Card
 *
 * Args:
 *   $args['post_id']   (int)    — Post ID
 *   $args['aos_delay'] (int)    — AOS delay in ms (optional, default 0)
 *   $args['variant']   (string) — 'grid' or 'related' (optional)
 *
 * @package mohan-impex
 */

$post_id   = isset( $args['post_id'] ) ? (int) $args['post_id'] : get_the_ID();
$aos_delay = isset( $args['aos_delay'] ) ? (int) $args['aos_delay'] : 0;

$badge_text  = get_field( 'ps_badge_text', $post_id );
$badge_type  = get_field( 'ps_badge_type', $post_id ) ?: '';
$price       = get_field( 'ps_price', $post_id );
$orig_price  = get_field( 'ps_original_price', $post_id );
$rating      = get_field( 'ps_rating', $post_id );
$rev_count   = get_field( 'ps_review_count', $post_id );

$terms      = get_the_terms( $post_id, 'product_segment_cat' );
$cat_name   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : '';

$img_url    = get_the_post_thumbnail_url( $post_id, 'large' );
$img_alt    = get_the_title( $post_id );
$permalink  = get_permalink( $post_id );
$title      = get_the_title( $post_id );
$excerpt    = wp_trim_words( get_the_excerpt() ?: wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 18, '...' );
?>

<div class="pc" data-aos="fade-up" data-aos-duration="700" data-aos-delay="<?php echo esc_attr( $aos_delay ); ?>"
     <?php if ( $cat_name ) : ?>data-cat="<?php echo esc_attr( sanitize_title( $cat_name ) ); ?>"<?php endif; ?>>
    <div class="pc-bar"></div>

    <a href="<?php echo esc_url( $permalink ); ?>">
        <div class="pc-img-wrap">
            <?php if ( $img_url ) : ?>
                <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
            <?php else : ?>
                <div style="width:100%;aspect-ratio:4/3;background:#e8e8e8;"></div>
            <?php endif; ?>
            <div class="pc-img-overlay"></div>
            <?php if ( $badge_text ) : ?>
                <div class="pc-badges">
                    <span class="pc-badge <?php echo esc_attr( $badge_type ); ?>">
                        <?php echo esc_html( $badge_text ); ?>
                    </span>
                </div>
            <?php endif; ?>
            <?php if ( $rating ) : ?>
                <div class="pc-rating-img">
                    <i class="fa-solid fa-star"></i> <?php echo esc_html( $rating ); ?>
                    <?php if ( $rev_count ) : ?><span>(<?php echo esc_html( $rev_count ); ?>)</span><?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </a>

    <div class="pc-body">
        <?php if ( $cat_name ) : ?>
            <div class="pc-cat"><?php echo esc_html( $cat_name ); ?></div>
        <?php endif; ?>
        <div class="pc-name"><a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></div>
        <?php if ( $excerpt ) : ?>
            <p class="pc-desc"><?php echo esc_html( $excerpt ); ?></p>
        <?php endif; ?>
        <div class="pc-divider"></div>
        <div class="pc-footer">
            <?php if ( $price ) : ?>
                <div class="pc-price">
                    <?php if ( $orig_price ) : ?><s>₹<?php echo esc_html( $orig_price ); ?></s><?php endif; ?>
                    <sup>₹</sup><?php echo esc_html( $price ); ?>
                </div>
            <?php endif; ?>
            <a href="<?php echo esc_url( $permalink ); ?>" class="btn-default">Learn More</a>
        </div>
    </div>
</div>
