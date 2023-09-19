<?php
// Register and define settings (admin-settings.php)
function wordmaster_register_settings() {
	register_setting('wordmaster-settings', 'word_master_word_count_label', 'sanitize_text_field');
	register_setting('wordmaster-settings', 'word_master_word_count_tag', 'sanitize_text_field');
	register_setting('wordmaster-settings', 'word_master_reading_time_label', 'sanitize_text_field');
	register_setting('wordmaster-settings', 'word_master_reading_time_tag', 'sanitize_text_field');

	add_settings_section('wordmaster-general-settings', __('General Settings', 'word-master'), 'wordmaster_general_settings_callback', 'wordmaster-settings');

	add_settings_field('word_master_word_count_label', __('Word Count Label', 'word-master'), 'wordmaster_word_count_label_callback', 'wordmaster-settings', 'wordmaster-general-settings');
	add_settings_field('word_master_word_count_tag', __('Word Count Tag', 'word-master'), 'wordmaster_word_count_tag_callback', 'wordmaster-settings', 'wordmaster-general-settings');
	add_settings_field('word_master_reading_time_label', __('Reading Time Label', 'word-master'), 'wordmaster_reading_time_label_callback', 'wordmaster-settings', 'wordmaster-general-settings');
	add_settings_field('word_master_reading_time_tag', __('Reading Time Tag', 'word-master'), 'wordmaster_reading_time_tag_callback', 'wordmaster-settings', 'wordmaster-general-settings');
}
add_action('admin_init', 'wordmaster_register_settings');

// Callback functions for settings fields (admin-settings.php)
function wordmaster_general_settings_callback() {
	echo '<p>' . esc_html__('Customize the display of word count and reading time in your content.', 'word-master') . '</p>';
}

function wordmaster_word_count_label_callback() {
	$word_count_label = get_option('word_master_word_count_label', __('Total number of words', 'word-master'));
	echo '<input type="text" name="word_master_word_count_label" value="' . esc_attr($word_count_label) . '" class="regular-text" />';
}

function wordmaster_word_count_tag_callback() {
	$word_count_tag = get_option('word_master_word_count_tag', 'p');
	echo '<input type="text" name="word_master_word_count_tag" value="' . esc_attr($word_count_tag) . '" class="regular-text" />';
}

function wordmaster_reading_time_label_callback() {
	$reading_time_label = get_option('word_master_reading_time_label', __('Total reading time is', 'word-master'));
	echo '<input type="text" name="word_master_reading_time_label" value="' . esc_attr($reading_time_label) . '" class="regular-text" />';
}

function wordmaster_reading_time_tag_callback() {
	$reading_time_tag = get_option('word_master_reading_time_tag', 'p');
	echo '<input type="text" name="word_master_reading_time_tag" value="' . esc_attr($reading_time_tag) . '" class="regular-text" />';
}
