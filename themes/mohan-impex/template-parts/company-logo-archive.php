<?php
/**
 * Shared archive layout for logo-only company listings.
 *
 * @package mohan-impex
 */

global $wp_query;

$queried_object = get_queried_object();
$post_type = $queried_object instanceof WP_Post_Type ? $queried_object->name : get_query_var( 'post_type' );
$is_principal = 'principal_company' === $post_type;
$title = $is_principal ? 'Principal Companies' : 'Our Branded Partners';
$eyebrow = $is_principal ? 'Our Principals' : 'Our Network';
$description = $is_principal
    ? 'The companies and brands we proudly represent.'
    : 'The brands that trust us as their distribution partner.';
$paged = max( 1, get_query_var( 'paged' ) );
$max_pages = (int) $wp_query->max_num_pages;
?>

<main class="site-main company-archive" id="main">
    <section class="page-banner company-archive__hero">
        <div class="shop-hero-bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow"><span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?></div>
                <h1 class="section-heading"><?php echo esc_html( $title ); ?></h1>
                <p><?php echo esc_html( $description ); ?></p>
            </div>
        </div>
    </section>

    <section class="company-archive__listing">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="company-logo-grid" data-company-logo-grid>
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        mohan_impex_render_company_logo_card( get_the_ID() );
                    endwhile;
                    ?>
                </div>

                <?php if ( $paged < $max_pages ) : ?>
                    <div class="company-logo-load-more">
                        <a class="btn-default btn-pill"
                           href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>"
                           data-company-load-more
                           data-post-type="<?php echo esc_attr( $post_type ); ?>"
                           data-next-page="<?php echo esc_attr( $paged + 1 ); ?>">
                            Load More
                        </a>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <p class="company-archive__empty">No companies have been added yet.</p>
            <?php endif; ?>
        </div>
    </section>
</main>
