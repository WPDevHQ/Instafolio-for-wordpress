<?php
function olawale_instagrid_styles() {
	/*instagrid css*/
wp_enqueue_style( 'olawale-instagrid-css',  INSTA_PATH	.	'/css/olawale-instagrid.css' );
        $bg_color = get_theme_mod("olawale-instagrid-bg-color",'#f6f6f6');
		$menu_color = get_theme_mod('olawale-instagrid-menu-color','#fff');
		$page_title_color = get_theme_mod('olawale-instagrid-page-title-color','#fff');
		$page_title_border_color = get_theme_mod('olawale-instagrid-page-title-border-color','#ccc');
		$page_content_color = get_theme_mod('olawale-instagrid-page-content-color','#DDDDDD');
		$username_color = get_theme_mod('olawale-instagrid-username-color','#fff');
		$bio_color = get_theme_mod('olawale-instagrid-bio-color','#666');
		$counts_color = get_theme_mod('olawale-instagrid-counts-color','#fff');
		$bio_bg = get_theme_mod('olawale-instagrid-profile-bg-color','#151515');
		$hover_bg = get_theme_mod('olawale-instagrid-hover-bg-color','#fff');
		$hover_text_color = get_theme_mod('olawale-instagrid-hover-text-color','#808080');
		$load_btn_bg = get_theme_mod('olawale-instagrid-load-more-bg','#fff');
		$load_btn_text_color = get_theme_mod('olawale-instagrid-load-more-color','#000');
		$load_btn_border_color = get_theme_mod('olawale-instagrid-load-more-border-color','#DCDCDC');
		$footer_bg_color = get_theme_mod('olawale-instagrid-footer-bg','#fff');
		$widget_title_color = get_theme_mod('olawale-instagrid-widget-title-color','#000');
        $custom_css = "
                body.olawale-instameta{
                    background: $bg_color !important;
                }
				.instamenu li {
				color: $menu_color;
				}
				.insta-constrained .insta-title{
				color: $page_title_color;
				border-color: $page_title_border_color;
				}
				p.insta-contents{
				color: $page_content_color;
				}
				.insta_profile_img > span{
				color: $username_color;
				}
				.insta-meta h3{
				color: $bio_color;
				}
				.olawale-figure,.olawale-countmeta{
				color: $counts_color;
				}
				.insta-meta{
				background-color: $bio_bg;
				}
				div.insta-element:hover > div:first-of-type:not(.parallax-gram){
				background-color: $hover_bg;
				}
				div.insta-element:hover > div > div h2{
				color: $hover_text_color;
				}
				.load_more_grams{
				background-color: $load_btn_bg;
				color: $load_btn_text_color;
				}
				.load_more_grams{
				border-color: $load_btn_border_color;
				}
				.instagrid_footer > div{
				background-color: $footer_bg_color;
				}
				.insta_widget_title{
				color: $widget_title_color;
				}
				";
	
        wp_add_inline_style( 'olawale-instagrid-css', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'olawale_instagrid_styles' , 1);