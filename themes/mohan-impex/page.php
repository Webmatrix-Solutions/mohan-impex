<?php
/**
 * Page template (default)
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <div class="container">
        <div class="content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? '' : 'full-width'; ?>">

            <div class="primary-content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="entry-thumbnail" style="margin-bottom: 2rem;">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            the_content();
                            wp_link_pages( [
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mohan-impex' ),
                                'after'  => '</div>',
                            ] );
                            ?>
                        </div>

                    </article>

                    <?php if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    } ?>

                <?php endwhile; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
