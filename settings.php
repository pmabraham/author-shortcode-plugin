<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add settings page to menu
function asp_add_settings_page() {
    add_options_page('Author Shortcode Settings', 'Author Shortcode', 'manage_options', 'author-shortcode-settings', 'asp_render_settings_page');
}
add_action('admin_menu', 'asp_add_settings_page');

// Render settings page
function asp_render_settings_page() {
    // Get current options
    $options = get_option('asp_settings', array());
    
    // Set default values if options are not set
    $options = wp_parse_args($options, array(
        'include_avatar' => 0,
        'avatar_size' => 32,
        'new_tab' => 0,
        'remove_settings' => 0
    ));
    ?>
    <div class="wrap">
        <h1>Author Shortcode Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('asp_options_group');
            do_settings_sections('author-shortcode-settings');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Include Avatar</th>
                    <td>
                        <input type="checkbox" name="asp_settings[include_avatar]" value="1" <?php checked(1, $options['include_avatar']); ?>>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Avatar Size</th>
                    <td>
                        <input type="number" name="asp_settings[avatar_size]" min="1" max="999" value="<?php echo esc_attr($options['avatar_size']); ?>">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Open Link in New Tab</th>
                    <td>
                        <input type="checkbox" name="asp_settings[new_tab]" value="1" <?php checked(1, $options['new_tab']); ?>>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Remove Settings on Uninstall</th>
                    <td>
                        <input type="checkbox" name="asp_settings[remove_settings]" value="1" <?php checked(1, $options['remove_settings']); ?>>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Sanitize and validate input
function asp_sanitize_options($input) {
    $sanitized_input = array();
    
    $sanitized_input['include_avatar'] = isset($input['include_avatar']) ? 1 : 0;
    $sanitized_input['avatar_size'] = isset($input['avatar_size']) ? absint($input['avatar_size']) : 32;
    $sanitized_input['new_tab'] = isset($input['new_tab']) ? 1 : 0;
    $sanitized_input['remove_settings'] = isset($input['remove_settings']) ? 1 : 0;
    
    return $sanitized_input;
}
