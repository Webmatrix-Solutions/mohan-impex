<?php
/**
 * Template Name: About Us
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
