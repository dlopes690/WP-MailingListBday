<?php 
		if($_POST['mlbday_hidden'] == 'Y') {
			//Form data sent
				// update the email option in wp database
			$email = $_POST['mlbday_email'];
			update_option('mlbday_email', $email);
			
		?>
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
		}else {
				// get the options from the database to populate inputs
			$email = get_option('mlbday_email');
		}?>

	<div class="wrap">
		<h2>Mailing List</h2>
	
		
		<form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
			<input type="hidden" name="mlbday_hidden" value="Y">
				
			<?php _e("Email: " ); ?><input type="email" name="mlbday_email" value = "<? echo $email; ?>" /><?php _e(" ex: test@tssest.com" ); ?>

			<?php submit_button(); ?>
		</form>

	</div>