<?php
/**
 * About Us — Hero Section
 *
 * ACF Fields (block: acf/about-hero):
 *   - about_hero_eyebrow   (Text)
 *   - about_hero_em        (Text)  — italic part of h1
 *   - about_hero_highlight (Text)  — highlighted part of h1
 *   - about_hero_desc      (Textarea)
 *   - about_hero_btn1_text (Text)
 *   - about_hero_btn1_url  (URL)
 *   - about_hero_btn2_text (Text)
 *   - about_hero_btn2_url  (URL)
 *   - about_hero_btn2_icon (Text — FA class e.g. fa-users)
 *
 * @package mohan-impex
 */

$eyebrow    = get_field( 'about_hero_eyebrow' )   ?: 'Est. 1994 — A story built on quality and trust';
$em_text    = get_field( 'about_hero_em' )        ?: 'Who We';
$highlight  = get_field( 'about_hero_highlight' ) ?: 'Really Are.';
$desc       = get_field( 'about_hero_desc' )      ?: 'Not a chain. Not a concept. Mohan Impex is a living, breathing network built by people who genuinely cannot imagine doing anything else.';
$btn1_text  = get_field( 'about_hero_btn1_text' ) ?: 'Our Story';
$btn1_url   = get_field( 'about_hero_btn1_url' )  ?: '#story';
$btn2_text  = get_field( 'about_hero_btn2_text' ) ?: 'The Team';
$btn2_url   = get_field( 'about_hero_btn2_url' )  ?: '#team';
$btn2_icon  = get_field( 'about_hero_btn2_icon' ) ?: 'fa-users';
?>

<section class="hero about-hero">
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
        <div class="hero-bottom" data-aos="fade-up" data-aos-delay="260" data-aos-duration="800">
            <p class="hero-desc"><?php echo esc_html( $desc ); ?></p>
            <!--<div class="hero-ctas" data-aos="fade-up" data-aos-delay="380" data-aos-duration="700">-->
            <!--    <a href="<?php echo esc_url( $btn1_url ); ?>" class="btn-default btn-pill btn-highlighted">-->
            <!--        <?php echo esc_html( $btn1_text ); ?>-->
            <!--    </a>-->
            <!--    <a href="<?php echo esc_url( $btn2_url ); ?>" class="btn-default btn-pill btn-highlighted">-->
            <!--        <i class="fa-solid <?php echo esc_attr( $btn2_icon ); ?>"></i>-->
            <!--        <?php echo esc_html( $btn2_text ); ?>-->
            <!--    </a>-->
            <!--</div>-->
        </div>
    </div>
    <div class="scroll-hint" data-aos="fade-up" data-aos-delay="450" data-aos-duration="700">
        <div class="scroll-track"><div class="scroll-thumb"></div></div>
        Scroll
    </div>
</section>
