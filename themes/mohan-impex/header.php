<?php
/**
 * Header template
 *
 * @package mohan-impex
 */
?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1"
    />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Mohan Impex Solutions Limited</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/mohan-impex/favicon.avif" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/aos.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/fancybox.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css" />
  </head>

  <body>
    <!-- Loader -->
    <div id="loader">
      <div class="glow glow-a"></div>
      <div class="glow glow-b"></div>
      <div class="plate-wrap">
        <div class="ring-outer"></div>
        <div class="ring-dash"></div>
        <svg class="arc-track" viewBox="0 0 140 140">
          <circle cx="70" cy="70" r="68" />
        </svg>
        <div class="orbit">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
        </div>
        <div class="plate">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mohan-impex/mohan_impex_logo_white.png" alt="Mohan Impex" style="height: 130px; width: auto; object-fit: contain;" />
        </div>
      </div>
      <div class="brand" style="display:none;"></div>
      <div class="tagline" style="display:none;"></div>
    </div>
    <div class="overflow-wrapper">
      <!-- HEADER SECTION -->
      <header class="header2-wrap" id="header2">
        <div class="container">
          <nav class="header2-navbar">
            <!-- Logo -->
            <a
              href="<?php echo esc_url( home_url( '/' ) ); ?>"
              class="header2-logo"
              data-aos="fade-right"
              data-aos-duration="800"
            >
              <img
                src="<?php echo get_template_directory_uri(); ?>/assets/images/mohan-impex/mohan_impex_logo_white.png"
                alt="Mohan Impex"
              />
            </a>
            <!-- Desktop Menu -->
            <div
              class="header2-menu-wrap"
              data-aos="fade-down"
              data-aos-duration="800"
              data-aos-delay="100"
            >
              <ul class="header2-menu">
                <li class="header2-menu-item">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                </li>
                <li class="header2-menu-item">
                  <a href="/about-us">About Us</a>
                </li>
                <li class="header2-menu-item">
                  <a href="/products">Our Brand Products</a>
                </li>
                <li class="header2-menu-item">
                  <a href="/product-segments">Product Segments</a>
                </li>
                <!-- <li class="header2-menu-item">
                  <a href="/our-team">Our Team</a>
                </li> -->
                <li class="header2-menu-item">
                  <a href="/faqs">FAQ</a>
                </li>
                <li class="header2-menu-item">
                  <a href="/contact-us">Contact Us</a>
                </li>
              </ul>
            </div>
            <!-- Quick Contact Icons -->
            <div class="header2-quick-contact">
              <a href="mailto:customercare@mohanimpex.com" class="header2-qc-btn" title="Email Us" aria-label="Email Us">
                <i class="fa-solid fa-envelope"></i>
              </a>
              <a href="https://wa.me/message/D446CS6I4V7VL1" class="header2-qc-btn" title="WhatsApp" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
              <a href="tel:9051155513" class="header2-qc-btn" title="Call Us" aria-label="Call Us">
                <i class="fa-solid fa-phone"></i>
              </a>
            </div>
            <!-- Right Actions -->
            <div
              class="header2-actions"
              data-aos="fade-left"
              data-aos-duration="800"
              data-aos-delay="200"
            >
              <a
                href="/partner-with-us"
                class="btn-default btn-highlighted header2-reservation-btn"
              >
                Partner With Us
              </a>
              <!-- Mobile Toggle -->
              <button
                class="header2-toggle"
                id="header2Toggle"
                aria-label="Toggle Menu"
              >
                <span></span>
                <span></span>
                <span></span>
              </button>
            </div>
          </nav>
        </div>
        <!-- Mobile Overlay -->
        <div class="header2-mobile-overlay" id="header2MobileOverlay"></div>
        <!-- Mobile Menu -->
        <div class="header2-mobile-menu" id="header2MobileMenu">
          <div class="header2-mobile-inner">
            <div class="header2-mobile-top">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header2-mobile-logo">
                <img
                  src="<?php echo get_template_directory_uri(); ?>/assets/images/mohan-impex/mohan_impex_logo_white.png"
                  alt="Mohan Impex"
                />
              </a>
              <button class="header2-mobile-close" id="header2MobileClose">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
            <ul class="header2-mobile-nav">
              <li class="header2-mobile-item">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
              </li>
              <li class="header2-mobile-item">
                <a href="/about-us">About Us</a>
              </li>
              <li class="header2-mobile-item">
                <a href="/products">Our Brand Products</a>
              </li>
              <li class="header2-mobile-item">
                <a href="/product-segments">Product Segments</a>
              </li>
              <!-- <li class="header2-mobile-item">
                <a href="/our-team">Our Team</a>
              </li> -->
              <li class="header2-mobile-item">
                <a href="/faqs">FAQ</a>
              </li>
              <li class="header2-mobile-item">
                <a href="/contact-us">Contact Us</a>
              </li>
            </ul>
            <div class="header2-mobile-quick-contact">
              <a href="#" class="header2-qc-btn" title="Email Us" aria-label="Email Us">
                <i class="fa-solid fa-envelope"></i>
              </a>
              <a href="#" class="header2-qc-btn" title="WhatsApp" aria-label="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
              <a href="#" class="header2-qc-btn" title="Call Us" aria-label="Call Us">
                <i class="fa-solid fa-phone"></i>
              </a>
            </div>
            <div class="header2-mobile-bottom">
              <a href="/partner-with-us" class="btn-default btn-highlighted">Partner with Us</a>
            </div>
          </div>
        </div>
      </header>