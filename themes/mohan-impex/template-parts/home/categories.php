<?php
/**
 * Product Categories Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - categories_eyebrow   (Text)
 *   - categories_title     (Text)
 *   - categories_highlight (Text)  — the highlighted word in title
 *   - categories_desc      (Textarea)
 *   - categories_list      (Repeater: cat_name, cat_image [Image — returns array], cat_url [URL])
 *
 * @package mohan-impex
 */

$eyebrow   = get_field( 'categories_eyebrow' )   ?: 'Product Segments';
$title     = get_field( 'categories_title' )     ?: 'Explore Our';
$highlight = get_field( 'categories_highlight' ) ?: 'Categories';
$desc      = get_field( 'categories_desc' )      ?: 'From beverages to sweets — discover the wide range of quality food products we supply across India.';

$categories = get_field( 'categories_list' );

// Default categories if ACF not set
if ( ! $categories ) {
    $img_base   = get_template_directory_uri() . '/assets/images/mohan-impex/';
    $categories = [
        [ 'cat_name' => 'Beverages',           'cat_image' => $img_base . 'beverage.avif',      'cat_url' => '#' ],
        [ 'cat_name' => 'Biscuits',            'cat_image' => $img_base . 'cookies.avif',       'cat_url' => '#' ],
        [ 'cat_name' => 'Bread & Rusk',        'cat_image' => $img_base . 'breads.avif',        'cat_url' => '#' ],
        [ 'cat_name' => 'Candy & Confectionary','cat_image' => $img_base . 'confectionary.avif','cat_url' => '#' ],
        [ 'cat_name' => 'Cakes',               'cat_image' => $img_base . 'cakes.avif',         'cat_url' => '#' ],
        [ 'cat_name' => 'Cookies',             'cat_image' => $img_base . 'cookies.avif',       'cat_url' => '#' ],
        [ 'cat_name' => 'Dairy',               'cat_image' => 'https://picsum.photos/seed/dairy/400/300', 'cat_url' => '#' ],
        [ 'cat_name' => 'Ice Cream',           'cat_image' => $img_base . 'icecream.avif',      'cat_url' => '#' ],
        [ 'cat_name' => 'Noodles',             'cat_image' => $img_base . 'noodles.avif',       'cat_url' => '#' ],
        [ 'cat_name' => 'Snacks',              'cat_image' => $img_base . 'snacks.avif',        'cat_url' => '#' ],
        [ 'cat_name' => 'Sweets',              'cat_image' => $img_base . 'sweets.avif',        'cat_url' => '#' ],
    ];
}
?>

<section class="catv3-section" id="categories-section">
    <div class="container">
        <div class="catv3-heading" data-aos="fade-up" data-aos-duration="800">
            <div class="eyebrow">
                <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?><span class="eyebrow-line"></span>
            </div>
            <h2 class="section-heading">
                <?php echo esc_html( $title ); ?> <span class="hero-highlight"><?php echo esc_html( $highlight ); ?></span>
            </h2>
            <p><?php echo esc_html( $desc ); ?></p>
        </div>

        <div class="catv3-grid catv3-grid-uniform">
            <?php foreach ( $categories as $index => $cat ) :
                // ACF image field returns array; fallback is a plain URL string
                $img_url = is_array( $cat['cat_image'] ) ? $cat['cat_image']['url'] : $cat['cat_image'];
                $img_alt = is_array( $cat['cat_image'] ) ? $cat['cat_image']['alt'] : $cat['cat_name'];
                // ACF link field returns array {url, title, target}; fallback is plain string
                $link    = $cat['cat_url'];
                $href    = is_array( $link ) ? $link['url']    : $link;
                $target  = is_array( $link ) ? $link['target'] : '';
                $delay   = ( $index % 6 ) * 50;
            ?>
                <a href="<?php echo esc_url( $href ); ?>"
                   <?php if ( $target ) echo 'target="' . esc_attr( $target ) . '" rel="noopener noreferrer"'; ?>
                   class="catv3-card image-animation"
                   data-aos="zoom-in"
                   data-aos-duration="700"
                   data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                    <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $img_alt ); ?>" />
                    <div class="catv3-overlay"></div>
                    <div class="catv3-content">
                        <h3><?php echo esc_html( $cat['cat_name'] ); ?></h3>
                    </div>
                    <div class="catv3-arrow"><i class="fa-solid fa-arrow-right"></i></div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
