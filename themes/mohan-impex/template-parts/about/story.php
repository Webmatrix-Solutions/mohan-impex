<?php
/**
 * About Us — Story Section
 *
 * ACF Fields (block: acf/about-story):
 *   - about_story_eyebrow      (Text)
 *   - about_story_chapter      (Text)
 *   - about_story_title        (Text)
 *   - about_story_title_hl     (Text)
 *   - about_story_body_1       (Textarea)
 *   - about_story_body_2       (Textarea)
 *   - about_story_quote        (Textarea)
 *   - about_story_quote_attr   (Text)
 *   - about_story_img_top      (Image — returns array)
 *   - about_story_img_top_cap  (Text)
 *   - about_story_img_bot      (Image — returns array)
 *   - about_story_img_bot_cap  (Text)
 *
 * @package mohan-impex
 */

$img_base       = get_template_directory_uri() . '/assets/images/mohan-impex/';
$eyebrow        = get_field( 'about_story_eyebrow' )     ?: 'Chapter One';
$chapter        = get_field( 'about_story_chapter' )     ?: 'Chapter One';
$title          = get_field( 'about_story_title' )       ?: 'Born from';
$title_hl       = get_field( 'about_story_title_hl' )    ?: 'One Obsession';
$body_1         = get_field( 'about_story_body_1' )      ?: 'Mohan Impex began not with a business plan, but with a question: what if a company refused to compromise on a single thing? No substandard stock. No shortcuts. Just quality, skill, and the very best ingredients we could source.';
$body_2         = get_field( 'about_story_body_2' )      ?: 'In 1994, our founders opened a small shop in Burrabazar, Kolkata. The product range changed with the seasons. The commitment to quality never stopped. Within years, every partner trusted us unconditionally.';

$img_top_field  = get_field( 'about_story_img_top' );
$img_bot_field  = get_field( 'about_story_img_bot' );
$img_top_url    = is_array( $img_top_field ) ? $img_top_field['url'] : ( $img_top_field ?: $img_base . 'about-homepage.jpg' );
$img_top_alt    = is_array( $img_top_field ) ? $img_top_field['alt'] : 'About Mohan Impex';
$img_bot_url    = is_array( $img_bot_field ) ? $img_bot_field['url'] : ( $img_bot_field ?: $img_base . 'about-homepage-image-small.jpg' );
$img_bot_alt    = is_array( $img_bot_field ) ? $img_bot_field['alt'] : 'Mohan Impex Products';
$img_top_cap    = get_field( 'about_story_img_top_cap' ) ?: 'Mohan Impex — Est. 1994';
$img_bot_cap    = get_field( 'about_story_img_bot_cap' ) ?: 'Premium Ingredients, 2024';
?>

<section class="story" id="story">
    <div class="container">
        <div class="story-grid">

            <div class="story-text-side" data-aos="fade-right" data-aos-duration="900">
                <div>
                    <div class="eyebrow" data-aos="fade-up" data-aos-delay="80" data-aos-duration="650">
                        <span class="eyebrow-line"></span> <?php echo esc_html( $chapter ); ?>
                    </div>
                    <h2 class="section-heading" data-aos="fade-up" data-aos-delay="140" data-aos-duration="700">
                        <?php echo esc_html( $title ); ?><br>
                        <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                    </h2>
                    <p class="story-body" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <?php echo esc_html( $body_1 ); ?>
                    </p>
                    <p class="story-body" data-aos="fade-up" data-aos-delay="260" data-aos-duration="700">
                        <?php echo esc_html( $body_2 ); ?>
                    </p>
                    <a href="/our-gallery" class="btn-default btn-highlighted header2-reservation-btn" data-aos="fade-up" data-aos-delay="260" data-aos-duration="700">
                        View our Gallery             
                    </a>
                </div>
            </div>

            <div class="story-img-side" data-aos="fade-left" data-aos-duration="900">
                <div class="story-img-top image-animation" data-aos="zoom-in" data-aos-delay="160" data-aos-duration="700">
                    <img src="<?php echo esc_url( $img_top_url ); ?>" alt="<?php echo esc_attr( $img_top_alt ); ?>">
                    <div class="story-img-overlay"></div>
                    <span class="story-img-caption"><?php echo esc_html( $img_top_cap ); ?></span>
                </div>
                <div class="story-img-bot image-animation" data-aos="zoom-in" data-aos-delay="260" data-aos-duration="700">
                    <img src="<?php echo esc_url( $img_bot_url ); ?>" alt="<?php echo esc_attr( $img_bot_alt ); ?>">
                    <div class="story-img-overlay"></div>
                    <span class="story-img-caption"><?php echo esc_html( $img_bot_cap ); ?></span>
                </div>
            </div>

        </div>
    </div>
</section>
