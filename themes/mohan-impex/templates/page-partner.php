<?php
/**
 * Template Name: Partner With Us
 *
 * @package mohan-impex
 */

get_header();

/* ── ACF fields with defaults ─── */
$tag         = get_field( 'pw_tag' )         ?: 'Join Our Network';
$title       = get_field( 'pw_title' )       ?: 'Partner With';
$title_hl    = get_field( 'pw_title_hl' )    ?: 'Mohan Impex';
$subtitle    = get_field( 'pw_subtitle' )    ?: 'Grow Your Business with a Trusted Food Ingredients Partner';
$desc        = get_field( 'pw_desc' )        ?: 'Join hands with Mohan Impex and gain access to premium-quality food ingredients, competitive pricing, reliable supply, and dedicated business support — whether you\'re a distributor, wholesaler, manufacturer, or exporter.';

$benefits = get_field( 'pw_benefits' ) ?: [
    [ 'pw_benefit' => 'Premium Quality Products' ],
    [ 'pw_benefit' => 'Competitive Wholesale Pricing' ],
    [ 'pw_benefit' => 'PAN India Supply Network' ],
    [ 'pw_benefit' => 'Timely & Reliable Delivery' ],
    [ 'pw_benefit' => 'Dedicated Business Support' ],
    [ 'pw_benefit' => 'OEM & Private Label Solutions' ],
];

$stat1_num = get_field( 'pw_stat1_num' ) ?: '30+';
$stat1_lbl = get_field( 'pw_stat1_lbl' ) ?: 'Years in Business';
$stat2_num = get_field( 'pw_stat2_num' ) ?: '500+';
$stat2_lbl = get_field( 'pw_stat2_lbl' ) ?: 'Active Partners';
$stat3_num = get_field( 'pw_stat3_num' ) ?: 'Pan';
$stat3_sfx = get_field( 'pw_stat3_sfx' ) ?: 'India';
$stat3_lbl = get_field( 'pw_stat3_lbl' ) ?: 'Distribution Reach';

/* ── Form processing ─── */
$form_success = false;
$form_error   = '';
$old          = [];

if (
    isset( $_POST['pw_nonce'] ) &&
    wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['pw_nonce'] ) ), 'pw_partner_form' )
) {
    $old['full_name']    = sanitize_text_field( wp_unslash( $_POST['pw_full_name']    ?? '' ) );
    $old['company']      = sanitize_text_field( wp_unslash( $_POST['pw_company']      ?? '' ) );
    $old['biz_type']     = sanitize_text_field( wp_unslash( $_POST['pw_biz_type']     ?? '' ) );
    $old['email']        = sanitize_email(       wp_unslash( $_POST['pw_email']        ?? '' ) );
    $old['mobile']       = sanitize_text_field( wp_unslash( $_POST['pw_mobile']       ?? '' ) );
    $old['city']         = sanitize_text_field( wp_unslash( $_POST['pw_city']         ?? '' ) );
    $old['products']     = array_map( 'sanitize_text_field', (array) ( $_POST['pw_products'] ?? [] ) );
    $old['monthly']      = sanitize_text_field( wp_unslash( $_POST['pw_monthly']      ?? '' ) );
    $old['message']      = sanitize_textarea_field( wp_unslash( $_POST['pw_message']  ?? '' ) );
    $old['privacy']      = isset( $_POST['pw_privacy'] );

    if ( ! $old['full_name'] || ! $old['company'] || ! $old['email'] || ! $old['mobile'] || ! $old['city'] ) {
        $form_error = 'Please fill in all required fields.';
    } elseif ( ! is_email( $old['email'] ) ) {
        $form_error = 'Please enter a valid email address.';
    } elseif ( ! $old['privacy'] ) {
        $form_error = 'Please agree to the Privacy Policy to continue.';
    } else {
        $products_str = ! empty( $old['products'] ) ? implode( ', ', $old['products'] ) : '—';
        $to      = get_option( 'admin_email' );
        $subject = "Partner Enquiry: {$old['full_name']} — {$old['company']}";
        $body    = "Full Name: {$old['full_name']}\n"
                 . "Company: {$old['company']}\n"
                 . "Business Type: {$old['biz_type']}\n"
                 . "Email: {$old['email']}\n"
                 . "Mobile: {$old['mobile']}\n"
                 . "City / State: {$old['city']}\n"
                 . "Products Interested In: {$products_str}\n"
                 . "Monthly Requirement: {$old['monthly']}\n"
                 . "Message:\n{$old['message']}";
        $headers = [ "Reply-To: {$old['full_name']} <{$old['email']}>" ];

        wp_mail( $to, $subject, $body, $headers );
        $form_success = true;
        $old = [];
    }
}

