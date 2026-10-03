<?php
/**
 * Home — Testimonials Section
 *
 * ACF Fields:
 *   testi_bg             Select  — 'white' | 'warm'
 *   testi_eyebrow        Text
 *   testi_title          Text
 *   testi_title_hl       Text
 *   testi_overall_rating Number  — e.g. 4.9
 *   testi_review_count   Text    — e.g. "500+"
 *   testi_reviews        Repeater:
 *       testi_name         Text
 *       testi_avatar       Image (array)
 *       testi_rating       Number 1–5
 *       testi_text         Textarea
 *       testi_source       Text  — e.g. "Google Review"
 *       testi_source_icon  Text  — e.g. "fab fa-google"
 *
 * @package mohan-impex
 */

$bg_choice      = get_field( 'testi_bg' )             ?: 'warm';
$eyebrow        = get_field( 'testi_eyebrow' )        ?: 'Client Reviews';
$title          = get_field( 'testi_title' )          ?: 'Words From Our';
$title_hl       = get_field( 'testi_title_hl' )       ?: 'Happy Partners';
$overall_rating = get_field( 'testi_overall_rating' ) ?: '4.9';
$review_count   = get_field( 'testi_review_count' )   ?: '500+';
$reviews        = get_field( 'testi_reviews' )        ?: [];

$bg_style = $bg_choice === 'white' ? 'background:#ffffff;' : 'background:#e9e0d2;';

if ( empty( $reviews ) ) {
    $reviews = [
        [
            'testi_name'        => 'Rajesh Kumar',
            'testi_avatar'      => null,
            'testi_text'        => '"Mohan Impex has been our trusted supplier for over a decade. Consistent quality, on-time delivery, and a team that genuinely cares about our business."',
            'testi_source'      => 'Google Review',
            'testi_source_icon' => 'fab fa-google',
        ],
        [
            'testi_name'        => 'Priya Mehta',
            'testi_avatar'      => null,
            'testi_text'        => '"The product range is excellent and pricing is very competitive. Our production never faces shortages since we partnered with Mohan Impex."',
            'testi_source'      => 'Partner Feedback',
            'testi_source_icon' => 'fas fa-handshake',
        ],
        [
            'testi_name'        => 'Suresh Patel',
            'testi_avatar'      => null,
            'testi_text'        => '"Exceptional customer support. Any issue is resolved within hours. We highly recommend Mohan Impex to any distributor looking for reliability."',
            'testi_source'      => 'Trade Partner',
            'testi_source_icon' => 'fas fa-industry',
        ],
        [
            'testi_name'        => 'Anita Singh',
            'testi_avatar'      => null,
            'testi_text'        => '"We switched from three different suppliers to just Mohan Impex. One point of contact, better pricing, and zero quality complaints since day one."',
            'testi_source'      => 'Google Review',
            'testi_source_icon' => 'fab fa-google',
        ],
        [
            'testi_name'        => 'Mohammed Farhan',
            'testi_avatar'      => null,
            'testi_text'        => '"Their export documentation support is second to none. Mohan Impex made our first overseas shipment seamless and stress-free."',
            'testi_source'      => 'Export Partner',
            'testi_source_icon' => 'fas fa-globe',
        ],
    ];
}

if ( ! function_exists( 'mi_render_stars' ) ) {
    function mi_render_stars( $rating ) {
        $rating = (float) $rating;
        $full   = (int) floor( $rating );
        $half   = ( $rating - $full ) >= 0.5 ? 1 : 0;
        $empty  = 5 - $full - $half;
        $html   = '';
        for ( $i = 0; $i < $full;  $i++ ) $html .= '<i class="fas fa-star"></i>';
        if ( $half )                        $html .= '<i class="fas fa-star-half-alt"></i>';
        for ( $i = 0; $i < $empty; $i++ ) $html .= '<i class="far fa-star"></i>';
        return $html;
    }
}
?>

