<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       rbodewaldt1.example.com
 * @since      1.0.0
 *
 * @package    Directforstaff
 * @subpackage Directforstaff/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<!-- Add Custom Fields for Directforstaff Here -->
<?php
	global $post;
	$custom = get_post_custom($post->ID);
	$directforstaff_first_name = $custom["directforstaff_first_name"][0];
	$directforstaff_last_name = $custom["directforstaff_last_name"][0];
	$directforstaff_email = $custom["directforstaff_email"][0];
	$directforstaff_phone = $custom["directforstaff_phone"][0];
	$directforstaff_job_position = $custom["directforstaff_job_position"][0];
	$directforstaff_sort_order = $custom["directforstaff_sort_order"][0];
		
?>
<fieldset class = "outer">
<legend>Staff Directory Fields</legend>
	<label class="directforstaff-label">First Name:</label>
	<input class="directforstaff-input"  name="directforstaff_first_name" type="text" value="<?php echo $directforstaff_first_name; ?>"  required /><br>
	
	<label class="directforstaff-label">Last Name:</label>
	<input class="directforstaff-input"  name="directforstaff_last_name" type="text" value="<?php echo $directforstaff_last_name; ?>"  required /><br>
	
	<label class="directforstaff-label">eMail:</label>
	<input class="directforstaff-input"  name="directforstaff_email" type="email" value="<?php echo $directforstaff_email; ?>"  required /><br>
	
	<label class="directforstaff-label">Phone:</label>
	<input class="directforstaff-input"  name="directforstaff_phone" type="tel" value="<?php echo $directforstaff_phone; ?>"  required /><br>
	
	<label class="directforstaff-label">Job Position:</label>
	<input class="directforstaff-input"  name="directforstaff_job_position" type="text" value="<?php echo $directforstaff_job_position; ?>"  required /><br>
	
	<label class="directforstaff-label">Sort Order:</label>
	<input class="directforstaff-input"  name="directforstaff_sort_order" type="text" value="<?php echo $directforstaff_sort_order; ?>"  required /><br>
	
</fieldset>											 