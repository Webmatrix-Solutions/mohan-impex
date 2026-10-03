<?php
/**
 * Sidebar template
 *
 * @package mohan-impex
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside class="widget-area" id="secondary" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
