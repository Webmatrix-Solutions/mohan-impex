<?php
/**
 * Single post template
 *
 * @package mohan-impex
 */

get_header();

// Gather post data once
$post_title    = get_the_title();
$post_date     = get_the_date( 'F j, Y' );
$read_time     = max( 1, (int) ceil( str_word_count( strip_tags( get_the_content() ) ) / 200 ) );
$categories    = get_the_category();
$first_cat     = $categories ? $categories[0] : null;
$thumbnail_url = get_the_post_thumbnail_url( null, 'full' );
?>

<main class="site-main" id="main">

    <!-- ========== PAGE BANNER ========== -->
    <section class="page-banner">
        <?php if ( $thumbnail_url ) : ?>
            <div class="page-banner__bg" style="background-image: url('<?php echo esc_url( $thumbnail_url ); ?>'); background-size: cover; background-position: center;"></div>
        <?php else : ?>
            <div class="page-banner__bg"></div>
        <?php endif; ?>

        <div class="container">
            <div class="page-banner__content">
                <?php if ( $first_cat ) : ?>
                    <p class="eyebrow">
                        <span class="eyebrow-line"></span>
                        <?php echo esc_html( $first_cat->name ); ?>
                    </p>
                <?php endif; ?>
                <h1 class="section-heading"><?php echo esc_html( $post_title ); ?></h1>
                <p><?php echo esc_html( $post_date ); ?> &nbsp;·&nbsp; <?php echo esc_html( $read_time ); ?> min read</p>
            </div>

            <nav class="page-banner__breadcrumb" aria-label="Breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                <i class="fas fa-chevron-right"></i>
                <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog</a>
                <i class="fas fa-chevron-right"></i>
                <span><?php echo esc_html( wp_trim_words( $post_title, 6, '…' ) ); ?></span>
            </nav>
        </div>
    </section>
    <!-- ========== END BANNER ========== -->

    <!-- ========== ARTICLE SECTION ========== -->
    <section class="article-section">
        <div class="container">
            <div class="single-post-layout">

                <!-- LEFT: Gutenberg content -->
                <?php while ( have_posts() ) : the_post(); ?>
                <article class="article-body">
                    <div class="prose">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php endwhile; ?>

                <!-- RIGHT: Related Blogs sidebar -->
                <aside class="art-sidebar">
                    <div class="sb-card">
                        <div class="sb-head">
                            <div class="sb-head-icon"><i class="fas fa-newspaper"></i></div>
                            <span class="sb-head-title">Related Blogs</span>
                        </div>
                        <div class="sb-rel-list">
                            <?php
                            $related_args = array(
                                'post_type'           => 'post',
                                'posts_per_page'      => 4,
                                'post__not_in'        => array( get_the_ID() ),
                                'ignore_sticky_posts' => 1,
                                'orderby'             => 'rand',
                            );
                            if ( $first_cat ) {
                                $related_args['category__in'] = array( $first_cat->term_id );
                            }
                            $related_query = new WP_Query( $related_args );
                            if ( $related_query->have_posts() ) :
                                while ( $related_query->have_posts() ) : $related_query->the_post();
                                    $rel_thumb = get_the_post_thumbnail_url( null, 'thumbnail' );
                                    $rel_cats  = get_the_category();
                                    $rel_cat   = $rel_cats ? $rel_cats[0]->name : '';
                            ?>
                                <a href="<?php the_permalink(); ?>" class="sbr-item">
                                    <div class="sbr-img">
                                        <?php if ( $rel_thumb ) : ?>
                                            <img src="<?php echo esc_url( $rel_thumb ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder.jpg" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <?php if ( $rel_cat ) : ?>
                                            <div class="sbr-cat"><?php echo esc_html( $rel_cat ); ?></div>
                                        <?php endif; ?>
                                        <div class="sbr-title"><?php echo esc_html( wp_trim_words( get_the_title(), 8, '…' ) ); ?></div>
                                        <div class="sbr-time"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></div>
                                    </div>
                                </a>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <p style="padding: 16px; font-size: 13px; color: var(--text-color);">No related posts found.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </aside>

            </div><!-- .single-post-layout -->
        </div><!-- .container -->
    </section>
    <!-- ========== END ARTICLE SECTION ========== -->

</main>

<?php get_footer(); ?>
