<?php
/**
 * Hero Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - hero_badge_text        (Text)
 *   - hero_title_line1       (Text)
 *   - hero_title_outline     (Text)
 *   - hero_title_script      (Text)
 *   - hero_description       (Textarea)
 *   - hero_btn1_text         (Text)
 *   - hero_btn1_url          (URL)
 *   - hero_btn2_text         (Text)
 *   - hero_btn2_url          (URL)
 *   - hero_video             (File — returns URL)
 *   - hero_card1_tag         (Text)
 *   - hero_card1_title       (Text)
 *   - hero_card1_text        (Textarea)
 *   - hero_card2_number      (Text)
 *   - hero_card2_text        (Textarea)
 *   - hero_card3_number      (Text)
 *   - hero_card3_text        (Textarea)
 *   - hero_stats             (Repeater: stat_number, stat_label)
 *
 * @package mohan-impex
 */

// When rendered as an ACF Block, $block is available and get_field() reads block data.
// When included via get_template_part() on front-page.php, $block is not set and defaults are used.
$_acf = function_exists( 'get_field' );

$badge_text    = ( $_acf ? get_field( 'hero_badge_text' )    : null ) ?: 'Lorem ipsum dolor sit amet consectetur';
$title_line1   = ( $_acf ? get_field( 'hero_title_line1' )   : null ) ?: 'Supplying Quality';
$title_outline = ( $_acf ? get_field( 'hero_title_outline' ) : null ) ?: 'Building';
$title_script  = ( $_acf ? get_field( 'hero_title_script' )  : null ) ?: 'Trust';
$description   = ( $_acf ? get_field( 'hero_description' )   : null ) ?: 'Tortor nisl eu dictum penatibus netus ante bibendum placerat maecenas, vulputate integer massa duis pulvinar tempus ultrices';
$btn1_text     = ( $_acf ? get_field( 'hero_btn1_text' )     : null ) ?: 'Explore Products';
$btn1_url      = ( $_acf ? get_field( 'hero_btn1_url' )      : null ) ?: '#';
$btn2_text     = ( $_acf ? get_field( 'hero_btn2_text' )     : null ) ?: 'Contact Us';
$btn2_url      = ( $_acf ? get_field( 'hero_btn2_url' )      : null ) ?: '#';
$video_url     = ( $_acf ? get_field( 'hero_video' )         : null ) ?: get_template_directory_uri() . '/assets/images/mohan-impex/hero-feature-video.mp4';

$card1_tag   = ( $_acf ? get_field( 'hero_card1_tag' )   : null ) ?: '';
$card1_title = ( $_acf ? get_field( 'hero_card1_title' ) : null ) ?: 'Supplying Quality, Building Trust Since 1994';
$card1_text  = ( $_acf ? get_field( 'hero_card1_text' )  : null ) ?: 'Leading supplier of food ingredients, bakery solutions and specialty products.';

$card2_number = ( $_acf ? get_field( 'hero_card2_number' ) : null ) ?: '5000+';
$card2_text   = ( $_acf ? get_field( 'hero_card2_text' )   : null ) ?: 'Customers served successfully with dedicated support, quality assurance and industry expertise.';

$card3_number = ( $_acf ? get_field( 'hero_card3_number' ) : null ) ?: '1500+';
$card3_text   = ( $_acf ? get_field( 'hero_card3_text' )   : null ) ?: 'Distribution points nationwide backed by warehousing and a robust supply chain network.';

$stats = ( $_acf ? get_field( 'hero_stats' ) : null ) ?: [
    [ 'stat_number' => '6000+',        'stat_label' => 'Tons Monthly Order fulfilled' ],
    [ 'stat_number' => '5000+',        'stat_label' => 'Customers Served Successfully' ],
    [ 'stat_number' => '1.5L + Sq.Ft', 'stat_label' => 'Pan-India Warehousing' ],
    [ 'stat_number' => '2000+',        'stat_label' => 'Customer Support' ],
    [ 'stat_number' => '1500+',        'stat_label' => 'Distribution Points Nationwide' ],
];
?>

<section class="hero2-section" id="hero2">
    <div class="hero2-video-wrap">
        <video autoplay muted loop playsinline class="hero2-video">
            <source src="<?php echo esc_url( $video_url ); ?>" type="video/mp4" />
        </video>
    </div>
    <div class="hero2-overlay-dark"></div>
    <div class="hero2-overlay-gradient"></div>
    <div class="hero2-grid-overlay"></div>

    <div class="container">
        <div class="row align-items-center hero2-row">

            <!-- Left Content -->
            <div class="col-lg-7">
                <div class="hero2-content" data-aos="fade-up" data-aos-duration="1000">
                    <span class="hero2-badge">
                        <!--<span class="hero2-badge-dot"></span>-->
                        <?php echo esc_html( $badge_text ); ?>
                    </span>
                    <h1 class="hero2-title">
                        <?php echo esc_html( $title_line1 ); ?>
                        <span class="hero2-outline-text"><?php echo esc_html( $title_outline ); ?></span><br />
                        <span class="hero2-script"><?php echo esc_html( $title_script ); ?></span>
                    </h1>
                    <p class="hero2-desc"><?php echo esc_html( $description ); ?></p>
                    <div class="hero2-actions">
                        <a href="<?php echo esc_url( $btn1_url ); ?>" class="btn-default btn-highlighted">
                            <?php echo esc_html( $btn1_text ); ?>
                        </a>
                        <!--<a href="<?php echo esc_url( $btn2_url ); ?>" class="hero2-btn-glass">-->
                        <!--    <i class="fa-solid fa-calendar-check"></i>-->
                        <!--    <?php echo esc_html( $btn2_text ); ?>-->
                        <!--</a>-->
                    </div>
                </div>
            </div>

            <!-- Right Side Cards -->
            <div class="col-lg-5">
                <div class="hero2-ui-wrap" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="hero2-card hero2-card-special">
                        <!--<span class="hero2-card-tag"><?php echo esc_html( $card1_tag ); ?></span>-->
                        <h4><?php echo esc_html( $card1_title ); ?></h4>
                        <p><?php echo esc_html( $card1_text ); ?></p>
                    </div>
                    <div class="hero2-card hero2-card-rating">
                        <div class="hero2-rating-top">
                            <div class="hero2-stars"><i class="fa-solid fa-users"></i></div>
                            <span><?php echo esc_html( $card2_number ); ?></span>
                        </div>
                        <p><?php echo esc_html( $card2_text ); ?></p>
                    </div>
                    <div class="hero2-card hero2-card-delivery">
                        <div class="hero2-delivery-box">
                            <div class="hero2-delivery-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div>
                                <h6><?php echo esc_html( $card3_number ); ?></h6>
                                <p><?php echo esc_html( $card3_text ); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Stats Bar -->
        <div class="hero2-stats">
            <?php foreach ( $stats as $stat ) : ?>
                <div class="hero2-stat-box">
                    <h3><?php echo esc_html( $stat['stat_number'] ); ?></h3>
                    <p><?php echo esc_html( $stat['stat_label'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <a href="#categories-section" class="hero2-scroll"><span></span></a>
</section>
