(function ($) {
		"use strict";
		var $instagrid;
		$(document).ready(function() {
			$('.insta-pics').imagesLoaded(function() {
				$instagrid = $('.insta-pics').isotope({
					itemSelector: '.gridded',
					masonry: {
						columnWidth: 1
					}
				});
			});

			function arrange_instagrid() {
				$(".insta-pics").toggleClass("instafresh");
					$('.insta-pics').imagesLoaded(function() {
					$(".insta-pics").isotope('layout');
					});
					$(".insta-pics").toggleClass("instafresh");
			}
			
			/*ajax loadmore for normal grams*/

			$(".load_more_grams_normal").click(function() {
				var data = {
					'action': 'more_grams',
					'next_url': $(this).data("nexturl")
				};
				jQuery.post(ajax_object.ajax_url, data, function(response) {
					$instagrid.isotope('insert',$(response));
					arrange_instagrid();
					if($(".insta_next_meta").text() != ""){
					$(".load_more_grams").data("nexturl",$(".insta_next_meta").text());
					$(".insta_next_meta").remove();
					} else {
					$(".load_more_grams").fadeOut();
					}
				})
			})
			
			/*ajax load more for fullwidth grams*/
			
			$(".load_more_grams_normal_fw").click(function() {
				var data = {
					'action': 'more_grams_fullwidth',
					'next_url': $(this).data("nexturl")
				};
				jQuery.post(ajax_object.ajax_url, data, function(response) {
					$(".insta-pics").append(response);
					if($(".insta_next_meta").text() != ""){
					$(".load_more_grams").data("nexturl",$(".insta_next_meta").text());
					$(".insta_next_meta").remove();
					} else {
					$(".load_more_grams").fadeOut();
					}
				})
			})
			
			/*ajax load more for fullwidth parallax*/
			
			$(".load_more_grams_parallax_fw").click(function() {
				var data = {
					'action': 'more_grams_fullwidth_parallax',
					'next_url': $(this).data("nexturl")
				};
				jQuery.post(ajax_object.ajax_url, data, function(response) {
					$(".insta-pics").append(response);
					jQuery(window).trigger('resize').trigger('scroll');
					$('.parallax-gram').parallax();
						
					if($(".insta_next_meta").text() != ""){
					$(".load_more_grams").data("nexturl",$(".insta_next_meta").text());
					$(".insta_next_meta").remove();
					} else {
					$(".load_more_grams").fadeOut();
					}
				})
			})
			
			setInterval(function(){ 
			$(".insta_loader > div .insta_img").fadeToggle();
			}, 1000);
			
			/*ajax load more for fullwidth parallax overlay*/
			
			$(".load_more_grams_parallax_fw_overlay").click(function() {
				var data = {
					'action': 'more_grams_fullwidth_parallax_overlay',
					'next_url': $(this).data("nexturl")
				};
				jQuery.post(ajax_object.ajax_url, data, function(response) {
					$(".insta-pics").append(response);
					jQuery(window).trigger('resize').trigger('scroll');
					$('.parallax-gram').parallax();
						
					if($(".insta_next_meta").text() != ""){
					$(".load_more_grams").data("nexturl",$(".insta_next_meta").text());
					$(".insta_next_meta").remove();
					} else {
					$(".load_more_grams").fadeOut();
					}
				})
			})
			
			$(".insta-element").click(function(){
				$("div.insta_loader").fadeToggle();
				setTimeout(function() {
				$("div.insta_loader").fadeToggle();
				}, 5000);
				window.location = $(this).data("url");
			})
			
			/*open instagram profile on meta click*/
			$(".olawale-insta-meta-parent").click(function(){
				$("div.insta_loader").fadeToggle();
				setTimeout(function() {
				$("div.insta_loader").fadeToggle();
				}, 5000);
				window.location = 'https://instagram.com/'+$(".insta_profile_img > span").text().replace('@','');;
			})

		})

			$(window).load(function() {
				setTimeout(function() {
					$("div.insta_loader").fadeToggle();
				}, 3000);
			})
			
			/*fade in instagram loader on ajaxcalls start*/
			$( document ).ajaxStart(function() {
				$("div.insta_loader").remove();
			});
	
			$( document ).ajaxStop(function() {
				setTimeout(function() {
  $("div.insta_loader").fadeToggle();
					}, 1500);
});
			
		})(jQuery);