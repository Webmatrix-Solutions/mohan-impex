<?php
/**
 * Template Name: Our Team
 *
 * @package mohan-impex
 */

get_header();

$members     = get_field( 'team_page_members' );
$phil_icon   = get_field( 'team_phil_icon' )  ?: 'fa-handshake';
$phil_title  = get_field( 'team_phil_title' ) ?: 'Our Core Philosophy';
$phil_text   = get_field( 'team_phil_text' )  ?: 'Every partnership we build begins with a commitment — to quality, to trust, and to delivering the very best. We work directly with growers, manufacturers and distributors who share our values, ensuring every product that bears our name meets the highest standards.';
$pillars     = get_field( 'team_phil_pillars' ) ?: [
    [ 'pillar_icon' => 'fa-seedling', 'pillar_title' => 'Quality First',       'pillar_text' => 'Premium ingredients, rigorously sourced' ],
    [ 'pillar_icon' => 'fa-globe',    'pillar_title' => 'Global Network',       'pillar_text' => 'International partnerships, local expertise' ],
    [ 'pillar_icon' => 'fa-heart',    'pillar_title' => 'Built on Trust',       'pillar_text' => 'Relationships that have lasted decades' ],
];
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ─────────────────────────────────── -->
    <section class="page-banner">
        <div class="page-banner__bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> The People Behind Mohan Impex
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Meet Our <span class="hero-highlight">Leadership Team</span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    Decades of expertise, a shared vision — the people who drive Mohan Impex forward every day.
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Our Team</span>
            </div>
        </div>
    </section>

    <!-- ── Team Section ────────────────────────────────── -->
    <section class="oc-section">
        <div class="container position-relative">

            <!-- Team Grid -->
            <?php if ( ! empty( $members ) ) : ?>
                <div class="oc-grid">
                    <?php foreach ( $members as $i => $member ) :
                        $delay     = ( $i % 3 ) * 100;
                        $photo     = $member['tm_photo'];
                        $photo_url = is_array( $photo ) ? $photo['url'] : ( $photo ?: '' );
                        $photo_alt = is_array( $photo ) ? $photo['alt'] : esc_attr( $member['tm_name'] );
                        $dark_cls  = ( $i % 3 === 1 ) ? ' oc-card--dark' : '';
                    ?>
                        <div class="oc-card<?php echo esc_attr( $dark_cls ); ?>"
                             data-aos="fade-up"
                             data-aos-delay="<?php echo esc_attr( $delay ); ?>"
                             data-aos-duration="700">
                            <div class="oc-card__img-wrap">
                                <?php if ( $photo_url ) : ?>
                                    <img src="<?php echo esc_url( $photo_url ); ?>"
                                         alt="<?php echo esc_attr( $photo_alt ); ?>"
                                         class="oc-card__img">
                                <?php endif; ?>
                                <div class="oc-card__overlay"></div>
                                <?php if ( ! empty( $member['tm_badge'] ) ) : ?>
                                    <div class="oc-card__cuisine-badge">
                                        <?php echo esc_html( $member['tm_badge'] ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="oc-card__body">
                                <?php if ( ! empty( $member['tm_role'] ) ) : ?>
                                    <div class="oc-card__role"><?php echo esc_html( $member['tm_role'] ); ?></div>
                                <?php endif; ?>
                                <h4 class="oc-card__name"><?php echo esc_html( $member['tm_name'] ); ?></h4>
                                <?php if ( ! empty( $member['tm_bio'] ) ) : ?>
                                    <p class="oc-card__bio"><?php echo esc_html( $member['tm_bio'] ); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="oc-card__accent-line"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p style="text-align:center;padding:60px 0;color:#999;">Team members coming soon.</p>
            <?php endif; ?>

            

        </div>
    </section>

    <!-- ── CTA Section ─────────────────────────────────── -->
    <?php get_template_part( 'template-parts/about/cta' ); ?>

</main>

<?php get_footer(); ?>
