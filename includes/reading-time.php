<?php

// reading-time.php (in the "includes" folder)
function wordmaster_reading_time( $content ) {
	$clean_content = strip_tags($content);
	$word_count = str_word_count($clean_content);
	$reading_minute = floor($word_count / 200);
	$reading_second = floor($word_count % 200 / (200 / 60));
	$is_visible = get_option('word_master_reading_time_visible', true); // Retrieve the saved visibility option
	if ($is_visible) {
		$label = get_option('word_master_reading_time_label', __('Total reading time is', 'word-master'));
		$tag = get_option('word_master_reading_time_tag', 'p');
		$style = get_option('word_master_reading_time_style', ''); // Retrieve the saved style option
		$font = get_option('word_master_reading_time_font', ''); // Retrieve the saved font option
		$position = get_option('word_master_reading_time_position', ''); // Retrieve the saved position option
		$content .= sprintf('<%s style="%s; font-family: %s; position: %s;">%s %s %s %s %s</%s>', $tag, $style, $font, $position, $label, $reading_minute, _n('minute', 'minutes', $reading_minute, 'word-master'), $reading_second, _n('second', 'seconds', $reading_second, 'word-master'), $tag);
	}
	return $content;
}

add_filter( 'the_content', 'wordmaster_reading_time' );
