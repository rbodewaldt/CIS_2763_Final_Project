<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       rbodewaldt1.example.com
 * @since      1.0.0
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/admin
 * @author     Robert Bodewaldt <rbodewaldt1@cnm.edu>
 */
class Directforstaff_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/directforstaff-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/directforstaff-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	// add functions ~ bOb
	/**
	public function register_directforstaff_post_type() {
	 	register_post_type( 'directforstaff',
	 		array(
	 			'labels' => array(
	 				'name' => __( 'Staff Directory' ),
	 				'singular_name' => __( 'Staff Directory' )
				),
	 		'public' => true,
	 		'has_archive' => true,
	 		)
	 	);	
	}
	*/
	 

	public function register_directforstaff_post_type() {
	$labels = array(
		'name'          => __( 'Staff Directory' ),
		'singular_name' => __( 'Staff Directory' ),
	);
	
	$args = array(
		'labels'      => $labels,
		'public'      => true,
		'has_archive' => true,
		'supports'      => array( 'title', 'editor', 'thumbnail' ),
	);
	
	register_post_type( 'directforstaff', $args );
	}
	
	
	
	
	
	
	
	
	
	public function display_directforstaff_meta_fields() {
		//https://developer.wordpress.org/reference/functions/add_meta_box/
		//add_meta_box(id,title,callback,screen,context,priority,callback_args)
		add_meta_box("directforstaff_meta", "Staff Directory Details", array($this,"render_directforstaff_meta_options"), "directforstaff", "normal", "default");
	}
	public function render_directforstaff_meta_options() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/directforstaff-admin-display.php';
	}
	
	
	
	public function save_directforstaff_meta_fields() {
		global $post;
		//first name
		$directforstaff_first_name = sanitize_text_field( $_POST['directforstaff_first_name'] );
		update_post_meta($post->ID, "directforstaff_first_name", $directforstaff_first_name);
		
		//last name
		$directforstaff_last_name = sanitize_text_field( $_POST['directforstaff_last_name'] );
		update_post_meta($post->ID, "directforstaff_last_name", $directforstaff_last_name);
		
		//email
		$directforstaff_email = sanitize_text_field( $_POST['directforstaff_email'] );
		update_post_meta($post->ID, "directforstaff_email", $directforstaff_email);
		
		//phone
		$directforstaff_phone = sanitize_text_field( $_POST['directforstaff_phone'] );
		update_post_meta($post->ID, "directforstaff_phone", $directforstaff_phone);
		
		//job position
		$directforstaff_job_position = sanitize_text_field( $_POST['directforstaff_job_position'] );
		update_post_meta($post->ID, "directforstaff_job_position", $directforstaff_job_position);
		
		//sort order
		$directforstaff_sort_order = sanitize_text_field( $_POST['directforstaff_sort_order'] );
		update_post_meta($post->ID, "directforstaff_sort_order", $directforstaff_sort_order);
	}			   
	function directforstaff_sort_menu(){
		//add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
		add_submenu_page( 'edit.php?post_type=directforstaff', 'Sort', 'Sort', 'manage_options', 'directforstaff_sort', array($this,'render_directforstaff_sort') ); 
	}

	public function render_directforstaff_sort() {
		//die('render_directforstaff_sort');
		require_once plugin_dir_path( __FILE__ ) . 'partials/directforstaff-admin-sort.php';
	}
	
}
