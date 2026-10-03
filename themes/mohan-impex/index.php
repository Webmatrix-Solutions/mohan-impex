<?php
/**
 * Main index template — blog post listing
 *
 * @package mohan-impex
 */

get_header();
?>

<main class="site-main" id="main">
    <div class="container">
        <div class="content-area <?php echo is_active_sidebar( 'sidebar-1' ) ? '' : 'full-width'; ?>">

            <div class="primary-content">
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                        if ( is_home() && ! is_front_page() ) {
                            echo '<h1 class="page-title">' . esc_html( single_post_title() ) . '</h1>';
                        } elseif ( is_archive() ) {
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                        } elseif ( is_search() ) {
                            printf(
                                '<h1 class="page-title">' . esc_html__( 'Search Results for: %s', 'mohan-impex' ) . '</h1>',
                                '<span>' . get_search_query() . '</span>'
                            );
                        }
                        ?>
                    </header>

                    <div class="posts-grid">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-card-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'mohan-impex-card' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-card-body">
                                <h2 class="post-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <div class="entry-meta">
                                    <span><?php echo esc_html( get_the_date() ); ?></span>
                                    &mdash;
                                    <span><?php the_author(); ?></span>
                                </div>

                                <div class="post-card-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                        </article>

                    <?php endwhile; ?>
                    </div>

                    <div class="pagination mt-lg">
                        <?php
                        the_posts_pagination( [
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( '&laquo; Previous', 'mohan-impex' ),
                            'next_text' => esc_html__( 'Next &raquo;', 'mohan-impex' ),
                        ] );
                        ?>
                    </div>

                <?php else : ?>

                    <p><?php esc_html_e( 'No posts found.', 'mohan-impex' ); ?></p>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
