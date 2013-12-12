<?php
	if (isset($_POST['send'])) {
		
		$formname = $_POST['mlbday_fname'] . $_POST['mlbday_lname'];
		$formemail = $_POST['mlbday_formemail'];
	
		// Global variables for the email autoresponder
		$sitename = get_bloginfo('name');
	
		$emailto = $general_options['custom_email'];
		
		$logo = $layout_options['upload_image0']; // get logo.
		if ($logo == '') { //If there is a custom logo, display it.
			$logo = '<h1>'.$sitename.'</h1>';
		}else{
			$logo = "<img src='".$logo."' id='' alt='$sitename' />";
		}
		
		$site_url = home_url();
		
		$emailheader = "<a href='$site_url'>".$logo."</a>";
		
		$to = $emailto;
		$subject = __('A new message from ','eatery'). $sitename;
	}

?>