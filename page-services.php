
<?php get_header() ?>
 
    <!-- Container -->
    <div class="container index">
    <?php
      	while (have_posts()) :
      		the_post();
         	get_template_part('partials/content','index');
   		endwhile;
    ?>

	    <div class="row mtb-50">

	    	<?php
		    	// The Query
	    		$args = array('post_type'=>'service');
				$the_query = new WP_Query( $args );
				 
				// The Loop
			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();

			        get_template_part('partials/content','service');
			    }
				
				/* Restore original Post Data */
				wp_reset_postdata();
	    	?>

	    </div>
    </div>



<?php get_footer()?>