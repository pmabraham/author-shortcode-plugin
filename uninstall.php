<?php
// If uninstall is not called from WordPress, exit
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Check if the option to remove settings is enabled
$options = get_option('asp_settings');
if (isset($options['remove_settings']) && $options['remove_settings']) {
    // Delete options from the database
    delete_option('asp_settings');
}
