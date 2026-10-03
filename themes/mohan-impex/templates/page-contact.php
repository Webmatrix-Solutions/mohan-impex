<?php
/**
 * Template Name: Contact Us
 *
 * @package mohan-impex
 */

get_header();

/* ── ACF fields with sensible defaults ─── */
$tag       = get_field( 'cp_tag' )       ?: 'Get In Touch';
$title     = get_field( 'cp_title' )     ?: "Let's Talk";
$title_hl  = get_field( 'cp_title_hl' ) ?: 'Food & More.';
$desc      = get_field( 'cp_desc' )      ?: 'Product enquiries, bulk orders, distributor partnerships, or general queries — our team is always happy to hear from you.';

$address1  = get_field( 'cp_address1' ) ?: '33A, J.L. Nehru Road, Park Street Area, Kolkata – 700 071';
$address2  = get_field( 'cp_address2' ) ?: '';
$phone     = get_field( 'cp_phone' )    ?: '+91 98300 XXXXX';
$email     = get_field( 'cp_email' )    ?: 'info@mohanimpex.com';
$whatsapp  = get_field( 'cp_whatsapp' ) ?: '';

$fb        = get_field( 'cp_facebook' )  ?: '#';
$ig        = get_field( 'cp_instagram' ) ?: '#';
$li        = get_field( 'cp_linkedin' )  ?: '#';
$wa        = get_field( 'cp_wa_link' )   ?: ( $whatsapp ? 'https://wa.me/' . preg_replace( '/\D/', '', $whatsapp ) : '#' );

$map_url   = get_field( 'cp_map_url' ) ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8741.521241274637!2d88.34784427587161!3d22.553629133664355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02770e37e00395%3A0x6c77eaf1fc245ba2!2sChatterjee%20International%20Centre%2C%2033%20A%2C%20Jawaharlal%20Nehru%20Rd%2C%20Park%20Street%20area%2C%20Kolkata%2C%20West%20Bengal%20700071%2C%20India!5e1!3m2!1sen!2sau!4v1784752158781!5m2!1sen!2sau';

/* ── Form processing ─── */
$form_success = false;
$form_error   = '';

if (
    isset( $_POST['cp_nonce'] ) &&
    wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cp_nonce'] ) ), 'cp_contact_form' )
) {
    $fname   = sanitize_text_field( wp_unslash( $_POST['cp_fname']   ?? '' ) );
    $lname   = sanitize_text_field( wp_unslash( $_POST['cp_lname']   ?? '' ) );
    $f_email = sanitize_email(       wp_unslash( $_POST['cp_email']   ?? '' ) );
    $f_phone = sanitize_text_field( wp_unslash( $_POST['cp_phone']   ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['cp_message'] ?? '' ) );

    if ( ! $fname || ! $f_email || ! $message ) {
        $form_error = 'Please fill in all required fields.';
    } elseif ( ! is_email( $f_email ) ) {
        $form_error = 'Please enter a valid email address.';
    } else {
        $to      = get_option( 'admin_email' );
        $subject = "Contact Form: {$fname} {$lname}";
        $body    = "Name: {$fname} {$lname}\nEmail: {$f_email}\nPhone: {$f_phone}\n\nMessage:\n{$message}";
        $headers = array( "Reply-To: {$fname} {$lname} <{$f_email}>" );

        wp_mail( $to, $subject, $body, $headers );
        $form_success = true;
    }
}
?>

