<?php
/**
 * Counters / Stats Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - counters_list (Repeater: counter_icon [Text — FA class e.g. fa-calendar-check],
 *                              counter_target [Number],
 *                              counter_label [Text])
 *
 * @package mohan-impex
 */

$counters = get_field( 'counters_list' ) ?: [
    [ 'counter_icon' => 'fa-calendar-check', 'counter_target' => 30,   'counter_label' => 'Years of Legacy' ],
    [ 'counter_icon' => 'fa-users',          'counter_target' => 5000, 'counter_label' => 'Customers Served Successfully' ],
    [ 'counter_icon' => 'fa-boxes-stacked',  'counter_target' => 25,   'counter_label' => 'Product Range' ],
    [ 'counter_icon' => 'fa-award',          'counter_target' => 20,   'counter_label' => 'Popular Brands' ],
];
?>

<div class="counters" data-debug="<?php echo esc_attr( wp_json_encode( $counters ) ); ?>">
    <div class="counters-inner" data-aos="fade-up" data-aos-duration="800">
        <?php foreach ( $counters as $i => $counter ) :
            $delay = 50 + ( $i * 90 );
        ?>
            <div class="counter-item" data-aos="zoom-in" data-aos-delay="<?php echo esc_attr( $delay ); ?>" data-aos-duration="650">
                <span class="c-icon"><i class="fa-solid <?php echo esc_attr( $counter['counter_icon'] ); ?>"></i></span>
                <span class="c-num" data-target="<?php echo esc_attr( $counter['counter_target'] ); ?>">0<sup>+</sup></span>
                <span class="c-lbl"><?php echo esc_html( $counter['counter_label'] ); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
