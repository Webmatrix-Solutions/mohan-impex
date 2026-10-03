<?php
/**
 * 500 Internal Server Error template
 *
 * Note: WordPress does not natively route 500 errors to this file.
 * To use it, configure your server (Apache/Nginx) to serve this file
 * on 500 errors, or call it from a custom error handler.
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
                    <span class="eyebrow-line"></span> 500 Server Error
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Something Went <span class="hero-highlight">Wrong on Our End</span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    Our servers hit an unexpected snag. We're already on it — please try again in a moment.
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>500 Server Error</span>
            </div>
        </div>
    </section>

    <section class="bg-section">
        <div class="container">
            <div class="error-modern-shell" data-aos="fade-up" data-aos-duration="700">
                <div class="error-modern-main">
                    <div class="error-modern-heading">
                        <h1 class="error-modern-code" aria-label="500">
                            <span>5</span>
                            <span class="error-modern-zero"></span>
                            <span>0</span>
                        </h1>
                    </div>
                    <h3 class="error-modern-title">Internal Server Error.</h3>
                    <p class="error-modern-text">
                        An unexpected error occurred on our server. This is not your fault —
                        our team has been notified. Please try again shortly or return to the homepage.
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
