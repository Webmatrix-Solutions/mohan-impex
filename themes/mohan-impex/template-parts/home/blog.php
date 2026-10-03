<?php
/**
 * Blog Listing Section Partial
 *
 * Pulls latest 6 published posts automatically.
 * ACF Fields (attach to Front Page):
 *   - blog_eyebrow     (Text)
 *   - blog_title       (Text)
 *   - blog_title_hl    (Text)
 *   - blog_description (Textarea)
 *   - blog_btn_text    (Text)
 *   - blog_btn_url     (URL)
 *   - blog_post_count  (Number — default 6)
 *
 * @package mohan-impex
 */

$eyebrow     = get_field( 'blog_eyebrow' )     ?: 'Latest Insights';
$title       = get_field( 'blog_title' )       ?: 'News, Tips &amp;';
$title_hl    = get_field( 'blog_title_hl' )    ?: 'Industry Updates';
$description = get_field( 'blog_description' ) ?: 'Stay informed with the latest trends, insights, and updates from the food ingredient and distribution industry.';
$btn_text    = get_field( 'blog_btn_text' )    ?: 'Read More Blogs';
$btn_url     = get_field( 'blog_btn_url' )     ?: get_permalink( get_option( 'page_for_posts' ) );
$post_count  = get_field( 'blog_post_count' )  ?: 6;

$blog_query = new WP_Query( [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => intval( $post_count ),
    'ignore_sticky_posts' => true,
] );
?>

<section class="mi-blog-section" id="blog">
    <div class="container">

        <div class="mi-blog-header" data-aos="fade-up" data-aos-duration="600">
            <div class="eyebrow">
                <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?><span class="eyebrow-line"></span>
            </div>
            <h2 class="section-heading">
                <?php echo wp_kses_post( $title ); ?> <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
            </h2>
            <p class="mi-blog-desc"><?php echo esc_html( $description ); ?></p>
        </div>

        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="mi-blog-grid">
                <?php
                $delays = [ 0, 100, 200, 0, 100, 200 ];
                $index  = 0;
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();
                    $delay    = $delays[ $index ] ?? 0;
                    $category = get_the_category();
                    $cat_name = $category ? $category[0]->name : 'News';
                ?>
                    <div class="mi-blog-card" data-aos="fade-up" data-aos-duration="600" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                        <div class="mi-blog-img">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'mohan-impex-card' ); ?>
                                </a>
                            <?php endif; ?>
                            <span class="mi-blog-cat"><?php echo esc_html( $cat_name ); ?></span>
                        </div>
                        <div class="mi-blog-body">
                            <h3 class="mi-blog-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="mi-blog-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="mi-blog-readmore">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <div class="mi-blog-cta" data-aos="fade-up" data-aos-duration="600">
                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn-default">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            </div>

        <?php endif; ?>

    </div>
</section>
