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
			//if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
				//echo 'TABLE NOT CREATED';
				
				$structure = "CREATE TABLE $table (
						id INT(9) NOT NULL AUTO_INCREMENT,
						mlbday_formdate DATE NOT NULL,
						mlbday_fname VARCHAR(200) NOT NULL,
						mlbday_lname VARCHAR(200) NOT NULL,
						mlbday_formemail VARCHAR(200) NOT NULL,
						mlbday_formoccasion VARCHAR(200) NOT NULL,
					UNIQUE KEY id (id)
				);";
				$wpdb->query($structure);
				
				//$wpdb->insert($table, array(
				//	'mlbday_fname' => 'Adam',
				//	'mlbday_lname' => 'James',
				//	'mlbday_formemail' => 'aj@aj.com',
				//	'mlbday_formoccasion' => 'Birthday',
				//	
				//));
			//}
		}
		
		register_activation_hook( __FILE__, 'mlbday_install' );
		
			//Plugin Deactivation
		function mlbday_uninstall() {
			global $wpdb;
			$drop = "DROP TABLE $table";
			$wpdb->query($drop);
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
		
		if($_POST['mailForm_hidden'])
		{
			$tableName = $wpdb->prefix."mlbday";
			$mlbday_fname = $_POST['mlbday_fname'];
			
			$mlbday_lname = $_POST['mlbday_lname'];
		
			$mlbday_email = $_POST['mlbday_formemail'];
		
			$mlbday_occasion = $_POST['mlbday_occasion'];
		
			//$mlbday_date = $_POST['mlbday_date'];
			$mlbday_date = date('Y-m-d', strtotime($_POST['mlbday_date']));
			//$mlbday_date = date('m-d', strtotime($_POST['mlbday_date']));
			//echo $mlbday_date;
			$exists = mysql_query("SELECT * FROM ".$wpdb->prefix."mlbday where mlbday_formemail like '".$wpdb->escape($mlbday_email)."' limit 1");
			
			if (mysql_num_rows($exists) <1) {
				
				
				$insert = "INSERT INTO ".$tableName." (mlbday_fname, mlbday_lname, mlbday_formoccasion, mlbday_formdate, mlbday_formemail) VALUES ('$mlbday_fname', '$mlbday_lname', '$mlbday_occasion', '$mlbday_date', '$mlbday_email')";
				$wpdb->query($insert);
				
				
				$formname = $mlbday_fname;
				$formemail = $mlbday_email;
				
				//Global Vars
				$sitename = get_bloginfo('name');
				$general_options = get_option('sa_general',$sa_general); 
				$layout_options = get_option('sa_layout',$sa_layout); 
				
				$emailto = $general_options['custom_email'];
				
				if (empty($emailto)){
					$emailto = get_bloginfo('admin_email');
				}
				
				$logo = $layout_options['upload_image0']; // get logo.
				if ($logo == '') { //If there is a custom logo, display it.
					$logo = '<h1>'.$sitename.'</h1>';
				}else{
					$logo = "<img src='".$logo."' id='' alt='$sitename' />";
				}
				$site_url = home_url();
				
				
				$emailheader = "<a href='$site_url'>".$logo."</a>";

				//$to = $emailto;
				$to = 'dlopes690@gmail.com';
				//$sub = __('A new message from ','eatery'). $sitename;
				
				//echo 'formname: '.$formname;
				//echo 'formemail: '.$formemail;
				//echo 'sitename: '.$sitename;
				//echo 'goptions: '.$general_options;
				//echo 'loptions: '.$layout_options;
				//echo 'emailto: '.$emailto;
				//echo 'logo: '.$logo;
				//echo 'site url: '.$site_url;
				//echo 'TO: '.$to;
				//$from_email = 'dlopes690@gmail.com';
				//$from_name = 'Danny';
				$sub = 'SUBJECT HERE';
				$msg = 'testing message';
			
					// MAIL PHP FUNCTION WORK, HOWEVER LETS TRY DEBUGGING pluggable.php  TO SEE WHY WP_MAIL DOESNT WORK
				//mail($to, $sub, $msg);
				
			
				//$phpmailer->From     = apply_filters( 'wp_mail_from'     , $from_email );
				//$phpmailer->FromName = apply_filters( 'wp_mail_from_name', $from_name  );
				//$headers = array("From: Test Name <dlopes690@gmail.com>",
				//"Content-Type: text/html"."\r\n"
				//);
				//$h = implode("\r\n",$headers) . "\r\n";
				
				//add_filter( 'wp_mail_content_type', 'set_html_content_type' );
				echo 'send over wp mail';
				wp_mail($to, $sub, $msg);
				
				
				//remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
				
				//try {
				//	$sent = @wp_mail($to, $sub, $msg);
				//} catch (Exception $e) {
				//	echo 'message: '.$e->getMessage();
				//	error_log('oops: ' . $e->getMessage()); // this line is for testing only!
				//}
				//
				//if ( $sent ) {
				//	error_log('hooray! email sent!'); // so is this one
				//} else {
				//	error_log('oh. email not sent.'); // and this one, too
				//}
				
			}
		}
		
		function set_html_content_type() {
			return 'text/html';
		}
		
?>