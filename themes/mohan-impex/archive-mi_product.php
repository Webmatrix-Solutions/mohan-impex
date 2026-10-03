<?php
/**
 * Archive Template: Products
 *
 * @package mohan-impex
 */

get_header();

$total = wp_count_posts( 'mi_product' )->publish;
?>

<main class="site-main" id="main">

    <!-- ── Archive Hero ─────────────────────────────────── -->
    <section class="shop-hero">
        <div class="shop-hero-bg"></div>
        <div class="container">
            <div class="shop-hero-inner">
                <div>
                    <div class="eyebrow"><span class="eyebrow-line"></span>Our Products</div>
                    <h1 class="section-heading text-white">
                        Explore Our<br>Product <span class="hero-highlight">Range</span>
                    </h1>
                </div>
                <div class="shop-hero-right">
                    <div class="shop-hero-stats">
                        <div class="hs-item">
                            <div class="hs-num"><?php echo esc_html( $total ); ?><span>+</span></div>
                            <div class="hs-lbl">Products</div>
                        </div>
                        <div class="hs-item">
                            <div class="hs-num">30<span>+</span></div>
                            <div class="hs-lbl">Brands</div>
                        </div>
                        <div class="hs-item">
                            <div class="hs-num">Pan<span> India</span></div>
                            <div class="hs-lbl">Coverage</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-hero-stripe"></div>
    </section>

    <!-- ── Products Grid ─────────────────────────────────── -->
    <div class="ps-archive-wrap">
        <div class="container">

            <?php
            $cats = get_terms( [ 'taxonomy' => 'mi_product_cat', 'hide_empty' => true ] );
            if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) : ?>
                <div class="ps-filter-tabs" data-aos="fade-up" data-aos-duration="600">
                    <button class="ps-tab active" data-filter="all">All</button>
                    <?php foreach ( $cats as $cat ) : ?>
                        <button class="ps-tab" data-filter="<?php echo esc_attr( $cat->slug ); ?>">
                            <?php echo esc_html( $cat->name ); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( have_posts() ) : ?>
                <div class="products-grid" id="productsGrid">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/mi-product/card', null, [
                            'post_id'      => get_the_ID(),
                            'archive_card' => true,
                        ] );
                    endwhile;
                    ?>
                </div>

                <?php
                $paged        = max( 1, get_query_var( 'paged' ) );
                $max_pages    = (int) $wp_query->max_num_pages;
                if ( $max_pages > 1 && $paged < $max_pages ) : ?>
                    <div class="ps-load-more-wrap" style="text-align:center;margin-top:48px;">
                        <a href="<?php echo esc_url( next_posts( $max_pages, false ) ); ?>"
                           class="btn-default btn-pill ps-load-more" id="psLoadMore">
                            Load More
                        </a>
                    </div>
                <?php endif; ?>

            <?php else : ?>
                <div class="ps-no-results">
                    <p>No products found. Check back soon.</p>
                </div>
            <?php endif; ?>

        </div>
    </div>

</main>

<?php get_footer(); ?>
