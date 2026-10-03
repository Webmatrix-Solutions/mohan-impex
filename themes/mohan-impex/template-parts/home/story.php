<?php
/**
 * About / Story Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - story_eyebrow        (Text)
 *   - story_title          (Text)
 *   - story_title_highlight (Text)
 *   - story_description    (Textarea)
 *   - story_image_main     (Image — returns array)
 *   - story_image_small    (Image — returns array)
 *   - story_badge_text     (Text)
 *   - story_year           (Text)
 *   - story_features       (Repeater: feat_icon [Text — FA class], feat_title [Text], feat_text [Textarea])
 *   - story_btn_text       (Text)
 *   - story_btn_url        (URL)
 *
 * @package mohan-impex
 */

$img_base       = get_template_directory_uri() . '/assets/images/mohan-impex/';
$eyebrow        = get_field( 'story_eyebrow' )         ?: 'Our Legacy Since 1994';
$title          = get_field( 'story_title' )           ?: 'Built on Trust,';
$title_hl       = get_field( 'story_title_highlight' ) ?: 'Quality & Innovation';
$description    = get_field( 'story_description' )     ?: 'Lorem ipsum dolor sit amet consectetur adipiscing elit mollis sodales nascetur, litora lacinia tincidunt pharetra vestibulum magna leo tempor a, vehicula iaculis senectus mattis taciti penatibus ince.';
$badge_text     = get_field( 'story_badge_text' )      ?: '30+ Years of Excellence';
$year           = get_field( 'story_year' )            ?: '1994';
$btn_text       = get_field( 'story_btn_text' )        ?: 'Explore Our Legacy';
$btn_url        = get_field( 'story_btn_url' )         ?: '#';

$image_main_field  = get_field( 'story_image_main' );
$image_small_field = get_field( 'story_image_small' );
$image_main  = is_array( $image_main_field )  ? $image_main_field['url']  : ( $image_main_field  ?: $img_base . 'about-homepage.jpg' );
$image_small = is_array( $image_small_field ) ? $image_small_field['url'] : ( $image_small_field ?: $img_base . 'about-homepage-image-small.jpg' );
$image_main_alt  = is_array( $image_main_field )  ? $image_main_field['alt']  : 'About Mohan Impex';
$image_small_alt = is_array( $image_small_field ) ? $image_small_field['alt'] : 'About Mohan Impex';

$features = get_field( 'story_features' ) ?: [
    [
        'feat_icon'  => 'fa-fire-flame-curved',
        'feat_title' => 'Premium Quality Standards',
        'feat_text'  => 'We source, manufacture and distribute high-quality food ingredients that meet industry standards and customer expectations.',
    ],
    [
        'feat_icon'  => 'fa-earth-asia',
        
        'feat_title' => 'Global Sourcing Network',
        'feat_text'  => 'Through strong partnerships with leading international brands and suppliers, we deliver innovative ingredient solutions to Indian manufacturers.',
    ],
    [
        'feat_icon'  => 'fa-handshake',
        'feat_title' => 'Nationwide Distribution',
        'feat_text'  => 'With extensive warehousing and a robust supply chain network, we ensure reliable delivery and support across India.',
    ],
];
?>

<div class="au2-story">
    <div class="au2-container">
        <div class="au2-story-grid">

            <!-- Image Stack -->
            <div class="au2-img-stack" data-aos="fade-right" data-aos-duration="800">
                <div class="au2-img-main image-animation">
                    <img src="<?php echo esc_url( $image_main ); ?>" alt="<?php echo esc_attr( $image_main_alt ); ?>" />
                </div>
                <div class="au2-img-float image-animation">
                    <img src="<?php echo esc_url( $image_small ); ?>" alt="<?php echo esc_attr( $image_small_alt ); ?>" />
                </div>
                <div class="au2-img-badge">
                    <i class="fa-solid fa-fire-flame-curved"></i> <?php echo esc_html( $badge_text ); ?>
                </div>
                <div class="au2-img-year"><?php echo esc_html( $year ); ?></div>
            </div>

            <!-- Text -->
            <div class="au2-story-text" data-aos="fade-left" data-aos-duration="800" data-aos-delay="100">
                <div class="eyebrow">
                    <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?>
                </div>
                <h3 class="section-heading">
                    <?php echo esc_html( $title ); ?><br />
                    <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                </h3>
                <p><?php echo esc_html( $description ); ?></p>

                <ul class="au2-feature-list">
                    <?php foreach ( $features as $i => $feat ) :
                        $delay = 140 + ( $i * 60 );
                    ?>
                        <li class="au2-feat-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                            <div class="au2-feat-icon">
                                <i class="fa-solid <?php echo esc_attr( $feat['feat_icon'] ); ?>"></i>
                            </div>
                            <div>
                                <div class="au2-feat-title"><?php echo esc_html( $feat['feat_title'] ); ?></div>
                                <p class="au2-feat-text"><?php echo esc_html( $feat['feat_text'] ); ?></p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                    <a href="<?php echo esc_url( $btn_url ); ?>" class="btn-default">
                        <?php echo esc_html( $btn_text ); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
