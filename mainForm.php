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
<?php
	
		
		$formname = 'Adam Morgan';
		$formemail = 'am@am.com';
	
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
		$subject = 'Thank you for subscribing to '. $sitename;
		
		//echo $formname;
		//echo $formemail;
		//
		//echo 'sn:'.$sitename;
		//echo 'emailto'.$emailto;
		//echo 'logo:'.$logo;
		//echo 'surl:'.$site_url;
		//echo 'eheader:'.$emailheader;
		//echo 'to:'.$to;
		//echo 'subject:'.$subject;
		
		$msg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   
        <title>'.$sub.'</title>
		<style type="text/css">
			
			#outlook a{padding:0;} 
			body{width:100% !important;} 
			body{-webkit-text-size-adjust:none;} 

			/* Reset Styles */
			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}

			body, #backgroundTable{
				background-color:#FAFAFA;
			}

			
			#templateContainer{
				border: 1px solid #DDDDDD;
			}

			
			h1, .h1{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:34px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			
			h2, .h2{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:30px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			
			h3, .h3{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:26px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			
			h4, .h4{
				 color:#202020;
				display:block;
				 font-family:Arial;
				 font-size:22px;
				 font-weight:bold;
				 line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				 text-align:left;
			}

			

			
			#templatePreheader{
				 background-color:#FAFAFA;
			}

			
			.preheaderContent div{
				 color:#505050;
				 font-family:Arial;
				 font-size:10px;
				 line-height:100%;
				 text-align:left;
			}

			
			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#336699;
				 font-weight:normal;
				 text-decoration:underline;
			}

			

			
			#templateHeader{
				 background-color:#FFFFFF;
				 border-bottom:0;
			}

			
			.headerContent{
				 color:#202020;
				 font-family:Arial;
				 font-size:34px;
				 font-weight:bold;
				 line-height:100%;
				 padding:0;
				 text-align:center;
				 vertical-align:middle;
			}

			
			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
				 color:#336699;
				 font-weight:normal;
				 text-decoration:underline;
			}

			#headerImage{
				height:auto;
				max-width:600px !important;
			}

			
			#templateContainer, .bodyContent{
				 background-color:#FFFFFF;
			}

			
			.bodyContent div{
				 color:#505050;
				 font-family:Arial;
				 font-size:14px;
				 line-height:150%;
				 text-align:left;
			}

			
			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#336699;
				 font-weight:normal;
				 text-decoration:underline;
			}

			.bodyContent img{
				display:inline;
				height:auto;
			}

			
			#templateFooter{
				 background-color:#FFFFFF;
				 border-top:0;
			}

			
			.footerContent div{
				 color:#707070;
				 font-family:Arial;
				 font-size:12px;
				 line-height:125%;
				 text-align:left;
			}

			
			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
				 color:#336699;
				 font-weight:normal;
				 text-decoration:underline;
			}

			.footerContent img{
				display:inline;
			}

			
	

			
			
		</style>
	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
            	<tr>
                	<td align="center" valign="top">
                    	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                        	<tr>
                            	<td align="center" valign="top">
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
                                            <td class="headerContent">
												' . $emailheader . '
                                            </td>
                                        </tr>
                                    </table>
                                   
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                   
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                    	<tr>
                                            <td valign="top" class="bodyContent">
                                
                                               
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top">
                                                            <div mc:edit="std_content00">
                                                                <h1 class="h1">'.$sub.'</h1>
																 <p>Thank you for subscribing to Jimbos Bar! You will now begin to receive free promotions and information about upcoming event details directly.</p>
																 
																<br /><br />
                                                            </div>
														</td>
                                                    </tr>
                                                </table>
                                               
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                    	<tr>
                                        	<td valign="top" class="footerContent">
											  <p>Address here</p>
											  <p>Phone Here </p>
											  
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>';

//echo $msg;
$headers = array("From: ".$sitename." <".$emailto.">",
	         "Content-Type: text/html"
	         );
$h = implode("\r\n",$headers) . "\r\n";

$mailProblems = wp_mail($to, $sub, $msg, $h);
?>