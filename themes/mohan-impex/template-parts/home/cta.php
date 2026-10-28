<?php

/**
 * CTA Strip Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - cta_eyebrow     (Text)
 *   - cta_title       (Text)
 *   - cta_title_hl    (Text)
 *   - cta_description (Textarea)
 *   - cta_btn1_text   (Text)
 *   - cta_btn1_url    (URL)
 *   - cta_btn2_text   (Text)
 *   - cta_btn2_url    (URL)
 *   - cta_btn2_icon   (Text — FA class e.g. fa-boxes-stacked)
 *   - cta_image       (Image)
 *
 * @package mohan-impex
 */

$img_base     = get_template_directory_uri() . '/assets/images/mohan-impex/';
$eyebrow      = get_field('cta_eyebrow')     ?: "";
$title        = get_field('cta_title')       ?: '';
$title_hl     = get_field('cta_title_hl')    ?: '';
$description  = get_field('cta_description') ?: "";
$btn1_text    = get_field('cta_btn1_text')   ?: '';
$btn1_url     = get_field('cta_btn1_url')    ?: '#';
$btn2_text    = get_field('cta_btn2_text')   ?: '';
$btn2_url     = get_field('cta_btn2_url')    ?: '#';
$btn2_icon    = get_field('cta_btn2_icon')   ?: '';

$image_field  = get_field('cta_image');
$image_url    = is_array($image_field) ? $image_field['url'] : ($image_field ?: $img_base . 'cta-image.jpg');
$image_alt    = is_array($image_field) ? $image_field['alt'] : 'CTA Section';
?>

<div class="au2-cta-strip">
    <div class="au2-container">
        <div class="au2-cta-grid">
            <!-- Left: Content -->
            <div class="au2-cta-left" data-aos="fade-right" data-aos-duration="700">
                <?php if ($eyebrow) { ?>
                    <div class="eyebrow">
                        <span class="eyebrow-line"></span><?php echo esc_html($eyebrow); ?>
                    </div>
                <?php } ?>
                <h3 class="section-heading au2-cta-title">
                    <?php echo esc_html($title); ?>
                    <span class="hero-highlight"><?php echo esc_html($title_hl); ?></span>
                </h3>
                <p class="au2-cta-desc"><?php echo wp_kses_post( $description ); ?></p>

                <div class="au2-cta-actions" data-aos="fade-left" data-aos-duration="700" data-aos-delay="100">
                    <a href="<?php echo esc_url($btn1_url); ?>" class="btn-default btn-highlighted">
                        <?php echo esc_html($btn1_text); ?>
                    </a>
                    <!-- <a href="<?php echo esc_url($btn2_url); ?>" class="btn btn-outline-white btn-pill btn-lg">
                        <i class="fa-solid <?php echo esc_attr($btn2_icon); ?>"></i>
                        <?php echo esc_html($btn2_text); ?>
                    </a> -->
                </div>
            </div>

            <!-- Right: Image -->
            <?php if ($image_url) : ?>
                <div class="au2-cta-image" data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                    <div class="au2-cta-img-wrap image-animation">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>