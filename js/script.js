jQuery(document).ready(function($){
	$('#profile_picture').click(function(event) {
		event.preventDefault();
		// Display ThickBox Iframe
		tb_show('User Facebox', 'media-upload.php?referer=profile&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
	});
	window.send_to_editor = function(html) {
		// get picture url
		var image_url = $('img',html).attr('src');
		// insert to input 
		$('#avatar_url').val(image_url); 
		// Closes ThickBox iframe 
		tb_remove();
		// FadeIn picture preview 
		$('#facebox_preview').fadeIn().html('<img src="'+image_url+'" style="max-width:100%; max-height:100%;" />');				
		$('#submit_options_form').trigger('click');
	}
	
});
