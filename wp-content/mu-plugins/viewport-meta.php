<?php
/**
 * Plugin Name: Viewport Meta Tag
 * Description: Ensures the viewport meta tag is present in the document head for mobile-first indexing.
 */

add_action( 'wp_head', 'ts_add_viewport_meta', 0 );

function ts_add_viewport_meta() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}
