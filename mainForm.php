<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<?php
//global $wpdb;
//$tableName = $wpdb->prefix."mlbday";
//$wpdb->query('TRUNCATE '.$tableName);

			//global $wpdb;
			//$table = $wpdb->prefix."mlbday";
			////if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {
			//	//echo 'TABLE NOT CREATED';
				//$drop = "DROP TABLE $table";
			//	$structure = "CREATE TABLE $table (
			//			id INT(9) NOT NULL AUTO_INCREMENT,
			//			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			//			mlbday_formdate DATE NOT NULL,
			//			mlbday_fname VARCHAR(200) NOT NULL,
			//			mlbday_adfasfdasname VARCHAR(200) NOT NULL,
			//			mlbday_lname VARCHAR(200) NOT NULL,
			//			mlbday_formemail VARCHAR(200) NOT NULL,
			//			mlbday_formoccasion VARCHAR(200) NOT NULL,
			//			
			//		UNIQUE KEY id (id)
			//	);";
			//	$wpdb->query($drop);
			//	
			//	$results = $wpdb->get_results("DESC ".$wpdb->prefix."mlbday");
			//	//$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mlbday");
			//	echo '<pre>';
			//	print_r($results);
			//	echo '</pre>';

?>
  <?php  //$results = $wpdb->query("SELECT * FROM mlbday"); ?>


<script>
  $( document ).ready(function() {
	$( "#datepicker" ).datepicker();
  });
</script>

<!--<div id="form-wrapper">-->
  <h4>Subscribe to our Mailing List</h4>
	  <?php
		echo 'bloginfo: '.get_bloginfo('name');
		echo 'adminemail: '.get_settings('admin_email');
	  
	  ?>
  
	  <form id="mailForm1" method="post" >
		  <input type="hidden" name="mailForm_hidden" value="1">
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
