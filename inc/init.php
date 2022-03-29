<?php

/**
 * Silence is golden
 */

/**
 * @package Author Bio
 */

if (is_admin()) {
    require_once AB_FILE . '/admin/profile.php';
}

function ab_content($content)
{
    global $post;
    $author = get_user_by('id', $post->post_author);
    $bio = get_user_meta($author->ID, 'description', true);
    $twitter = get_user_meta($author->ID, 'twitter', true);
    $facebook = get_user_meta($author->ID, 'facebook', true);
    $linkedin = get_user_meta($author->ID, 'linkedin', true);

    ob_start();
    ?>
    <div>
        <div>
            <?php echo get_avatar($author->id, 64) ?>
        </div>
        <div>
            <div><?php echo $author->display_name; ?></div>
            <div><?php echo wpautop(wp_kses_post($bio)); ?></div>
            <ul class="d-flex gap-3">
                <?php if ($twitter) { ?>
                    <li class="list-unstyled ">
                        <a class="text-decoration-none" href="<?php echo esc_url($twitter); ?>">
                            <?php _e('Twitter', 'author_bio'); ?>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($linkedin) { ?>
                    <li class="list-unstyled">
                        <a class="text-decoration-none" href="<?php echo esc_url($linkedin); ?>">
                            <?php _e('Linkedin', 'author_bio'); ?>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($facebook) { ?>
                    <li class="list-unstyled">
                        <a class="text-decoration-none" href="<?php echo esc_url($facebook); ?>">
                            <?php _e('Facebook', 'author_bio'); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php
    $bio_content = ob_get_clean();
    return $content.$bio_content;
}

/**
 * Adding admin bio links after content
 */
add_filter('the_content', 'ab_content');