jQuery(document).ready(function($){
	$('#profile_picture').click(function() {
		tb_show('User Facebox', 'media-upload.php?referer=profile&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
		return false;
	});
	window.send_to_editor = function(html) {
		var image_url = $('img',html).attr('src');
		$('#avatar_url').val(image_url); 
		tb_remove();
		$('#facebox_preview').fadeIn().html('<img src="'+image_url+'" style="max-width:100%; max-height:100%;" />');				
		$('#submit_options_form').trigger('click');
	}
	
});