$product_options = [
    'Beverages', 'Biscuits', 'Bread & Rusk', 'Candy & Confectionary',
    'Cakes', 'Cookies', 'Dairy', 'Ice Cream', 'Noodles', 'Snacks', 'Sweets',
];
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ──────────────────────────────────────── -->
    <section class="page-banner">
        <div class="page-banner__bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> Business Partnerships
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Partner With <span class="hero-highlight">Mohan Impex</span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    Premium food ingredients. Reliable supply. Trusted by 500+ partners across India.
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Partner With Us</span>
            </div>
        </div>
    </section>

    <!-- ── Partner Section ──────────────────────────────────── -->
    <section class="pw-section">
        <div class="pw-wrap">

            <!-- LEFT: Info -->
            <div class="pw-left" data-aos="fade-right" data-aos-duration="900">
                <div class="pw-left-bg"></div>
                <div class="pw-left-ring pw-ring-1"></div>
                <div class="pw-left-ring pw-ring-2"></div>
                <div class="pw-left-inner">

                    <div class="pw-eyebrow" data-aos="fade-up" data-aos-delay="100" data-aos-duration="650">
                        <span class="eyebrow-line"></span> <?php echo esc_html( $tag ); ?>
                    </div>
                    <h2 class="pw-title" data-aos="fade-up" data-aos-delay="160" data-aos-duration="700">
                        <?php echo esc_html( $title ); ?><br>
                        <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                    </h2>
                    <p class="pw-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <?php echo esc_html( $subtitle ); ?>
                    </p>
                    <p class="pw-desc" data-aos="fade-up" data-aos-delay="240" data-aos-duration="700">
                        <?php echo esc_html( $desc ); ?>
                    </p>

                    <div class="pw-divider" data-aos="fade-up" data-aos-delay="260" data-aos-duration="600"></div>

                    <div class="pw-why-title" data-aos="fade-up" data-aos-delay="280" data-aos-duration="650">
                        Why Partner With Us?
                    </div>

                    <ul class="pw-benefits" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <?php foreach ( $benefits as $b ) : ?>
                            <li class="pw-benefit-item">
                                <span class="pw-check"><i class="fa-solid fa-circle-check"></i></span>
                                <?php echo esc_html( $b['pw_benefit'] ); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="pw-stats" data-aos="fade-up" data-aos-delay="360" data-aos-duration="700">
                        <div class="pw-stat">
                            <div class="pw-stat-num"><?php echo esc_html( $stat1_num ); ?></div>
                            <div class="pw-stat-lbl"><?php echo esc_html( $stat1_lbl ); ?></div>
                        </div>
                        <div class="pw-stat-divider"></div>
                        <div class="pw-stat">
                            <div class="pw-stat-num"><?php echo esc_html( $stat2_num ); ?></div>
                            <div class="pw-stat-lbl"><?php echo esc_html( $stat2_lbl ); ?></div>
                        </div>
                        <div class="pw-stat-divider"></div>
                        <div class="pw-stat">
                            <div class="pw-stat-num"><?php echo esc_html( $stat3_num ); ?><span><?php echo esc_html( $stat3_sfx ); ?></span></div>
                            <div class="pw-stat-lbl"><?php echo esc_html( $stat3_lbl ); ?></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT: Form -->
            <div class="pw-right" data-aos="fade-left" data-aos-delay="100" data-aos-duration="900">
                <div class="pw-form-card">
                    <div class="pw-form-head">
                        <div class="pw-form-title">Become Our Business Partner</div>
                        <div class="pw-form-sub">Fill in your details and our team will reach out within 1–2 business days.</div>
                    </div>

                    <?php if ( $form_success ) : ?>
                        <div class="cp-success-msg" role="alert">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <strong>Enquiry received!</strong><br>
                                Thank you for your interest. Our partnership team will contact you shortly.
                            </div>
                        </div>
                    <?php else : ?>

                        <?php if ( $form_error ) : ?>
                            <div class="cp-error-msg" role="alert">
                                <i class="fas fa-exclamation-circle"></i> <?php echo esc_html( $form_error ); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php the_permalink(); ?>" novalidate>
                            <?php wp_nonce_field( 'pw_partner_form', 'pw_nonce' ); ?>

                            <!-- Full Name -->
                            <div class="cp-field">
                                <div class="cp-label">Full Name <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_full_name"
                                           placeholder="e.g. Ramesh Sharma"
                                           value="<?php echo esc_attr( $old['full_name'] ?? '' ); ?>" required>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>

                            <!-- Company Name -->
                            <div class="cp-field">
                                <div class="cp-label">Company Name <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_company"
                                           placeholder="e.g. ABC Traders Pvt. Ltd."
                                           value="<?php echo esc_attr( $old['company'] ?? '' ); ?>" required>
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>

                            <!-- Business Type -->
                            <div class="cp-field">
                                <div class="cp-label">Business Type <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <select class="cp-input cp-select" name="pw_biz_type" required>
                                        <option value="" disabled <?php selected( empty( $old['biz_type'] ) ); ?>>Select business type…</option>
                                        <?php foreach ( [ 'Distributor', 'Wholesaler', 'Manufacturer', 'Exporter', 'Chain / Retail', 'Other' ] as $opt ) : ?>
                                            <option value="<?php echo esc_attr( $opt ); ?>"
                                                <?php selected( ( $old['biz_type'] ?? '' ), $opt ); ?>>
                                                <?php echo esc_html( $opt ); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <i class="fas fa-briefcase"></i>
                                </div>
                            </div>

                            <!-- Email + Mobile -->
                            <div class="cp-field-row">
                                <div class="cp-field">
                                    <div class="cp-label">Email Address <span class="pw-req">*</span></div>
                                    <div class="cp-input-wrap">
                                        <input class="cp-input" type="email" name="pw_email"
                                               placeholder="you@company.com"
                                               value="<?php echo esc_attr( $old['email'] ?? '' ); ?>" required>
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <div class="cp-label">Mobile Number <span class="pw-req">*</span></div>
                                    <div class="cp-input-wrap">
                                        <input class="cp-input" type="tel" name="pw_mobile"
                                               placeholder="+91 98765 43210"
                                               value="<?php echo esc_attr( $old['mobile'] ?? '' ); ?>" required>
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- City / State -->
                            <div class="cp-field">
                                <div class="cp-label">City / State <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_city"
                                           placeholder="e.g. Kolkata, West Bengal"
                                           value="<?php echo esc_attr( $old['city'] ?? '' ); ?>" required>
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>

                            <!-- Products Interested In -->
                            <div class="cp-field">
                                <div class="cp-label">Products Interested In</div>
                                <div class="pw-checkboxes">
                                    <?php foreach ( $product_options as $prod ) : ?>
                                        <label class="pw-check-label">
                                            <input type="checkbox" name="pw_products[]"
                                                   value="<?php echo esc_attr( $prod ); ?>"
                                                   <?php checked( in_array( $prod, $old['products'] ?? [], true ) ); ?>>
                                            <span><?php echo esc_html( $prod ); ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <!-- Monthly Requirement -->
                            <div class="cp-field">
                                <div class="cp-label">Monthly Requirement</div>
                                <div class="cp-input-wrap">
                                    <select class="cp-input cp-select" name="pw_monthly">
                                        <option value="" disabled <?php selected( empty( $old['monthly'] ) ); ?>>Select volume…</option>
                                        <?php foreach ( [ 'Above 1 Ton', '500 kg – 1 Ton', '100 kg – 500 kg', 'Below 100 kg', 'Not sure yet' ] as $opt ) : ?>
                                            <option value="<?php echo esc_attr( $opt ); ?>"
                                                <?php selected( ( $old['monthly'] ?? '' ), $opt ); ?>>
                                                <?php echo esc_html( $opt ); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <i class="fas fa-weight-hanging"></i>
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="cp-field">
                                <div class="cp-label">Message</div>
                                <div class="cp-input-wrap textarea-wrap">
                                    <textarea class="cp-input cp-textarea" name="pw_message"
                                              placeholder="Tell us more about your business or any specific requirements…"><?php echo esc_textarea( $old['message'] ?? '' ); ?></textarea>
                                    <i class="fas fa-comment-alt"></i>
                                </div>
                            </div>

                            <!-- Privacy -->
                            <label class="pw-privacy-row">
                                <input type="checkbox" name="pw_privacy" value="1"
                                       <?php checked( ! empty( $old['privacy'] ) ); ?> required>
                                <span>I agree to the <a href="<?php echo esc_url( get_privacy_policy_url() ?: '#' ); ?>" target="_blank">Privacy Policy</a></span>
                            </label>

                            <button type="submit" class="btn-default pw-submit-btn">
                                <span>Become a Partner</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>

                    <?php endif; ?>
                </div>
            </div>

        </div><!-- /.pw-wrap -->
    </section>

</main>

<?php get_footer(); ?>
