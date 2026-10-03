<?php
/**
 * History Timeline Section Partial
 *
 * Static content — to update, edit this file directly:
 *   template-parts/home/timeline.php
 *
 * @package mohan-impex
 */

if ( isset( $is_preview ) && $is_preview ) : ?>
    <div style="padding:20px 24px;background:#f0f4ff;border-left:4px solid #3b5bdb;font-family:sans-serif;border-radius:4px;">
        <strong style="font-size:13px;display:block;margin-bottom:4px;">Timeline Section</strong>
        <p style="margin:0;font-size:12px;color:#444;">This block is maintained in the codebase.<br>
        Edit: <code>template-parts/home/timeline.php</code></p>
    </div>
<?php return; endif;

$eyebrow     = 'Our Journey Since 1994';
$title       = 'Three Decades of';
$title_hl    = 'Growth, Innovation &amp; Trust';
$description = 'Established in 1994, Mohan Impex has grown into a leading supplier of premium food ingredients, bakery ingredients, and food additives. With three decades of expertise, innovation, and quality assurance, we proudly serve manufacturers, distributors, and businesses across India and international markets while maintaining the highest standards of reliability and customer satisfaction.
';

$milestones = [
    [ 'milestone_year' => '1994', 'milestone_icon' => 'fa-building',        'milestone_title' => 'Foundation Laid',              'milestone_text' => 'The Company began its operations in a small shop in Burrabazar, Kolkata.',                                                                  'milestone_active' => false ],
    [ 'milestone_year' => '2006', 'milestone_icon' => 'fa-building-columns','milestone_title' => 'Our First Office',             'milestone_text' => 'Shifted operations to a commercial office at Park Street, the heart of the city.',                                                         'milestone_active' => false ],
    [ 'milestone_year' => '2015', 'milestone_icon' => 'fa-chart-line',      'milestone_title' => 'A Century Milestone',          'milestone_text' => 'Touched Rs 100 crore turnover, a defining moment in our growth story.',                                                                   'milestone_active' => false ],
    [ 'milestone_year' => '2020', 'milestone_icon' => 'fa-map-location-dot','milestone_title' => 'Nationwide Expansion',         'milestone_text' => 'Extended our footprint across key markets in India, establishing a strong Pan India presence.',                                           'milestone_active' => false ],
    [ 'milestone_year' => '2021', 'milestone_icon' => 'fa-globe',           'milestone_title' => 'Evolving our Identity',        'milestone_text' => 'Introduced a refreshed logo, marking a new phase in our brand evolution and growth journey.',                                            'milestone_active' => false ],
    [ 'milestone_year' => '2022', 'milestone_icon' => 'fa-landmark',        'milestone_title' => 'Manufacturing and R&D Facility','milestone_text' => 'Started in-house manufacturing, enabling innovation, quality assurance and sustainable expansion.',                                     'milestone_active' => false ],
    [ 'milestone_year' => '2025', 'milestone_icon' => 'fa-globe',           'milestone_title' => 'Global Expansion',             'milestone_text' => 'The Company established its international presence with operations in Dubai.',                                                            'milestone_active' => false ],
    [ 'milestone_year' => '2026', 'milestone_icon' => 'fa-landmark',        'milestone_title' => 'Expanding our Manufactuing footprint',         'milestone_text' => 'A state-of-the-art facility designed to strengthen our capabilities, scale production, and support the growing needs of our customers.',                  'milestone_active' => true  ],
];
?>

<section class="mi-history-section" id="our-history">
    <div class="container">

        <div class="mi-history-header" data-aos="fade-up" data-aos-duration="600">
            <div class="eyebrow">
                <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?><span class="eyebrow-line"></span>
            </div>
            <h2 class="section-heading">
                <?php echo esc_html( $title ); ?> <span class="hero-highlight"><?php echo wp_kses_post( $title_hl ); ?></span>
            </h2>
            <p class="mi-history-desc"><?php echo esc_html( $description ); ?></p>
        </div>

        <div class="mi-timeline-wrap">
            <div class="mi-timeline-track">
                <div class="mi-timeline-line"></div>

                <?php foreach ( $milestones as $i => $m ) :
                    $position = ( $i % 2 === 0 ) ? 'mi-top' : 'mi-bottom';
                    $delay    = $i * 100;
                    $is_active = ! empty( $m['milestone_active'] );
                ?>

                    <div class="mi-milestone <?php echo esc_attr( $position ); ?>" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo esc_attr( $delay ); ?>">

                        <?php if ( $position === 'mi-top' ) : ?>
                            <div class="mi-card">
                                <div class="mi-card-icon"><i class="fa-solid <?php echo esc_attr( $m['milestone_icon'] ); ?>"></i></div>
                                <h4 class="mi-card-title"><?php echo esc_html( $m['milestone_title'] ); ?></h4>
                                <p class="mi-card-text"><?php echo esc_html( $m['milestone_text'] ); ?></p>
                            </div>
                            <div class="mi-connector mi-connector-down"></div>
                            <div class="mi-node<?php echo $is_active ? ' mi-node-active' : ''; ?>">
                                <?php if ( $is_active ) : ?>
                                    <div class="mi-node-pulse"></div>
                                    <div class="mi-node-pulse mi-node-pulse-2"></div>
                                <?php endif; ?>
                                <div class="mi-node-inner"><span><?php echo esc_html( $m['milestone_year'] ); ?></span></div>
                            </div>
                        <?php else : ?>
                            <div class="mi-node<?php echo $is_active ? ' mi-node-active' : ''; ?>">
                                <?php if ( $is_active ) : ?>
                                    <div class="mi-node-pulse"></div>
                                    <div class="mi-node-pulse mi-node-pulse-2"></div>
                                <?php endif; ?>
                                <div class="mi-node-inner"><span><?php echo esc_html( $m['milestone_year'] ); ?></span></div>
                            </div>
                            <div class="mi-connector mi-connector-up"></div>
                            <div class="mi-card">
                                <div class="mi-card-icon"><i class="fa-solid <?php echo esc_attr( $m['milestone_icon'] ); ?>"></i></div>
                                <h4 class="mi-card-title"><?php echo esc_html( $m['milestone_title'] ); ?></h4>
                                <p class="mi-card-text"><?php echo esc_html( $m['milestone_text'] ); ?></p>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </div>
</section>