<main class="site-main" id="main">

    <!-- ── Page Banner ──────────────────────────────────────── -->
    <section class="page-banner">
        <div class="page-banner__bg"></div>
        <div class="container position-relative">
            <div class="page-banner__content">
                <div class="eyebrow" data-aos="fade-up" data-aos-duration="600">
                    <span class="eyebrow-line"></span> Contact Us
                </div>
                <h2 class="section-heading" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Reach Out <span class="hero-highlight">To Our Team</span>
                </h2>
                <p data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    We're ready to assist with enquiries, orders, and partnerships.
                </p>
            </div>
            <div class="page-banner__breadcrumb" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <span>Contact Us</span>
            </div>
        </div>
    </section>

    <!-- ── Contact Panel ────────────────────────────────────── -->
    <section class="cp-section" style="padding: 0px">
        <div class="cp-wrap">

            <!-- LEFT: Info -->
            <div class="cp-left" data-aos="fade-right" data-aos-duration="800">
                <div class="cp-left__bg"></div>
                <div class="cp-left__ring cp-left__ring--1"></div>
                <div class="cp-left__ring cp-left__ring--2"></div>
                <div class="cp-left__ring cp-left__ring--3"></div>
                <div class="cp-left__bignum">MOHAN</div>

                <div class="cp-left__body">
                    <div class="cp-left__tag"><?php echo esc_html( $tag ); ?></div>
                    <h2 class="cp-left__title">
                        <?php echo esc_html( $title ); ?>
                        <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                    </h2>
                    <p class="cp-left__desc"><?php echo esc_html( $desc ); ?></p>

                    <div class="cp-info-list">
                        <?php if ( $address1 ) : ?>
                            <div class="cp-info-item">
                                <div class="cp-info-item__icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="cp-info-item__text">
                                    <div class="cp-info-item__label">Location</div>
                                    <div class="cp-info-item__value">
                                        <?php echo esc_html( $address1 ); ?>
                                        <?php if ( $address2 ) : ?><br><?php echo esc_html( $address2 ); ?><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $phone ) : ?>
                            <div class="cp-info-item">
                                <div class="cp-info-item__icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="cp-info-item__text">
                                    <div class="cp-info-item__label">Phone</div>
                                    <div class="cp-info-item__value">
                                        <a href="tel:<?php echo esc_attr( preg_replace( '/\s/', '', $phone ) ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $phone ); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $email ) : ?>
                            <div class="cp-info-item">
                                <div class="cp-info-item__icon"><i class="fas fa-envelope"></i></div>
                                <div class="cp-info-item__text">
                                    <div class="cp-info-item__label">Email</div>
                                    <div class="cp-info-item__value">
                                        <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color:inherit;text-decoration:none;"><?php echo esc_html( $email ); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="cp-socials">
                        <?php if ( $li && $li !== '#' ) : ?>
                            <a href="<?php echo esc_url( $li ); ?>" target="_blank" rel="noopener noreferrer" class="cp-social"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                        <?php if ( $fb && $fb !== '#' ) : ?>
                            <a href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer" class="cp-social"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if ( $ig && $ig !== '#' ) : ?>
                            <a href="<?php echo esc_url( $ig ); ?>" target="_blank" rel="noopener noreferrer" class="cp-social"><i class="fab fa-instagram"></i></a>
                        <?php endif; ?>
                        <?php if ( $wa && $wa !== '#' ) : ?>
                            <a href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener noreferrer" class="cp-social"><i class="fab fa-whatsapp"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="cp-left__foot">
                    <span class="cp-left__copy">&copy; <?php echo esc_html( date( 'Y' ) ); ?> Mohan Impex Solutions Limited.</span>
                    <div class="cp-left__hours">
                        <span class="cp-left__hours-dot"></span>
                        Mon–Sat · 10AM – 6PM
                    </div>
                </div>
            </div>

            <!-- RIGHT: Form -->
            <div class="cp-right" data-aos="fade-left" data-aos-delay="100" data-aos-duration="800">
                <div class="cp-form-wrap">
                    <div class="cp-form-head">
                        <div class="cp-form-head__title">Send Us a Message</div>
                        <div class="cp-form-head__sub">We'll reply within 1–2 business days.</div>
                    </div>

                    <?php if ( $form_success ) : ?>
                        <div class="cp-success-msg" role="alert">
                            <i class="fas fa-check-circle"></i>
                            <div>
                                <strong>Message sent!</strong><br>
                                Thank you for reaching out. We'll get back to you shortly.
                            </div>
                        </div>
                    <?php else : ?>

                        <?php if ( $form_error ) : ?>
                            <div class="cp-error-msg" role="alert">
                                <i class="fas fa-exclamation-circle"></i> <?php echo esc_html( $form_error ); ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php the_permalink(); ?>" id="contactForm" novalidate>
                            <?php wp_nonce_field( 'cp_contact_form', 'cp_nonce' ); ?>

                            <div class="cp-field-row">
                                <div class="cp-field">
                                    <div class="cp-label">First Name <span style="color:var(--primary-color)">*</span></div>
                                    <div class="cp-input-wrap">
                                        <input class="cp-input" type="text" name="cp_fname"
                                               placeholder="e.g. Ramesh"
                                               value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_POST['cp_fname'] ?? '' ) ) ); ?>"
                                               required>
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <div class="cp-field">
                                    <div class="cp-label">Last Name</div>
                                    <div class="cp-input-wrap">
                                        <input class="cp-input" type="text" name="cp_lname"
                                               placeholder="e.g. Sharma"
                                               value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_POST['cp_lname'] ?? '' ) ) ); ?>">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="cp-field">
                                <div class="cp-label">Email Address <span style="color:var(--primary-color)">*</span></div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="email" name="cp_email"
                                           placeholder="you@example.com"
                                           value="<?php echo esc_attr( sanitize_email( wp_unslash( $_POST['cp_email'] ?? '' ) ) ); ?>"
                                           required>
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>

                            <div class="cp-field">
                                <div class="cp-label">Phone Number</div>
                                <div class="cp-input-wrap">
                                    <input class="cp-input" type="tel" name="cp_phone"
                                           placeholder="+91 98765 43210"
                                           value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_POST['cp_phone'] ?? '' ) ) ); ?>">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                            </div>

                            <div class="cp-field">
                                <div class="cp-label">Your Message <span style="color:var(--primary-color)">*</span></div>
                                <div class="cp-input-wrap textarea-wrap">
                                    <textarea class="cp-input cp-textarea" name="cp_message"
                                              placeholder="Tell us how we can help you…" required><?php echo esc_textarea( sanitize_textarea_field( wp_unslash( $_POST['cp_message'] ?? '' ) ) ); ?></textarea>
                                    <i class="fas fa-comment-alt"></i>
                                </div>
                            </div>

                            <button type="submit" class="btn-default">
                                <span>Send Message</span>
                            </button>
                        </form>

                    <?php endif; ?>
                </div>
            </div>

            <section class="regional-offices">
                <div class="container">
                    <div class="regional-offices__head" data-aos="fade-up" data-aos-duration="700">
                        <div>
                            <div class="eyebrow"><span class="eyebrow-line"></span>Regional Offices</div>
                            <h2 class="section-heading">Connect With Us <span class="hero-highlight">Across India</span></h2>
                        </div>
                        <p>Our local warehouse teams are ready to support your enquiries, orders, and deliveries.</p>
                    </div>

                    <div class="regional-offices__grid">
                        <article class="regional-office" data-aos="fade-up" data-aos-duration="700">
                            <div class="regional-office__city"><i class="fas fa-location-dot"></i><span>Chennai</span></div>
                            <div class="regional-office__contact"><i class="fas fa-user"></i><span>Avinash Reddy</span></div>
                            <a class="regional-office__detail" href="tel:7439805033"><i class="fas fa-phone-alt"></i><span>7439805033</span></a>
                            <a class="regional-office__detail" href="mailto:wh.hyd@mohanimpex.co.in"><i class="fas fa-envelope"></i><span>wh.hyd@mohanimpex.co.in</span></a>
                            <div class="regional-office__address"><i class="fas fa-warehouse"></i><span>Soorapattu, Plot No. 4/177, Puzhal Ambattur Road, Stockarea W73, Near Velammal Engineering College, Chennai, PIN: 600066</span></div>
                        </article>

                        <article class="regional-office" data-aos="fade-up" data-aos-delay="80" data-aos-duration="700">
                            <div class="regional-office__city"><i class="fas fa-location-dot"></i><span>Hyderabad</span></div>
                            <div class="regional-office__contact"><i class="fas fa-user"></i><span>Nandu Lal</span></div>
                            <a class="regional-office__detail" href="tel:7439805234"><i class="fas fa-phone-alt"></i><span>7439805234</span></a>
                            <a class="regional-office__detail" href="mailto:wh.hyd1@mohanimpex.co.in"><i class="fas fa-envelope"></i><span>wh.hyd1@mohanimpex.co.in</span></a>
                            <div class="regional-office__address"><i class="fas fa-warehouse"></i><span>Survey No. 88 &amp; 89, Plot No. 7-3-146/17, Rajendranagar Municipality, Gagan Pahad Village, Ranga Reddy District, Telangana - 500077</span></div>
                        </article>

                        <article class="regional-office" data-aos="fade-up" data-aos-delay="160" data-aos-duration="700">
                            <div class="regional-office__city"><i class="fas fa-location-dot"></i><span>Guwahati</span></div>
                            <div class="regional-office__contact"><i class="fas fa-user"></i><span>Kalayan / Biswajit Das</span></div>
                            <a class="regional-office__detail" href="tel:7439513332"><i class="fas fa-phone-alt"></i><span>7439513332 / 9706576107 / 8100105823</span></a>
                            <a class="regional-office__detail" href="mailto:wh.guw1@mohanimpex.co.in"><i class="fas fa-envelope"></i><span>wh.guw1@mohanimpex.co.in / wh.guw2@mohanimpex.co.in</span></a>
                            <div class="regional-office__address"><i class="fas fa-warehouse"></i><span>Dag No. 1266, Patt Old 298 New 271, Near Lokhra Chariali NH 37, Vill. Bhetkuchi, Mouza Beltola, Dist. Kamrup(N), Metro, Guwahati, Assam - 781040</span></div>
                        </article>

                        <article class="regional-office" data-aos="fade-up" data-aos-delay="240" data-aos-duration="700">
                            <div class="regional-office__city"><i class="fas fa-location-dot"></i><span>Patna</span></div>
                            <div class="regional-office__contact"><i class="fas fa-user"></i><span>Chandan Kumar / Sambu Kumar</span></div>
                            <a class="regional-office__detail" href="tel:7439513323"><i class="fas fa-phone-alt"></i><span>7439513323 / 7439513326</span></a>
                            <a class="regional-office__detail" href="mailto:wh.patna@mohanimpex.co.in"><i class="fas fa-envelope"></i><span>wh.patna@mohanimpex.co.in / patnawarehouse@mohanimpex.com</span></a>
                            <div class="regional-office__address"><i class="fas fa-warehouse"></i><span>Ground Floor, Bari Pahari, Alamgunj, Patna - 800007, Bihar</span></div>
                        </article>
                    </div>
                </div>
            </section>

            <!-- MAP -->
            <div class="cp-map-strip" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <iframe
                    src="<?php echo esc_url( $map_url ); ?>"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin">
                </iframe>
            </div>

        </div><!-- /.cp-wrap -->
    </section>

</main>

<?php get_footer(); ?>
