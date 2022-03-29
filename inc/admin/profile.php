<?php
/**
 * @package Author Bio
 */

function ab_social_links($methods){
    $methods['twitter'] = __('Twitter', 'author_bio');
    $methods['facebook'] = __('Facebook', 'author_bio');
    $methods['linkedin'] = __('LinkedIn', 'author_bio');
    return $methods;

}

/**
 * Adding contact methods
 */
add_filter('user_contactmethods', 'ab_social_links');