<?php
/**
 * 404 Not Found template
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">

    <section class="page-banner">
        <div class="page-banner__bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> 404 Error Page
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Looks Like You've <span class="hero-highlight">Taken a Wrong Turn</span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    The page you're looking for isn't here, but what you need is just a click away.
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>404 Error Page</span>
            </div>
        </div>
    </section>

    <section class="bg-section">
        <div class="container">
            <div class="error-modern-shell" data-aos="fade-up" data-aos-duration="700">
                <div class="error-modern-main">
                    <div class="error-modern-heading">
                        <h1 class="error-modern-code" aria-label="404">
                            <span>4</span>
                            <span class="error-modern-zero"></span>
                            <span>4</span>
                        </h1>
                    </div>
                    <h3 class="error-modern-title">Looks like this page doesn't exist.</h3>
                    <p class="error-modern-text">
                        The page may have moved, been removed, or the link might be outdated.
                        Let us guide you back to the right place.
                    </p>
                    <div class="mt-4">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-default">Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>

