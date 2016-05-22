<?php
/*
page meta for the access tokens.
*/
add_action( 'add_meta_boxes', function(){
	add_meta_box( 'olawale-acceess-token' , 'Instagram Access Token' , 'olawale_instagrid_cb', 'page' );
} );

function olawale_instagrid_cb(){
	global $post;
	
	$token = sanitize_text_field(get_post_meta($post->ID, 'access_token', true ));
	
	?>
	<p>Your access token can be generated <a href="http://instagram.pixelunion.net/">HERE</a></p>
	<input type="hidden" name="token_nonce_name" id="token_nonce_name" value="<?php echo wp_create_nonce('token_nonce'); ?>" />

	<label>Instagram Access Token</label>
	<input type="text" name="access_token" placeholder="e04bd893d.s49f4gvsvsw323e01wdvadv9" value="<?php echo $token; ?>" class="widefat" />  <?php
}


// Save the token Metabox Data

function olawale_save_access_token($post_id, $post) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if(!isset($_POST['token_nonce_name'])){
		return;
	}
	
	if ( !wp_verify_nonce( $_POST['token_nonce_name'],'token_nonce' )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	
	if(isset($_POST['access_token'])){
	
	$token = sanitize_text_field($_POST['access_token']);
	
	}

	// Add values of $skill_meta as custom fields
	
	if(!empty($token)){
	
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice

		if(get_post_meta($post->ID, "access_token", FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, "access_token", $token);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, "access_token", $token);
		}	
	} else {
		delete_post_meta($post->ID, "access_token"); // Delete if blank
	}

}

add_action('save_post', 'olawale_save_access_token', 6, 2); // save the custom fields