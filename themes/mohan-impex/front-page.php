<?php
/**
 * Template: Front Page Template
 *
 * Sections are inserted as ACF Blocks via the Gutenberg editor.
 * the_content() renders each block through ACF's block pipeline,
 * which makes get_field() return the correct per-block data.
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <div class="overflow-wrapper">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
