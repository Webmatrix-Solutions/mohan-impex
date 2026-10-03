<?php
/**
 * About Us — CTA Split Section
 *
 * ACF Fields (block: acf/about-cta):
 *   - about_cta_tag        (Text)
 *   - about_cta_title      (Text)
 *   - about_cta_subtitle   (Textarea)
 *   - about_cta_btn_text   (Text)
 *   - about_cta_btn_url    (URL)
 *   - about_cta_image      (Image — returns array)
 *   - about_cta_stat1_num  (Text)
 *   - about_cta_stat1_lbl  (Text)
 *   - about_cta_stat2_num  (Text)
 *   - about_cta_stat2_lbl  (Text)
 *
 * @package mohan-impex
 */

$img_base     = 'https://lavenderblush-mouse-811581.hostingersite.com/wp-content/uploads/2026/07/Partner-With-Us-Banner-1.jpg';
$tag          = get_field( 'about_cta_tag' )       ?: 'Grow Your Business with a Trusted Food Ingredients Partner';
$title        = get_field( 'about_cta_title' )     ?: 'Partner With Mohan Impex';
$subtitle     = get_field( 'about_cta_subtitle' )  ?: 'Join hands with Mohan Impex and gain access to premium-quality food ingredients, competitive pricing, reliable supply, and dedicated business support. Whether you`re a distributor, wholesaler, manufacturer, or exporter, we`re here to help your business grow.';
$btn_text     = get_field( 'about_cta_btn_text' )  ?: 'Get in Touch';
$btn_url      = get_field( 'about_cta_btn_url' )   ?: '/partner-with-us';
$stat1_num    = get_field( 'about_cta_stat1_num' ) ?: '4.9';
$stat1_lbl    = get_field( 'about_cta_stat1_lbl' ) ?: 'Average Partner Rating';
$stat2_num    = get_field( 'about_cta_stat2_num' ) ?: '5000';
$stat2_lbl    = get_field( 'about_cta_stat2_lbl' ) ?: 'Customers Served Since 1994';

$img_field    = get_field( 'about_cta_image' );
$img_url      = is_array( $img_field ) ? $img_field['url'] : ( $img_field ?: $img_base );
$img_alt      = is_array( $img_field ) ? $img_field['alt'] : 'Mohan Impex';
?>

<div class="cta">
    <div class="cta-split" data-aos="fade-up" data-aos-duration="900">

        <div class="cta-l" data-aos="fade-right" data-aos-duration="850">
            <div class="cta-l-inner">
                <div class="cta-l-tag" data-aos="fade-up" data-aos-delay="80" data-aos-duration="650">
                    <?php echo esc_html( $tag ); ?>
                </div>
                <h2 class="cta-l-title" data-aos="fade-up" data-aos-delay="140" data-aos-duration="700">
                    <?php echo esc_html( $title ); ?>
                </h2>
                <p class="cta-l-sub" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <?php echo esc_html( $subtitle ); ?>
                </p>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn-default btn-dark btn-pill btn-highlighted" data-aos="fade-up" data-aos-delay="260" data-aos-duration="700">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            </div>
        </div>

        <div class="cta-r" data-aos="fade-left" data-aos-duration="850">
            <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
            <div class="cta-r-overlay">
                <div class="cta-r-stat" data-aos="zoom-in" data-aos-delay="220" data-aos-duration="650">
                    <div class="cta-r-num"><?php echo esc_html( $stat1_num ); ?><span>★</span></div>
                    <div class="cta-r-lbl"><?php echo esc_html( $stat1_lbl ); ?></div>
                </div>
                <div class="cta-r-divider"></div>
                <div class="cta-r-stat" data-aos="zoom-in" data-aos-delay="280" data-aos-duration="650">
                    <div class="cta-r-num"><?php echo esc_html( $stat2_num ); ?><span>k</span></div>
                    <div class="cta-r-lbl"><?php echo esc_html( $stat2_lbl ); ?></div>
                </div>
            </div>
        </div>

    </div>
</div>
