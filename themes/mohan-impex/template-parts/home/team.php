<?php
/**
 * Team Section Partial
 *
 * ACF Fields (attach to Front Page):
 *   - team_eyebrow      (Text)
 *   - team_title        (Text)
 *   - team_title_hl     (Text)
 *   - team_subtitle     (Textarea)
 *   - team_members      (Repeater: member_photo [Image — returns array],
 *                                  member_role [Text],
 *                                  member_name [Text],
 *                                  member_speciality [Text])
 *
 * @package mohan-impex
 */

$eyebrow  = get_field( 'team_eyebrow' )  ?: 'The People Behind Our Success';
$title    = get_field( 'team_title' )    ?: 'Meet Our';
$title_hl = get_field( 'team_title_hl' ) ?: 'Leadership Team';
$subtitle = get_field( 'team_subtitle' ) ?: 'A dedicated team committed to quality, innovation and customer satisfaction for over three decades.';

$members = get_field( 'team_members' ) ?: [
    [ 'member_photo' => 'https://picsum.photos/seed/team1/400/480', 'member_role' => 'Managing Director',  'member_name' => 'Name Here', 'member_speciality' => 'Leadership · Strategy · Growth' ],
    [ 'member_photo' => 'https://picsum.photos/seed/team2/400/480', 'member_role' => 'Director',           'member_name' => 'Name Here', 'member_speciality' => 'Operations · Supply Chain' ],
    [ 'member_photo' => 'https://picsum.photos/seed/team3/400/480', 'member_role' => 'Head of Sales',      'member_name' => 'Name Here', 'member_speciality' => 'Sales · Distribution · FMCG' ],
    [ 'member_photo' => 'https://picsum.photos/seed/team4/400/480', 'member_role' => 'Head of Procurement','member_name' => 'Name Here', 'member_speciality' => 'Sourcing · Quality · Compliance' ],
];
?>

<div class="au2-team">
    <div class="au2-container">

        <div class="au2-team-head" data-aos="fade-up" data-aos-duration="700">
            <div>
                <div class="eyebrow">
                    <span class="eyebrow-line"></span><?php echo esc_html( $eyebrow ); ?>
                </div>
                <h3 class="section-heading">
                    <?php echo esc_html( $title ); ?>
                    <span class="hero-highlight"><?php echo esc_html( $title_hl ); ?></span>
                </h3>
            </div>
            <p class="au2-team-sub"><?php echo esc_html( $subtitle ); ?></p>
        </div>

        <div class="au2-team-grid">
            <?php foreach ( $members as $i => $member ) :
                $photo_url = is_array( $member['member_photo'] ) ? $member['member_photo']['url'] : $member['member_photo'];
                $photo_alt = is_array( $member['member_photo'] ) ? $member['member_photo']['alt'] : $member['member_name'];
                $delay = $i * 80;
            ?>
                <div class="au2-member-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="<?php echo esc_attr( $delay ); ?>">
                    <div class="au2-member-bar"></div>
                    <div class="au2-member-photo image-animation">
                        <img src="<?php echo esc_url( $photo_url ); ?>" alt="<?php echo esc_attr( $photo_alt ); ?>" />
                        <div class="au2-photo-overlay"></div>
                    </div>
                    <div class="au2-member-info">
                        <div class="au2-member-role"><?php echo esc_html( $member['member_role'] ); ?></div>
                        <div class="au2-member-name"><?php echo esc_html( $member['member_name'] ); ?></div>
                        <div class="au2-member-spec"><?php echo esc_html( $member['member_speciality'] ); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
