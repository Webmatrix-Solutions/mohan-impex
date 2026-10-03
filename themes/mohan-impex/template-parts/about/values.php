<?php
/**
 * About Us - Values Section
 *
 * ACF Fields (block: acf/about-values):
 *   - about_values_eyebrow (Text)
 *   - about_values_title (Text)
 *   - about_values_title_hl (Text)
 *   - about_values_description (Textarea)
 *   - about_values_items (Repeater)
 *       - title (Text)
 *       - description (Textarea)
 *       - icon (Text - Font Awesome class)
 *       - link_text (Text)
 *       - link_url (URL)
 *
 * @package mohan-impex
 */

$title       = get_field( 'about_values_title' ) ?: 'Our Values Define';
$items       = get_field( 'about_values_items' );

if ( empty( $items ) ) {
    $items = [
        [
            'title'       => 'Uncompromising Quality',
            'description' => 'We source products from trusted suppliers and maintain high standards at every stage. Quality is not a policy; it is an obsession.',
            'icon'        => 'fa-medal',
        ],
        [
            'title'       => 'Reliable Sourcing',
            'description' => 'Our network and experience help businesses access the products they need, when they need them, with complete confidence.',
            'icon'        => 'fa-seedling',
        ],
        [
            'title'       => 'Responsible Growth',
            'description' => 'We build long-term relationships through transparent practices, thoughtful choices, and mutual respect for every partner.',
            'icon'        => 'fa-leaf',
        ],
        [
            'title'       => 'Forward Thinking',
            'description' => 'We adapt to changing markets and explore better ways to serve our partners without compromising on what matters.',
            'icon'        => 'fa-lightbulb',
        ],
    ];
}
?>

<section class="au2-values">
    <div class="container au2-container">
        <div class="au2-values-head" data-aos="fade-up" data-aos-duration="700">
            <div>
                <h2 class="section-heading text-white mb-2">
                    <?php echo esc_html( $title ); ?><br>
                    <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                </h2>
            </div>
        </div>

        <div class="au2-values-grid">
            <?php foreach ( $items as $index => $item ) :
                $item_title       = $item['title'] ?? '';
                $item_description = $item['description'] ?? '';
                $icon_fallbacks   = [
                    'Reliability, Even When It Mattered Most' => 'fa-shield-halved',
                    'A Trusted Trade Partner, Nationwide'     => 'fa-map-location-dot',
                    'Global Reach'                            => 'fa-earth-americas',
                    'Recognized by the Best'                  => 'fa-award',
                ];
                $item_icon        = $item['icon'] ?? ( $icon_fallbacks[ $item_title ] ?? [ 'fa-shield-halved', 'fa-map-location-dot', 'fa-earth-americas', 'fa-award' ][ $index % 4 ] );
            ?>
                <article class="au2-val-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="<?php echo esc_attr( $index * 80 ); ?>">
                    <div class="au2-vc-icon"><i class="fa-solid <?php echo esc_attr( $item_icon ); ?>"></i></div>
                    <h3 class="au2-vc-title"><?php echo esc_html( $item_title ); ?></h3>
                    <p class="au2-vc-text"><?php echo esc_html( $item_description ); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
