<?php
/**
 * Search results template
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <div class="container">
        <div class="content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? '' : 'full-width'; ?>">

            <div class="primary-content">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        printf(
                            esc_html__( 'Search Results for: %s', 'mohan-impex' ),
                            '<span>' . esc_html( get_search_query() ) . '</span>'
                        );
                        ?>
                    </h1>
                </header>

                <?php if ( have_posts() ) : ?>
                    <div class="posts-grid">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                            <div class="post-card-body">
                                <h2 class="post-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta"><?php echo esc_html( get_the_date() ); ?></div>
                                <div class="post-card-excerpt"><?php the_excerpt(); ?></div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    </div>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <p><?php esc_html_e( 'No results found. Try a different search.', 'mohan-impex' ); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
