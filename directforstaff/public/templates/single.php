<?php
get_header();
?>

<!-- <b>This is the plugin single template file</b><br><br> -->

<!-- <b>Start WordPress Loop</b><br> -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<b><?php echo get_post_meta( get_the_ID(), 'directforstaff_first_name', true); ?>
		   <?php echo get_post_meta( get_the_ID(), 'directforstaff_last_name', true); ?></b><br><br>
		   <?php echo the_content(); ?><br>
		   <?php echo get_post_meta( get_the_ID(), 'directforstaff_job_position', true); ?><br>
		   <?php echo get_post_meta( get_the_ID(), 'directforstaff_email', true); ?><br>
		   <?php echo get_post_meta( get_the_ID(), 'directforstaff_phone', true); ?><br>
			
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
<!-- <b>End WordPress Loop</b> -->
		
<?php
get_footer();
?>