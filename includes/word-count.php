<?php

// word-count.php (in the "includes" folder)
function wordmaster_count_words( $content ) {
	$clean_content = strip_tags($content);
	$word_count = str_word_count($clean_content);
	$label = get_option('word_master_word_count_label', __('Total number of words', 'word-master'));
	$tag = get_option('word_master_word_count_tag', 'p');
	$style = get_option('word_master_word_count_style', ''); // Retrieve the saved style option
	$font = get_option('word_master_word_count_font', ''); // Retrieve the saved font option
	$position = get_option('word_master_word_count_position', ''); // Retrieve the saved position option
	$content .= sprintf('<%s style="%s; font-family: %s; position: %s;">%s: %s</%s>', $tag, $style, $font, $position, $label, $word_count, $tag);
	return $content;

}

add_action( 'the_content', 'wordmaster_count_words' );
