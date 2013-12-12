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

		<?php
				
				
				//$wpdb->query( "SELECT * FROM ".$wpdb->prefix."mlbday");
		?>
		<table cellspacing="0" class="wp-list-table widefat fixed subscribers">
				<thead>
						<tr>
							<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox"></th>
							<th style="" class="manage-column column-fname" id="fname" scope="col">First Name<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-lname" id="lname" scope="col">Last Name<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-email" id="email" scope="col"><span>Email Address</span><span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-occasion" id="occasion" scope="col">Occasion<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-date" id="date" scope="col">Date<span class="sorting-indicator"></span></th>
						</tr>
				</thead>
				
				<tfoot>
						<tr>
							<th style="" class="manage-column column-cb check-column" id="cb" scope="col"><input type="checkbox"></th>
							<th style="" class="manage-column column-fname" id="fname" scope="col">First Name<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-lname" id="lname" scope="col">Last Name<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-email" id="email" scope="col"><span>Email Address</span><span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-occasion" id="occasion" scope="col">Occasion<span class="sorting-indicator"></span></th>
							<th style="" class="manage-column column-date" id="date" scope="col">Date<span class="sorting-indicator"></span></th>
						</tr>
				</tfoot>
			
				<tbody id="the-list">
						<?php
								global $wpdb;
								
								
								//$results = $wpdb->get_results("DESC ".$wpdb->prefix."mlbday");
								$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."mlbday");
								//echo '<pre>';
								//print_r($results);
								//echo '</pre>';
								foreach($results as $r)
								{
								echo '<tr>
												<th class="check-column" style="padding:5px 0 2px 0"><input type="checkbox" name="rem[]" value="'.esc_js(esc_html($row->id)).'"></th>
												<td>'.$r->mlbday_fname.'</td>
												<td>'.$r->mlbday_lname.'</td>
												<td>'.$r->mlbday_formemail.'</td>
												<td>'.$r->mlbday_formoccasion.'</td>
												<td>'.date('m-d', strtotime($r->mlbday_formdate)).'</td>
										</tr>';
								}
						
						?>
				</tbody>
		</table>

	</div>