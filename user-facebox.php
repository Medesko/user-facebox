<?php
/**
 * Plugin Name: User FaceBox
 * Plugin URI:
 * Description: User simple profile face.
 * Version: 1.0
 * Author: Mohamed KEITA
 * Author URI: 
 * License: Free
 */ 

// call all add_action hook 
add_action('admin_head', 'wp_call_css');
add_action('admin_enqueue_scripts', 'wp_enqueue_js');
add_action( 'show_user_profile', 'addFacebox' );
add_action( 'edit_user_profile', 'addFacebox' );
add_action( 'personal_options_update', 'saveFacebox' );
add_action( 'edit_user_profile_update', 'saveFacebox' );
add_filter( 'get_avatar', 'displayAuthorimage', 10, 5);

/* include enqueue files */
require_once('wp_enqueue.php');

/* Show custom user profile fields */
function addFacebox($user)
{ 
	?>
		<table class="form-table">
			<tr>
				<th>
					<label for="avatar_url">Votre Avatar</label>
					<td>
					<input  id="avatar_url" name="avatar_url" value="<?php echo esc_attr( get_the_author_meta( 'author_profile_picture', $user->ID ) ); ?>" />
					<input id="profile_picture" type="button" class="button" value="Uploader une image " /></td>
				</th>
			</tr>
			<tr>
				<th>
					<td>
						<div id="facebox_preview" style="min-height: 100px;">
							<img style="max-width:100%;" src="<?php echo esc_attr( get_the_author_meta( 'author_profile_picture', $user->ID ) ); ?>" />
						</div>					
					</td>
				</th>
			</tr>
		</table>
	<?php 
} 

/* Saving the user avatar */
function saveFacebox( $user_id ) {
	// if our current user can't edit this profile, false
    if( !current_user_can( 'edit_user', $user_id ) ){
        return false;
    }
    if( isset( $_POST['avatar_url'] ) ){
        update_user_meta( $user_id, 'author_profile_picture', esc_attr( $_POST['avatar_url'] ) );
     }
}

// Get user avatar by id or email and display username column  
function displayAuthorimage($avatar, $id_or_email, $size, $default='', $alt='') {
        $html = "";
        if ( is_numeric($id_or_email) ) {
                $id = (int) $id_or_email;
                $user = get_userdata($id);
                if ( $user )
                        $email = $user->user_email;
        } elseif ( is_object($id_or_email) ) {
 
                if ( !empty($id_or_email->user_id) ) {
                        $id = (int) $id_or_email->user_id;
                        $user = get_userdata($id);
                        if ( $user)
                                $email = $user->user_email;
                } elseif ( !empty($id_or_email->comment_author_email) ) {
                        $email = $id_or_email->comment_author_email;
                }
        } else {
                $email = $id_or_email;
        }
       
        if(!empty($email)) {
                $avatar_user = get_user_by('email', $email);
                $url = get_the_author_meta('author_profile_picture', $avatar_user->ID);
                if($avatar_user && $url){
                    $html = '<img class="avatar avatar-'.$size.' photo" width="64" height="64" src="'.$url.'"/>';              
                } 
        }else{
                $html = "<img alt='' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
        }
        return $html;
}


?>

