<?php
/**
 * FAQ Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - faq_eyebrow         (Text)
 *   - faq_title           (Text)
 *   - faq_title_hl        (Text)
 *   - faq_description     (Textarea)
 *   - faq_contact_url     (URL)
 *   - faq_items           (Repeater: faq_icon [Text — FA class],
 *                                    faq_question [Text],
 *                                    faq_answer [Wysiwyg / Textarea])
 *
 * @package mohan-impex
 */

$eyebrow     = get_field( 'faq_eyebrow' )     ?: 'FAQ';
$title       = get_field( 'faq_title' )       ?: 'Got a Question?';
$title_hl    = get_field( 'faq_title_hl' )    ?: 'We Have the Answer.';
$description = get_field( 'faq_description' ) ?: 'Everything you need to know about Mohan Impex — from our products and sourcing to delivery and support.';
$contact_url = get_field( 'faq_contact_url' ) ?: '#';

$faq_items = get_field( 'faq_items' ) ?: [
    [ 'faq_icon' => 'fa-box-open',    'faq_question' => 'What products does Mohan Impex supply?',          'faq_answer' => 'We supply a wide range of FMCG food products including beverages, biscuits, bread & rusk, candy, cakes, cookies, dairy, ice cream, noodles, snacks and sweets.' ],
    [ 'faq_icon' => 'fa-truck-fast',  'faq_question' => 'What is your delivery and distribution network?', 'faq_answer' => 'We have 1500+ distribution points nationwide backed by extensive Pan-India warehousing and a robust supply chain network.' ],
    [ 'faq_icon' => 'fa-seedling',    'faq_question' => 'Do you source products internationally?',         'faq_answer' => 'Yes. Through strong partnerships with leading international brands and suppliers, we deliver innovative ingredient solutions to Indian manufacturers. We also have operations in Dubai.' ],
    [ 'faq_icon' => 'fa-award',       'faq_question' => 'What quality standards do you follow?',           'faq_answer' => 'We adhere to FSSAI licensing, labelling norms, and quality certifications applicable to food ingredient distributors operating in India.' ],
    [ 'faq_icon' => 'fa-handshake',   'faq_question' => 'How can I become a distribution partner?',        'faq_answer' => 'Please contact our team directly through the Contact Us page. We review partnership requests and will get back to you within 2 business days.' ],
    [ 'faq_icon' => 'fa-headset',     'faq_question' => 'How do I reach customer support?',                'faq_answer' => 'You can reach us at our Head Office (Kolkata) on +91 90511 55513 or at our Showroom on +91 90511 55587. You can also email customercarea@mohanimpex.com.' ],
];
?>

<section class="faq2-section" id="faq">
    <div class="faq2-container">
        <div class="faq2-main">

            <!-- Left Panel -->
            <div class="faq2-left">
                <div class="faq2-left-stripe"></div>
                <div class="faq2-ring faq2-r1"></div>
                <div class="faq2-ring faq2-r2"></div>
                <div class="faq2-ring faq2-r3"></div>
                <div class="faq2-left-inner">
                    <div class="eyebrow" data-aos="fade-right" data-aos-duration="600">
                        <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?>
                    </div>
                    <h2 class="section-heading text-white" data-aos="fade-up" data-aos-duration="700" data-aos-delay="80">
                        <?php echo esc_html( $title ); ?><br />
                        <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                    </h2>
                    <p class="mb-5" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                        <?php echo esc_html( $description ); ?>
                    </p>
                    <div class="faq2-stat-pills" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <div class="faq2-stat-pill">
                            <div class="faq2-sp-icon"><i class="fa-solid fa-circle-question"></i></div>
                            <div class="faq2-sp-text"><?php echo esc_html( count( $faq_items ) ); ?> Questions<span>Answered</span></div>
                        </div>
                        <div class="faq2-stat-pill">
                            <div class="faq2-sp-icon"><i class="fa-solid fa-bolt"></i></div>
                            <div class="faq2-sp-text">Instant Answers<span>No waiting</span></div>
                        </div>
                        <div class="faq2-stat-pill">
                            <div class="faq2-sp-icon"><i class="fa-solid fa-headset"></i></div>
                            <div class="faq2-sp-text">24 / 7 Support<span>Always here</span></div>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( $contact_url ); ?>" class="faq2-contact-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="260">
                        <div class="faq2-cc-icon"><i class="fa-solid fa-headset"></i></div>
                        <div>
                            <div class="faq2-cc-title">Still have questions?</div>
                            <div class="faq2-cc-sub">Our team responds within 2 hours on weekdays.</div>
                            <div class="faq2-cc-link">Contact Support <i class="fa-solid fa-arrow-right"></i></div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Right: Accordion -->
            <div class="faq2-right">
                <div class="faq2-accordion" data-aos="fade-up" data-aos-duration="700" data-aos-delay="60">
                    <?php foreach ( $faq_items as $i => $item ) :
                        $num = str_pad( $i + 1, 2, '0', STR_PAD_LEFT );
                        $id  = 'faq2-q' . ( $i + 1 );
                    ?>
                        <div class="faq2-item">
                            <span class="faq2-item-num"><?php echo esc_html( $num ); ?></span>
                            <input type="checkbox" id="<?php echo esc_attr( $id ); ?>" name="faq2-accordion" />
                            <label class="faq2-question" for="<?php echo esc_attr( $id ); ?>">
                                <div class="faq2-q-icon">
                                    <i class="fa-solid <?php echo esc_attr( $item['faq_icon'] ); ?>"></i>
                                </div>
                                <span class="faq2-q-text"><?php echo esc_html( $item['faq_question'] ); ?></span>
                                <div class="faq2-toggle"><i class="fa-solid fa-plus"></i></div>
                            </label>
                            <div class="faq2-answer">
                                <div class="faq2-answer-inner">
                                    <p class="faq2-answer-text"><?php echo wp_kses_post( $item['faq_answer'] ); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
