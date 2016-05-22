<?php
	/*
	Instagram Plugin wale.tech
	*/
	?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php wp_head(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body class="olawale-instameta instagrid-fullwidth instagrid-fullwidth-parallax insta-fullwidth-overlay-parallax">
		<div class="insta_loader">
			<div>
				<div class="insta_img" style="background-image:url(<?php echo INSTA_PATH; ?>/assets/instaglyph.png)"></div>
				<div class="insta_reel">
				</div>
				<!--<div class="insta_loader_progress">
					</div>-->
			</div>
		</div>
		<div class="instamenu">
			<?php
				if ( has_nav_menu( 'insta-grid' ) ) {
					wp_nav_menu( array( 'theme_location' => 'insta-grid','depth' => 1) ); 
				}
				?>
		</div>
		<?php
			/*starting the loop :}*/
			if ( have_posts() ) {
			while ( have_posts() ) { 
			the_post();
			$id = get_the_ID();
			/*
			if no featured image exists, get a random image from "our friends at unsplash" :) :)
			*/
			if ( has_post_thumbnail() ) {
			  	$thumb =  wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0];
			} else {
				$thumb = "https://unsplash.it/1920/1080?random";
			}
			?>
		<div style="background-image:url(<?php echo $thumb; ?>);" class="insta-featured">
			<div class="featured-child">
				<div class="insta-constrained">
					<h2 class="insta-title"><?php the_title(); ?></h2>
					<p class="insta-contents"><?php echo wp_strip_all_tags(get_the_content(),true); ?></p>
				</div>
			</div>
		</div>
		<?php
			}}
			/*
			profile meta sourcing :}
			*/
			$token = get_post_meta( $id, 'access_token', true );
			$meta_response = wp_remote_get("https://api.instagram.com/v1/users/self/?access_token=$token");
			if(is_array($meta_response)){
			if(isset($meta_response['body'])){
			$meta_body = json_decode($meta_response['body']);
			$status_code = $meta_body->meta->code;
			if($status_code != 200){
				echo "<span class='insta-error-parent'><span class='insta-error'>"	. 	$meta_body->meta->error_message		.	"</span></span>";
			
				goto footer;
			}
			$username = $meta_body->data->username;
			$fullname = $meta_body->data->full_name;
			$profile_picture_url = $meta_body->data->profile_picture;
			$bio = $meta_body->data->bio;
			$posts = $meta_body->data->counts->media;
			$followers = $meta_body->data->counts->followed_by;
			$following = $meta_body->data->counts->follows;
			if($posts == ""){
				$posts = 0;
			}
			if($followers == ""){
				$followers = 0;
			}
			if($following == ""){
				$following = 0;
			}
			} else { goto footer; }
			
			}
			?>
		<div class="insta_sub_body">
			<div class="insta-pics clearfix insta-pics-fw">
				<div class="olawale-insta-meta-parent col-sm-6 olawale-insta-meta-parent-sze-two">
					<div class="insta_profile_img" style="background-image:url(<?php echo $profile_picture_url; ?>)">
						<div></div>
						<span>@<?php echo $username; ?></span>
					</div>
					<div class="insta-meta clearfix">
						<h3>
							<?php echo preg_replace('/\s+/', ' ',$bio); ?>
						</h3>
						<div class="insta_counts clearfix">
							<div class="olawale-count">
								<span class="olawale-figure"><?php echo $followers; ?></span>
								<span class="olawale-countmeta"><?php echo olawale_instagrid_singularize($followers,"Follower"); ?></span>
							</div>
							<div class="olawale-count">
								<span class="olawale-figure"><?php echo $following; ?></span>
								<span class="olawale-countmeta">Following</span>
							</div>
							<div class="olawale-count">
								<span class="olawale-figure"><?php echo $posts; ?></span>
								<span class="olawale-countmeta"><?php echo olawale_instagrid_singularize($posts,"Post"); ?></span>
							</div>
						</div>
					</div>
				</div>
				<?php
					$iterator_count = 0;
					$response = wp_remote_get( "https://api.instagram.com/v1/users/self/media/recent/?access_token=$token" );
					if( is_array($response) ) {
					$resp_meta = json_decode($response['body']);
					
					//if a status code exists, and the error code is not instagram's successful 200 code echo the error message and stop!.
					
					if(isset($resp_meta->meta->code)){
					$status_code = $resp_meta->meta->code;
					if($status_code != 200){
						echo "<span class='insta-error-parent'><span class='insta-error'>"	. 	$resp_meta->meta->error_message		.	"</span></span>";
						goto footer;
					}
					}
						
					$header = $response['headers']; // array of http header lines
					$body = $response['body']; // use the content
					$result = json_decode($body);
						
					foreach ($result->data as $insta_post) { ?>
				<div data-url="<?php echo $insta_post->link; ?>" class="insta-element insta-element-sze-two">
					<!--instapic-->
					<div class="parallax-gram" data-parallax="scroll" data-bleed="0" data-speed="0.2" data-image-src="<?php echo $insta_post->images->standard_resolution->url; ?>" data-natural-width="500" data-z-index="999999" data-natural-height="500">	 </div>
					<?php
						if(isset($insta_post->caption->text)){
						
						$caption = htmlentities($insta_post->caption->text);
						?>
					<span class="insta-overlay-caption"><?php echo $caption; ?></span>
					<?php }
						?>
				</div>
				<!--/instapic-->
				<?php } 
					} ?>
			</div>
			<div class="insta_load_more">
				<div data-nexturl="<?php echo $result->pagination->next_url; ?>" class="load_more_grams load_more_grams_parallax_fw_overlay">LOAD MORE</div>
			</div>
		</div>
		<?php
			footer:
			wp_footer(); ?>
		<footer class="instagrid_footer">
			<div>
				<?php if ( is_active_sidebar( 'instafolio' ) ) { 
					dynamic_sidebar( 'instafolio' ); 
					}
					?>
			</div>
		</footer>
	</body>
</html>