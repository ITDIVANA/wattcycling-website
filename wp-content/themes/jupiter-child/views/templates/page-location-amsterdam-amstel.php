<?php
	$the_query = new WP_Query( 'page_id=1346' );
	while ($the_query -> have_posts()) : $the_query -> the_post(); 
		the_content();
	endwhile;
wp_reset_query();

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
endif;