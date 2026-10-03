<?php
/**
 * Full-width page template (no sidebar)
 *
 * Template Name: Full Width
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <div class="container">
        <div class="content-area full-width">
            <div class="primary-content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail" style="margin-bottom: 2rem;">
                                <?php the_post_thumbnail( 'mohan-impex-hero' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                    </article>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
