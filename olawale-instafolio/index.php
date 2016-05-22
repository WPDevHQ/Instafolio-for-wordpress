<?php
/*
Plugin Name: Instafolio
Plugin URI: http://wale.tech
Description: Instafolio by http://wale.tech
Author: Wale Morenigbade
Version: 1.0
Author URI: http://wale.tech
*/


/*
Dirty wordpress page template in plugins hack.
http://www.wpexplorer.com/wordpress-page-templates-plugin/
*/
define ("O_TEMP_PATH",plugin_dir_path( __FILE__ ));
define ("INSTA_PATH",plugins_url('',__FILE__));
/**
 * Instagram access token page meta.
 */
require O_TEMP_PATH . '/metabox.php';
/**
 * Instagram ajax blah blah
 */
require O_TEMP_PATH . '/ajax.php';
/**
 * Instafolio Customize Options
 */
require O_TEMP_PATH . '/customize.php';
/**
 * Instafolio Custom Styles
 */
require O_TEMP_PATH . '/styles.php';

class instagrid_PageTemplater {

	
		/**
         * A Unique Identifier
         */
		 protected $plugin_slug;

        /**
         * A reference to an instance of this class.
         */
        private static $instance;

        /**
         * The array of templates that this plugin tracks.
         */
        protected $templates;


        /**
         * Returns an instance of this class. 
         */
        public static function olawale_instagrid_get_instance() {

                if( null == self::$instance ) {
                        self::$instance = new instagrid_PageTemplater();
                } 

                return self::$instance;

        } 

        /**
         * Initializes the plugin by setting filters and administration functions.
         */
        private function __construct() {

                $this->templates = array();


                // Add a filter to the attributes metabox to inject template into the cache.
                add_filter(
					'page_attributes_dropdown_pages_args',
					 array( $this, 'olawale_instagrid_register_project_templates' ) 
				);


                // Add a filter to the save post to inject out template into the page cache
                add_filter(
					'wp_insert_post_data', 
					array( $this, 'olawale_instagrid_register_project_templates' ) 
				);


                // Add a filter to the template include to determine if the page has our 
				// template assigned and return it's path
                add_filter(
					'template_include', 
					array( $this, 'olawale_instagrid_view_project_template') 
				);


                // Add your templates to this array.
                $this->templates = array(
                    'instagrid-full.php'     => 'Instagrid Masonry',
					'instagrid-fullwidth.php'     => 'Instagrid Full Width',
					'instagrid-parallax.php'     => 'Instagrid Parallax',
					'instagrid-parallax-overlay.php'     => 'Instagrid Parallax Overlay',
                );
        } 


        /**
         * Adds our template to the pages cache in order to trick WordPress
         * into thinking the template file exists where it doens't really exist.
         *
         */

        public function olawale_instagrid_register_project_templates( $atts ) {

                // Create the key used for the themes cache
                $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

                // Retrieve the cache list. 
				// If it doesn't exist, or it's empty prepare an array
                $templates = wp_get_theme()->get_page_templates();
                if ( empty( $templates ) ) {
                        $templates = array();
                } 

                // New cache, therefore remove the old one
                wp_cache_delete( $cache_key , 'themes');

                // Now add our template to the list of templates by merging our templates
                // with the existing templates array from the cache.
                $templates = array_merge( $templates, $this->templates );

                // Add the modified cache to allow WordPress to pick it up for listing
                // available templates
                wp_cache_add( $cache_key, $templates, 'themes', 1800 );

                return $atts;

        } 

        /**
         * Checks if the template is assigned to the page
         */
        public function olawale_instagrid_view_project_template( $template ) {

                global $post;

                if (!isset($this->templates[get_post_meta( 
					$post->ID, '_wp_page_template', true 
				)] ) ) {
					
                        return $template;
						
                } 

                $file = plugin_dir_path(__FILE__). get_post_meta( 
					$post->ID, '_wp_page_template', true 
				);
				
                // Just to be safe, we check if the file exist first
                if( file_exists( $file ) ) {
                        return $file;
                } 
				else { //echo $file; 
				}

                return $template;

        } 


} 

add_action( 'plugins_loaded', array( 'instagrid_PageTemplater', 'olawale_instagrid_get_instance' ) );

/*
* Lets enqueue some google fonts :}
*/
function olawale_instagrid_scripts() {
$query_args = array(
	'family' => 'Montserrat:400,700|Lato:400,300,700,300italic',
	'subset' => 'latin,latin-ext'
);
/*imagesloaded*/
wp_enqueue_script( 'o-images-loaded', INSTA_PATH	.	'/js/imagesloaded.js' , array('jquery') );

/*isotope*/
wp_enqueue_script( 'isotope', INSTA_PATH	.	'/js/isotope.js' , array('jquery') );
	
/*scrollreveal*/
wp_enqueue_script( 'isotope', INSTA_PATH	.	'/js/scrollreveal.js' , array('jquery') );
	
/*instagrid*/
wp_enqueue_script( 'olawale-instagrid', INSTA_PATH	.	'/js/olawale-instagrid.js' , array('jquery') );
	
/*parallax*/
wp_enqueue_script( 'insta-parallax', INSTA_PATH	.	'/js/parallax.min.js' , array('jquery') );
	
wp_localize_script( 'olawale-instagrid', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );

wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ));

/*bootstrap grid*/
wp_enqueue_style( 'olawale-bootstrap-grid-only',  INSTA_PATH	.	'/css/bs-grid.css' );
	

	
}

add_action( 'wp_enqueue_scripts', 'olawale_instagrid_scripts' );

/*
singularize/correct texts if necessary
*/
function olawale_instagrid_singularize($num,$text){
	if($num == 1){
		return $text;
	} else {
		return $text."s";
	}
}

/*
* Register nav menus
*/
add_action( 'after_setup_theme', function () {
  register_nav_menu( 'insta-grid', 'Instagram' );
});

function olawale_instagrid_widgets_init() {

	register_sidebar( array(
		'name'          => 'InstaFolio',
		'id'            => 'instafolio',
		'before_widget' => '<div class="col-sm-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="insta_widget_title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'olawale_instagrid_widgets_init' );