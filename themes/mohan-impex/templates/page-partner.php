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
    $old['customer_name']   = sanitize_text_field( wp_unslash( $_POST['pw_customer_name']   ?? '' ) );
    $old['organization']    = sanitize_text_field( wp_unslash( $_POST['pw_organization']    ?? '' ) );
    $old['address']         = sanitize_textarea_field( wp_unslash( $_POST['pw_address']     ?? '' ) );
    $old['landmark']        = sanitize_text_field( wp_unslash( $_POST['pw_landmark']        ?? '' ) );
    $old['country']         = 'India';
    $old['district']        = sanitize_text_field( wp_unslash( $_POST['pw_district']       ?? '' ) );
    $old['pincode']         = sanitize_text_field( wp_unslash( $_POST['pw_pincode']        ?? '' ) );
    $old['email']           = sanitize_email(       wp_unslash( $_POST['pw_email']          ?? '' ) );
    $old['mobile']          = sanitize_text_field( wp_unslash( $_POST['pw_mobile']         ?? '' ) );
    $old['lead_type']       = sanitize_text_field( wp_unslash( $_POST['pw_lead_type']      ?? '' ) );
    $old['qty_required']    = sanitize_text_field( wp_unslash( $_POST['pw_qty_required']    ?? '' ) );
    $old['products']        = array_map( 'sanitize_text_field', (array) ( $_POST['pw_products'] ?? [] ) );
    $old['message']         = sanitize_textarea_field( wp_unslash( $_POST['pw_message']     ?? '' ) );
    $old['privacy']         = isset( $_POST['pw_privacy'] );

    if ( ! $old['customer_name'] || ! $old['organization'] || ! $old['address'] || ! $old['district'] || ! $old['pincode'] || ! $old['email'] || ! $old['mobile'] || ! $old['lead_type'] ) {
        $form_error = 'Please fill in all required fields.';
    } elseif ( ! is_email( $old['email'] ) ) {
        $form_error = 'Please enter a valid email address.';
    } elseif ( ! $old['privacy'] ) {
        $form_error = 'Please agree to the Privacy Policy to continue.';
    } else {
        $products_str = ! empty( $old['products'] ) ? implode( ', ', $old['products'] ) : '—';
        $to      = get_option( 'admin_email' );
        $subject = "Partner Enquiry: {$old['customer_name']} — {$old['organization']}";
        $body    = "Customer Name: {$old['customer_name']}\n"
                 . "Organization Name: {$old['organization']}\n"
                 . "Address: {$old['address']}\n"
                 . "Nearby Landmark: {$old['landmark']}\n"
                 . "Country: {$old['country']}\n"
                 . "District: {$old['district']}\n"
                 . "Pincode: {$old['pincode']}\n"
                 . "Email: {$old['email']}\n"
                 . "Mobile: {$old['mobile']}\n"
                 . "Lead Type: {$old['lead_type']}\n"
                 . "Qty Required (Kgs): {$old['qty_required']}\n"
                 . "Products Interested In: {$products_str}\n"
                 . "Message:\n{$old['message']}";
        $headers = [ "Reply-To: {$old['customer_name']} <{$old['email']}>" ];

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

                            <!-- Customer Name -->
                            <div class="cp-field">
                                <div class="cp-label">Customer Name <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_customer_name"
                                           placeholder="e.g. Ramesh Sharma"
                                           value="<?php echo esc_attr( $old['customer_name'] ?? '' ); ?>" required>
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>

                            <!-- Organization Name -->
                            <div class="cp-field">
                                <div class="cp-label">Organization Name <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_organization"
                                           placeholder="e.g. ABC Traders Pvt. Ltd."
                                           value="<?php echo esc_attr( $old['organization'] ?? '' ); ?>" required>
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="cp-field">
                                <div class="cp-label">Address <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap textarea-wrap">
                                    <textarea class="cp-input cp-textarea" name="pw_address"
                                              placeholder="e.g. 123 Main Street, Building Name…"
                                              required><?php echo esc_textarea( $old['address'] ?? '' ); ?></textarea>
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            </div>

                            <!-- Nearby Landmark -->
                            <div class="cp-field">
                                <div class="cp-label">Nearby Landmark</div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_landmark"
                                           placeholder="e.g. Near Railway Station"
                                           value="<?php echo esc_attr( $old['landmark'] ?? '' ); ?>">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>

                            <!-- Country -->
                            <div class="cp-field">
                                <div class="cp-label">Country <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <select class="cp-input cp-select" name="pw_country" disabled>
                                        <option value="India" selected>India</option>
                                    </select>
                                    <i class="fas fa-globe"></i>
                                </div>
                            </div>

                            <!-- District -->
                            <div class="cp-field">
                                <div class="cp-label">District <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_district"
                                           placeholder="e.g. Kolkata"
                                           value="<?php echo esc_attr( $old['district'] ?? '' ); ?>" required>
                                    <i class="fas fa-map"></i>
                                </div>
                            </div>

                            <!-- Pincode -->
                            <div class="cp-field">
                                <div class="cp-label">Pincode <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_pincode"
                                           placeholder="e.g. 700001"
                                           value="<?php echo esc_attr( $old['pincode'] ?? '' ); ?>" required>
                                    <i class="fas fa-map-pin"></i>
                                </div>
                            </div>

                            <!-- Email + Phone Number -->
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
                                    <div class="cp-label">Phone Number <span class="pw-req">*</span></div>
                                    <div class="cp-input-wrap">
                                        <input class="cp-input" type="tel" name="pw_mobile"
                                               placeholder="+91 98765 43210"
                                               value="<?php echo esc_attr( $old['mobile'] ?? '' ); ?>" required>
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Lead Type -->
                            <div class="cp-field">
                                <div class="cp-label">Lead Type <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <select class="cp-input cp-select" name="pw_lead_type" required>
                                        <option value="" disabled <?php selected( empty( $old['lead_type'] ) ); ?>>Select lead type…</option>
                                        <?php foreach ( [ 'Direct customer', 'Distributor', 'Wholeseller', 'Online customers', 'Exporter' ] as $opt ) : ?>
                                            <option value="<?php echo esc_attr( $opt ); ?>"
                                                <?php selected( ( $old['lead_type'] ?? '' ), $opt ); ?>>
                                                <?php echo esc_html( $opt ); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <i class="fas fa-list"></i>
                                </div>
                            </div>

                            <!-- Qty Required (Kg's Only) -->
                            <div class="cp-field">
                                <div class="cp-label">Qty Required (Kg's Only) <span class="pw-req">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="text" name="pw_qty_required"
                                           placeholder="e.g. 500"
                                           value="<?php echo esc_attr( $old['qty_required'] ?? '' ); ?>" required>
                                    <i class="fas fa-weight"></i>
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