<section class="testi-section bg-section" id="testimonials" style="<?php echo esc_attr( $bg_style ); ?>">
    <div class="container">

        <div class="row align-items-end justify-content-between testi-header-row">
            <div class="col-12 col-lg-8" data-aos="fade-up">
                <div class="testi-head" data-aos="fade-up" data-aos-duration="600">
                    <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                        <span class="eyebrow-line"></span>
                        <?php echo esc_html( $eyebrow ); ?>
                    </div>
                    <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <?php echo esc_html( $title ); ?>
                        <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                    </h2>
                </div>
            </div>
            <div class="col-12 col-lg-auto d-flex align-items-center gap-4" data-aos="fade-up" data-aos-delay="100">
                <!--<div class="testi-rating-pill">-->
                <!--    <span class="testi-rating-pill__score"><?php echo esc_html( $overall_rating ); ?></span>-->
                <!--    <div>-->
                <!--        <div class="testi-rating-pill__stars">-->
                <!--            <?php echo mi_render_stars( $overall_rating ); ?>-->
                <!--        </div>-->
                <!--        <span class="testi-rating-pill__label"><?php echo esc_html( $review_count ); ?> Reviews</span>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="testi-arrows">
                    <button class="testi-arrow" id="testiPrev" aria-label="Previous"><i class="fas fa-arrow-left"></i></button>
                    <button class="testi-arrow" id="testiNext" aria-label="Next"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="testi-slider-wrap" data-aos="fade-up" data-aos-delay="150">
            <div class="testi-track" id="testiTrack">

                <?php foreach ( $reviews as $review ) :
                    $name         = $review['testi_name']        ?? '';
                    $avatar_field = $review['testi_avatar']      ?? null;
                    $rating       = (float) ( $review['testi_rating'] ?? 5 );
                    $text         = $review['testi_text']        ?? '';
                    $source       = $review['testi_source']      ?? '';
                    $source_icon  = $review['testi_source_icon'] ?? 'fas fa-star';

                    if ( is_array( $avatar_field ) ) {
                        $avatar_url = $avatar_field['url'] ?? '';
                        $avatar_alt = $avatar_field['alt'] ?? $name;
                    } else {
                        $avatar_url = (string) $avatar_field;
                        $avatar_alt = $name;
                    }

                    $initials = '';
                    foreach ( explode( ' ', trim( $name ) ) as $part ) {
                        $initials .= strtoupper( mb_substr( $part, 0, 1 ) );
                    }
                    $initials = mb_substr( $initials, 0, 2 );
                ?>
                <div class="testi-card testi-card--highlight" style="width:400px;">
                    <div class="testi-card__top-line"></div>
                    <div class="testi-card__head">
                        <!--<div class="testi-card__stars"><?php echo mi_render_stars( $rating ); ?></div>-->
                        <div class="testi-card__ql"><i class="fas fa-quote-right"></i></div>
                    </div>
                    <p class="testi-card__text"><?php echo esc_html( $text ); ?></p>
                    <div class="testi-card__footer">
                        <?php if ( $avatar_url ) : ?>
                            <img class="testi-card__avatar" src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $avatar_alt ); ?>">
                        <?php else : ?>
                            <div class="testi-card__avatar" style="display:flex;align-items:center;justify-content:center;background:var(--primary-color);color:#fff;font-family:var(--heading-font);font-weight:800;font-size:16px;">
                                <?php echo esc_html( $initials ); ?>
                            </div>
                        <?php endif; ?>
                        <div class="testi-card__meta">
                            <strong class="testi-card__name"><?php echo esc_html( $name ); ?></strong>
                            <span class="testi-card__source">
                                <i class="<?php echo esc_attr( $source_icon ); ?>"></i>
                                <?php echo esc_html( $source ); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="testi-dots" id="testiDots" data-aos="fade-up" data-aos-delay="50">
            <?php foreach ( array_keys( $reviews ) as $i ) : ?>
                <button class="testi-dot<?php echo $i === 0 ? ' active' : ''; ?>"
                        aria-label="<?php echo esc_attr( 'Slide ' . ( $i + 1 ) ); ?>"></button>
            <?php endforeach; ?>
        </div>

    </div>
</section>