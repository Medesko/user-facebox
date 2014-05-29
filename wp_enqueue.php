<?php 
// call plugin css
function wp_call_css() {
	wp_register_style('facebox', plugins_url('style.css', __FILE__));
	wp_enqueue_style('facebox');
}
// call plugin js
function wp_enqueue_js() {
	wp_register_script( 'facebox', plugins_url('js/script.js', __FILE__), array('jquery','media-upload','thickbox') );
	if ( 'profile' == get_current_screen() -> id || 'user-edit' == get_current_screen() ->id ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('facebox');
	}
}



