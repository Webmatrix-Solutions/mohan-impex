<?php
/**
 * About Us - History Section
 *
 * @package mohan-impex
 */

// Paste each image URL between the quotes when the portraits are ready.
$founder_image_url = '/wp-content/uploads/2026/09/founder_cropped.jpg';
$father_image_url  = '/wp-content/uploads/2026/07/ajay_khandelwal.jpg';
$avni_image_url    = '/wp-content/uploads/2026/07/avni_khandelwal.jpg';

$history_photo = static function( $image_url, $label ) {
    if ( $image_url ) {
        return '<div class="card-img-wrap"><img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $label ) . '" class="card-img"></div>';
    }

    return '<div class="card-img-wrap hs-photo-placeholder"><i class="fa-solid fa-image"></i><span>' . esc_html( $label ) . '</span></div>';
};
?>

<section class="hs bg-section" id="our-history">
    <div class="hs-backdrop"></div>
    <div class="hs-orb hs-orb-1"></div>
    <div class="hs-orb hs-orb-2"></div>
    <div class="hs-orb hs-orb-3"></div>

    <div class="container">
        <header class="hs-header">
            <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                <span class="eyebrow-line"></span>Our History<span class="eyebrow-line"></span>
            </div>
            <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                Three Generations, <span class="hero-highlight">One Legacy</span>
            </h2>
            <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">The people behind Mohan Impex.</p>
        </header>

        <div class="hs-timeline hs-static-timeline">
            <div class="hs-spine"></div>
            <div class="hs-spine-glow" id="hsSpineGlow"></div>

            <div class="hs-row row-left">
                <article class="hs-card" data-aos="fade-right" data-aos-duration="800" data-aos-offset="150">
                    <div class="card-corner-glow"></div>
                    <?php echo $history_photo( $founder_image_url, 'Founder photo' ); ?>
                    <div class="card-body">
                        <h3 class="card-title">Late Shri Shiv Shankarji Khandelwal<span class="hero-highlight">Founder</span></h3>
                        <p class="card-text hs-memorial">In loving memory</p>
                        <p class="card-text">Shri Shiv Shankarji Khandelwal founded Mohan Impex with nothing but grit, integrity, and a vision to build something lasting. From humble beginnings, he laid the foundation of trust that our name still carries today. His values continue to guide everything we do.</p>
                    </div>
                </article>
                <div class="hs-node" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600"><div class="node-outer"><div class="node-icon-wrap"><i class="fa-solid fa-seedling"></i></div></div></div>
            </div>

            <div class="hs-row row-right">
                <div class="hs-node" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600"><div class="node-outer"><div class="node-icon-wrap"><i class="fa-solid fa-building"></i></div></div></div>
                <article class="hs-card" data-aos="fade-left" data-aos-duration="800" data-aos-offset="150">
                    <div class="card-corner-glow"></div>
                    <?php echo $history_photo( $father_image_url, 'Second generation photo' ); ?>
                    <div class="card-body">
                        <h3 class="card-title">Ajay Khandelwal <span class="hero-highlight">- Building the Foundation</span></h3>
                        <p class="card-text hs-quote">&ldquo;Growth built brick by brick, relationship by relationship.&rdquo;</p>
                        <p class="card-text">[Father's Name] took his father's vision and scaled it - expanding our footprint across India and turning Mohan Impex into a trusted partner for some of the country's biggest names in food ingredients and FMCG. His discipline and long-term relationships remain the backbone of our business today.</p>
                    </div>
                </article>
            </div>

            <div class="hs-row row-left">
                <article class="hs-card" data-aos="fade-right" data-aos-duration="800" data-aos-offset="150">
                    <div class="card-corner-glow"></div>
                    <?php echo $history_photo( $avni_image_url, 'Avni photo' ); ?>
                    <div class="card-body">
                        <h3 class="card-title">Avni Khandelwal <span class="hero-highlight">- Driving the Next Chapter</span></h3>
                        <p class="card-text hs-quote">&ldquo;Legacy built the trust. Technology helps us scale it.&rdquo;</p>
                        <p class="card-text">As the third generation, I'm focused on building the systems behind our growth - bringing structured processes, automation, and data-driven decision-making into how we operate. From streamlined ERP systems to smarter, tech-enabled ways of working with our partners, my focus is on making Mohan Impex faster, more transparent, and future-ready while staying true to the trust the last two generations built.</p>
                    </div>
                </article>
                <div class="hs-node" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600"><div class="node-pulse"></div><div class="node-pulse node-pulse-2"></div><div class="node-outer"><div class="node-icon-wrap"><i class="fa-solid fa-lightbulb"></i></div></div></div>
            </div>
        </div>

        <div class="hs-legacy-note mt-5" data-aos="fade-up" data-aos-duration="800">
            <p>Three generations. One family. One promise of trust.</p>
            <span>From a foundation built on integrity, to relationships built on reliability, to systems built for the future: every chapter of Mohan Impex has been shaped by the same belief. Our partners' success is our success. As we look ahead, that promise only grows stronger.</span>
        </div>
    </div>
</section>
