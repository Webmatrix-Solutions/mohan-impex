<?php
/**
 * Gallery — Hero Section
 *
 * ACF Fields (block: acf/gallery-hero):
 *   - gal_hero_eyebrow   (Text)
 *   - gal_hero_em        (Text)
 *   - gal_hero_highlight (Text)
 *   - gal_hero_desc      (Textarea)
 *   - gal_hero_btn1_text (Text)
 *   - gal_hero_btn1_url  (URL)
 *   - gal_hero_btn2_text (Text)
 *   - gal_hero_btn2_url  (URL)
 *   - gal_hero_btn2_icon (Text — FA class)
 *
 * @package mohan-impex
 */

$eyebrow   = get_field( 'gal_hero_eyebrow' )   ?: 'Our Visual Story — Behind Every Frame';
$em_text   = get_field( 'gal_hero_em' )        ?: 'Moments';
$highlight = get_field( 'gal_hero_highlight' ) ?: 'That Matter.';
$desc      = get_field( 'gal_hero_desc' )      ?: 'A curated collection of our products, processes, and the passion that drives us every day.';
$btn1_text = get_field( 'gal_hero_btn1_text' ) ?: 'Our Products';
$btn1_url  = get_field( 'gal_hero_btn1_url' )  ?: '/products';
$btn2_text = get_field( 'gal_hero_btn2_text' ) ?: 'Contact Us';
$btn2_url  = get_field( 'gal_hero_btn2_url' )  ?: '/contact';
$btn2_icon = get_field( 'gal_hero_btn2_icon' ) ?: 'fa-envelope';
?>

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grad"></div>
    <div class="container hero-inner" data-aos="fade-up" data-aos-duration="900">
        <div class="eyebrow" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
            <?php echo esc_html( $eyebrow ); ?>
        </div>
        <h1 class="hero-h1" data-aos="fade-up" data-aos-delay="180" data-aos-duration="800">
            <em><?php echo esc_html( $em_text ); ?></em><br>
            <span class="hero-highlight"><?php echo esc_html( $highlight ); ?></span>
        </h1>
        <p class="hero-desc" data-aos="fade-up" data-aos-delay="260" data-aos-duration="700">
            <?php echo esc_html( $desc ); ?>
        </p>
        <div class="hero-btns" data-aos="fade-up" data-aos-delay="340" data-aos-duration="700">
            <a href="<?php echo esc_url( $btn1_url ); ?>" class="btn btn-primary">
                <?php echo esc_html( $btn1_text ); ?>
            </a>
            <a href="<?php echo esc_url( $btn2_url ); ?>" class="btn btn-outline">
                <i class="fa-solid <?php echo esc_attr( $btn2_icon ); ?>"></i>
                <?php echo esc_html( $btn2_text ); ?>
            </a>
        </div>
    </div>
</section>