<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       paulc2763.sb.cis
 * @since      1.0.0
 *
 * @package    directforstaff
 * @subpackage directforstaff/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	query_posts( "post_type=directforstaff".$query_string."&meta_key=directforstaff_sort_order&orderby=meta_value_num&order=ASC" );

	
?>
<fieldset class = "outer">
<legend>Staff Directory Sort Order</legend>

 <?php 
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
 $custom = get_post_custom($post->ID);
 echo '<label class="directforstaff-label">';
 echo $custom["directforstaff_first_name"][0].' ';
 echo $custom["directforstaff_last_name"][0].' ';
 echo $custom["directforstaff_email"][0].' ';
 echo '</label>';
 echo '<input class="directforstaff-input" type = "text" value = "'.$custom["directforstaff_sort_order"][0].'"><br>';
 endwhile; else : 
	echo '<p> '._e( 'Sorry, no staff directory posts to sort.' ); 
endif; 
?>
</fieldset>