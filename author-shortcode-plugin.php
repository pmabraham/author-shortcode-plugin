<?php
/*
Plugin Name: Author Shortcode Plugin
Description: A plugin to display author name, avatar, and link using a shortcode.
Version: 2.1
Author: Peter M. Abraham
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include settings page
require_once plugin_dir_path(__FILE__) . 'settings.php';

// Register settings
function asp_register_settings() {
    register_setting('asp_options_group', 'asp_settings');
}
add_action('admin_init', 'asp_register_settings');

// Add settings link on plugin page
function asp_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=author-shortcode-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'asp_settings_link');

// Shortcode function
function asp_author_shortcode($atts) {
    $options = get_option('asp_settings');
    
    global $post;
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_link = get_author_posts_url($author_id);

    $output = '';

    if (isset($options['include_avatar']) && $options['include_avatar']) {
        $avatar_size = isset($options['avatar_size']) ? intval($options['avatar_size']) : 32;
        $author_avatar = get_avatar($author_id, $avatar_size);
        $output .= $author_avatar . ' ';
    }

    $target = isset($options['new_tab']) && $options['new_tab'] ? ' target="_blank"' : '';
    $output .= '<a href="' . esc_url($author_link) . '"' . $target . '>' . esc_html($author_name) . '</a>';

    return $output;
}
add_shortcode('author_info', 'asp_author_shortcode');

// Register block
function asp_register_block() {
    wp_register_script(
        'asp-block',
        plugins_url('block.js', __FILE__),
        array('wp-blocks', 'wp-element', 'wp-editor'),
        filemtime(plugin_dir_path(__FILE__) . 'block.js')
    );

    register_block_type('asp/author-info', array(
        'editor_script' => 'asp-block',
    ));
}
add_action('init', 'asp_register_block');
