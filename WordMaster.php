<?php
/*
 * Plugin Name: WordMaster: Word Count & Reading Time Pro
 * Plugin URI: https://example.com/plugins/the-basics/
 * Description: Elevate your content creation game with WordMaster: Word Count & Reading Time Pro, the ultimate tool for WordPress authors, bloggers, and content creators. Seamlessly integrated into your WordPress editor, this versatile plugin offers two invaluable features that enhance your content and engage your readers.
 * Version: 1.0.0
 * Author: Mohi Uddin Ahmed
 * Author URI: https://author.example.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: word-master
 */
// Include the settings-related code
require_once plugin_dir_path(__FILE__) . 'admin/admin-settings.php';

// Include the word counting functionality
require_once plugin_dir_path(__FILE__) . 'includes/word-count.php';

// Include the reading time functionality
require_once plugin_dir_path(__FILE__) . 'includes/reading-time.php';

// Load the plugin's text domain for translation
function wordmaster_load_textdomain() {
	load_plugin_textdomain('word-master', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'wordmaster_load_textdomain');

// Add a settings page
function wordmaster_settings_menu() {
	add_options_page('WordMaster Settings', 'WordMaster', 'manage_options', 'wordmaster-settings', 'wordmaster_settings_page');
}
add_action('admin_menu', 'wordmaster_settings_menu');

// Callback function for the settings page
function wordmaster_settings_page() {
	?>
    <div class="wrap">
        <h2><?php esc_html_e('WordMaster Settings', 'word-master'); ?></h2>
        <form method="post" action="options.php">
			<?php
			settings_fields('wordmaster-settings');
			do_settings_sections('wordmaster-settings');
			submit_button();
			?>
        </form>
    </div>
	<?php
}


