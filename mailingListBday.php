<?php 
	/*
	Plugin Name: Mailing List Bday
	Plugin URI: 
	Description: Plugin that creates a mailing list of users with their birthdays
	Author: Danny Lopes
	Version: 1.0
	Author URI: http://www.lopesdanny.com
	*/

			// Plugin Activation
		function mlbday_install()
		{
			global $wpdb;
			$table = $wpdb->prefix."mlbday";
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
				//echo 'TABLE NOT CREATED';
		
				$structure = "CREATE TABLE $table (
						id INT(9) NOT NULL AUTO_INCREMENT,
						mlbday_fname VARCHAR(200) NOT NULL,
						mlbday_lname VARCHAR(200) NOT NULL,
						mlbday_formemail VARCHAR(200) NOT NULL,
						mlbday_formoccasion VARCHAR(200) NOT NULL,
						mlbday_formdate DATE(50) NOT NULL,
					UNIQUE KEY id (id)
				);";
				$wpdb->query($structure);
			}
		}
		
		register_activation_hook( __FILE__, 'mlbday_install' );
		
			//Plugin Deactivation
		function mlbday_uninstall() {
			global $wpdb;	
		}
		register_deactivation_hook( __FILE__, 'mlbday_uninstall' );
	
	
			// load the jquery validation scripts
		function mlbday_vc_scripts()
		{
			wp_enqueue_script(
			'jquery-validate',
			plugin_dir_url( __FILE__ ) . 'js/jquery.validate.min.js',
			array('jquery'),
			'1.11.1',
			true
			);
			
			wp_enqueue_style(
			'jquery-validate',
			plugin_dir_url( __FILE__ ) . 'css/style.css',
			array(),
			'1.0'
			);
		}
		
		add_action('template_redirect', 'mlbday_vc_scripts');
		
		/**
		* Initiate the script.
		* Calls the validation options on the comment form.
		*/
	   function pbd_vc_init() { ?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
		
				   $('#mailForm1').validate({
					rules: {
						mlbday_fname: {
							required: true,
							minlength: 2
							
						},
						mlbday_lname: {
							required: true,
							minlength: 2
						},
						mlbday_occasion: {
							required: true
						},
						
						mlbday_formemail: {
							required: true,
							email: true
						},
						mlbday_date: {
							required: true,
							date: true
						}
					},
					messages: {
						email: "Enter valid Email."
						
					}
					});
				});
			</script>
	<?php }
		add_action('wp_footer', 'pbd_vc_init', 999);
		
		////////////ADMIN PAGE SETTINGS //////////////
		function mlbday_admin_actions()
		{
			add_options_page("Mailing List w/ Birthday", "Mail List", 1, "Another", "mlbday_admin");
		}
		
		function mlbday_admin()
		{
			include('mailingListBday_admin.php');
		}
	
		add_action('admin_menu', 'mlbday_admin_actions');
		
		////////////// END ADMIN PAGE SETTINGS //////////////////
		
		//////////////////SHORTCODE DOC ///////////////////////
		// [mail_form]
		function mailform_func()
		{
			ob_start();
			
			include('mainForm.php');
			//include('test.php');
			
			return ob_get_clean();
		}
		
		add_shortcode('mail_form', 'mailform_func' );
	
		///////////////////////////////END SHORTCODE ///////////////
		
		// ALL WIDGET STUFF, CURRENTLY NOT IN USE
		class mailingListWidget extends WP_Widget {

			function mailingListWidget() {
				// Instantiate the parent object
				parent::__construct( false, 'Mailing Widget' );
			}
		
			function widget( $args, $instance ) {
				// Widget output
			}
		
			function update( $new_instance, $old_instance ) {
				// Save widget options
			}
		
			function form( $instance ) {
				// Output admin widget options form
			}
		}
		
		function myplugin_register_widgets() {
			register_widget( 'mailingListWidget' );
		}
		
		add_action( 'widgets_init', 'myplugin_register_widgets' );		

		///////////////////////END WIDGET STUFF //////////////
?>