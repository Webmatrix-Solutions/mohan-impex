<?php
/**
 * Template Name: Gallery
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    
    <!-- ── Page Hero ──────────────────────────────────────── -->
    <section class="shop-hero">
        <div class="shop-hero-bg"></div>
        <div class="container">
            <div class="shop-hero-inner">
                <div>
                    <div class="eyebrow"><span class="eyebrow-line"></span>Our Gallery</div>
                    <h1 class="section-heading text-white">
                        A Visual<br>Story in <span class="hero-highlight">Images</span>
                    </h1>
                </div>
            </div>
        </div>
        <div class="shop-hero-stripe"></div>
    </section>
    
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>