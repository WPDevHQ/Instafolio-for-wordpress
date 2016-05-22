<?php
/*
ajax for instagrid  to load more grams
*/

function olawale_instagrid_loadmore(){
/*instagram pagination*/
$next_url = $_POST['next_url'];
$pagination_count = 0;
if($next_url){
$response = wp_remote_get( $next_url );
$resp_meta = json_decode($response['body']);
$header = $response['headers']; // array of http header lines
$body = $response['body']; // use the content
$result = json_decode($body);
ob_start();
foreach ($result->data as $insta_post) { ?>
	<div class="insta-element gridded"> <!--instapic-->
		<img src="<?php echo $insta_post->images->standard_resolution->url; ?>">	
		<?php
		if(isset($insta_post->caption->text)){

		$caption = htmlentities($insta_post->caption->text);
		?>
		<div>
			<div>
				<h2><?php echo $caption; ?></h2>
			</div>
		</div>
		<?php 
		}
		?>
	</div> <!--/instapic-->
<?php }
$content = ob_get_contents();
ob_end_clean();
//if($result->pagination->next_url){
	$next_url = $result->pagination->next_url;
	echo "<span class='insta_next_meta gridded'>$next_url</span>";
	echo $content;
//}
}
	die();
}

add_action( 'wp_ajax_more_grams', 'olawale_instagrid_loadmore' );
add_action( 'wp_ajax_nopriv_more_grams', 'olawale_instagrid_loadmore' );


/*
ajax for instagrid  to load more grams - fullwidth
*/

function olawale_instagrid_loadmore_fullwidth(){
/*instagram pagination*/
$next_url = $_POST['next_url'];
$pagination_count = 0;
if($next_url){
$response = wp_remote_get( $next_url );
$resp_meta = json_decode($response['body']);
$header = $response['headers']; // array of http header lines
$body = $response['body']; // use the content
$result = json_decode($body);
ob_start();
foreach ($result->data as $insta_post) { ?>
	<div class="insta-element insta-element-sze-two"> <!--instapic-->
		<img src="<?php echo $insta_post->images->standard_resolution->url; ?>">	
		<?php
		if(isset($insta_post->caption->text)){

		$caption = htmlentities($insta_post->caption->text);
		?>
		<div>
			<div>
				<h2><?php echo $caption; ?></h2>
			</div>
		</div>
		<?php 
		}
		?>
	</div> <!--/instapic-->
<?php }
$content = ob_get_contents();
ob_end_clean();
//if($result->pagination->next_url){
	$next_url = $result->pagination->next_url;
	echo "<span class='insta_next_meta gridded'>$next_url</span>";
	echo $content;
//}
}
	die();
}

add_action( 'wp_ajax_more_grams_fullwidth', 'olawale_instagrid_loadmore_fullwidth' );
add_action( 'wp_ajax_nopriv_more_grams_fullwidth', 'olawale_instagrid_loadmore_fullwidth' );


/*
ajax for instagrid  to load more grams - parallax
*/

function olawale_instagrid_loadmore_fullwidth_parallax(){
/*instagram pagination*/
$next_url = $_POST['next_url'];
$pagination_count = 0;
if($next_url){
$response = wp_remote_get( $next_url );
$resp_meta = json_decode($response['body']);
$header = $response['headers']; // array of http header lines
$body = $response['body']; // use the content
$result = json_decode($body);
ob_start();
foreach ($result->data as $insta_post) { ?>
	<div class="insta-element insta-element-sze-two"> <!--instapic-->
		<div class="parallax-gram insta-parall"-alt data-parallax="scroll" data-bleed="0" data-speed="0.2" data-image-src="<?php echo $insta_post->images->standard_resolution->url; ?>" data-natural-width="500" data-z-index="999999" data-natural-height="500">	 </div>
		<?php
		if(isset($insta_post->caption->text)){

		$caption = htmlentities($insta_post->caption->text);
		?>
		<div class="insta-parall-alt">
			<div>
				<h2><?php echo $caption; ?></h2>
			</div>
		</div>
		<?php 
		}
		?>
	</div> <!--/instapic-->
<?php }
$content = ob_get_contents();
ob_end_clean();
//if($result->pagination->next_url){
	$next_url = $result->pagination->next_url;
	echo "<span class='insta_next_meta gridded'>$next_url</span>";
	echo $content;
//}
}
	die();
}

add_action( 'wp_ajax_more_grams_fullwidth_parallax', 'olawale_instagrid_loadmore_fullwidth_parallax' );
add_action( 'wp_ajax_nopriv_more_grams_fullwidth_parallax', 'olawale_instagrid_loadmore_fullwidth_parallax' );


/*
ajax for instagrid  to load more grams - parallax overlay
*/

function olawale_instagrid_loadmore_fullwidth_parallax_overlay(){
/*instagram pagination*/
$next_url = $_POST['next_url'];
$pagination_count = 0;
if($next_url){
$response = wp_remote_get( $next_url );
$resp_meta = json_decode($response['body']);
$header = $response['headers']; // array of http header lines
$body = $response['body']; // use the content
$result = json_decode($body);
ob_start();
foreach ($result->data as $insta_post) { ?>
	<div class="insta-element insta-element-sze-two"> <!--instapic-->
		<div class="parallax-gram insta-parall"-alt data-parallax="scroll" data-bleed="0" data-speed="0.2" data-image-src="<?php echo $insta_post->images->standard_resolution->url; ?>" data-natural-width="500" data-z-index="999999" data-natural-height="500">	 </div>
		<?php
		if(isset($insta_post->caption->text)){

		$caption = htmlentities($insta_post->caption->text);
		?>
			<span class="insta-overlay-caption"><?php echo $caption; ?></span>
		<?php 
		}
		?>
	</div> <!--/instapic-->
<?php }
$content = ob_get_contents();
ob_end_clean();
//if($result->pagination->next_url){
	$next_url = $result->pagination->next_url;
	echo "<span class='insta_next_meta gridded'>$next_url</span>";
	echo $content;
//}
}
	die();
}

add_action( 'wp_ajax_more_grams_fullwidth_parallax_overlay', 'olawale_instagrid_loadmore_fullwidth_parallax_overlay' );
add_action( 'wp_ajax_nopriv_more_grams_fullwidth_parallax_overlay', 'olawale_instagrid_loadmore_fullwidth_parallax_overlay' );