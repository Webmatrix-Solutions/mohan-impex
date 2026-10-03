<?php
/**
 * Template Name: FAQs
 *
 * @package mohan-impex
 */

get_header();

$eyebrow     = get_field( 'faq_page_eyebrow' )     ?: 'Frequently Asked Questions';
$title       = get_field( 'faq_page_title' )       ?: 'Got a Question?';
$title_hl    = get_field( 'faq_page_title_hl' )    ?: 'We Have the Answer.';
$description = get_field( 'faq_page_description' ) ?: 'Everything you need to know about Mohan Impex — from our products and sourcing to delivery and support.';
$faq_items   = get_field( 'faq_page_items' ) ?: [];
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ─────────────────────────────────── -->
    <section class="page-banner">
        <div class="page-banner__bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> <?php echo esc_html( $eyebrow ); ?>
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <?php echo esc_html( $title ); ?> <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <?php echo esc_html( $description ); ?>
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>FAQs</span>
            </div>
        </div>
    </section>

    <!-- ── FAQ Accordion ───────────────────────────────── -->
    <section class="faq-page-section">
        <div class="container">
            <div class="faq-page-wrap" data-aos="fade-up" data-aos-duration="700">

                <?php if ( ! empty( $faq_items ) ) : ?>
                    <div class="faq-list">
                        <?php foreach ( $faq_items as $i => $item ) :
                            $num = $i + 1;
                        ?>
                            <div class="faq-item">
                                <div class="faq-question js-faq-toggle">
                                    <div class="faq-q-num"><?php echo esc_html( $num ); ?></div>
                                    <div class="faq-q-text"><?php echo esc_html( $item['faq_page_question'] ); ?></div>
                                    <div class="faq-chevron"><i class="fa-solid fa-chevron-down"></i></div>
                                </div>
                                <div class="faq-answer" style="max-height:0;">
                                    <div class="faq-answer-inner">
                                        <p><?php echo wp_kses_post( $item['faq_page_answer'] ); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p style="text-align:center;padding:60px 0;color:#999;">No FAQs found.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- ── CTA Section ─────────────────────────────────── -->
    <?php get_template_part( 'template-parts/about/cta' ); ?>

</main>

<script>
document.querySelectorAll('.js-faq-toggle').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var item   = this.closest('.faq-item');
        var answer = item.querySelector('.faq-answer');
        var isOpen = item.classList.contains('open');

        // Close all
        document.querySelectorAll('.faq-item.open').forEach(function(el) {
            el.classList.remove('open');
            el.querySelector('.faq-answer').style.maxHeight = '0';
        });

        // Open clicked if it was closed
        if (!isOpen) {
            item.classList.add('open');
            answer.style.maxHeight = answer.scrollHeight + 'px';
        }
    });
});
</script>

<?php get_footer(); ?>
