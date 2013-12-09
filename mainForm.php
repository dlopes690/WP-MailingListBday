<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<?php
  if($_POST['mailForm_hidden'] == 'Y')
  {
	//echo 'here with post';
	$mlbday_fname = $_POST['mlbday_fname'];
	//update_option('mlbday_formfname', $mlbday_fname);
	
	$mlbday_lname = $_POST['mlbday_lname'];
	//update_option('mlbday_formlname', $mlbday_lname);
	
	$mlbday_email = $_POST['mlbday_formemail'];
	//$getEmails = array();
	//$getEmails = get_option('mlbday_formemail');
	//$getEmails[] = $mlbday_email;
	//update_option('mlbday_formemail', $mlbday_email);
	
	$mlbday_occasion = $_POST['mlbday_occasion'];
	//update_option('mlbday_formoccasion', $mlbday_occasion);
	
	$mlbday_date = $_POST['mlbday_date'];
	//update_option('mlbday_formdate', $mlbday_date);
	
	//$exists = mysql_query("SELECT * FROM ".$wpdb->prefix."mlbday where mlbday_formemail like '".$wpdb->escape($mlbday_email)."' limit 1");
	
	//if (mysql_num_rows($exists) <1) {
	//  $wpdb->query("insert into ".$wpdb->prefix."mlbday (mlbday_fname, mlbday_lname, mlbday_formemail, mlbday_formoccasion, mlbday_formdate )
	//			   values ('".$wpdb->escape($mlbday_fname)."', '".$wpdb->escape($mlbday_lname)."', '".$wpdb->escape($mlbday_email)."', '".$wpdb->escape($mlbday_occasion)."', '".$wpdb->escape($mlbday_date)."', '"."')");
	//}
  }

  //delete_option('mlbday_formfname');
  //delete_option('mlbday_formlname');
  //delete_option('mlbday_formemail');
  //delete_option('mlbday_formoccasion');
  //delete_option('mlbday_formdate');
?>
  


<script>
  $( document ).ready(function() {
	$( "#datepicker" ).datepicker({ dateFormat: "mm-dd" });
  });
</script>

<!--<div id="form-wrapper">-->
  <h4>Subscribe to our Mailing List</h4>
	  <form id="mailForm1" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post" >
		  <input type="hidden" name="mailForm_hidden" value="Y">
		  <input class="input-text" type="text" name="mlbday_fname" placeholder="First Name" /><br />
		  <input class="input-text" type="text" name="mlbday_lname" placeholder="Last Name" /><br />
		  
		  
		  <input class="input-text" type="text" id="mlbday_formemail" name="mlbday_formemail" placeholder="Email" class="" /><br />
		  
		  
		  
		  <select class="input-select" name="mlbday_occasion">
			  <option>Birthday</option>
			  <option>Anniversary</option>
		  </select><br />
		  
		  <input class="input-text" type="text" placeholder="Pick Date" id="datepicker" name="mlbday_date" /><br />
		  
		  <input type="submit" name="send" value="Submit" />
		  
	  </form>
<!--</div>-->