<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       rbodewaldt1.example.com
 * @since      1.0.0
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/public
 * @author     Robert Bodewaldt <rbodewaldt1@cnm.edu>
 */
class Directforstaff_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Directforstaff_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Directforstaff_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/directforstaff-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Directforstaff_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Directforstaff_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/directforstaff-public.js', array( 'jquery' ), $this->version, false );

	}
	
	// add functions ~ bOb
	function directforstaff_change_sort_order($query) {
        if ( is_archive( 'directforstaff_post_type' ) ) {
           $query->set( 'order', 'ASC' );
		   $query->set( 'meta_key', 'directforstaff_sort_order' );
		   $query->set( 'orderby', 'meta_value_num' ); 
		}
	}

	function directforstaff_template_chooser( $template ) {
	
		// Post ID
		$post_id = get_the_ID();
	 
		// For all other CPT
		if ( get_post_type( $post_id ) != 'directforstaff' ) {
			return $template;
		}
	 
		// Else use custom template ~ single
		if ( is_single() ) {
			return $this->directforstaff_get_template_hierarchy( 'single' );
		}

		// Else use custom template ~ archive
		if ( is_archive() ) {
			return $this->directforstaff_get_template_hierarchy( 'archive' );
		}		
	}

	function directforstaff_get_template_hierarchy( $template ) {
	
		// Get the template slug
		$template_slug = rtrim( $template, '.php' );
		$template = $template_slug . '.php';
	 
		// Check if a custom template exists in the theme folder, if not, load the plugin template file
		if ( $theme_file = locate_template( array( 'directforstaff/' . $template ) ) ) {
			$file = $theme_file;
		}
		else {
			$file = plugin_dir_path( __FILE__ ) . 'templates/' . $template;
		}
	 
		return apply_filters( 'directforstaff_template_' . $template, $file );
	}	

}
