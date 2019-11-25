	<div class="page-header-title">
        <h2 class="heading-title text-center"><?php the_title()?></h2>
    </div>

	<div class="row">
		<div class="col-md-4">
			<img src="<?php the_field('photo')?>" alt="">
			
		</div>
		<div class="col-md-8">
			<?php the_content()?>
		</div>
	</div>

	<div class="page-header-title">
        <h2 class="heading-title text-center">Contributers:</h2>
    </div>

	<div class="row">
        
		<?php 
			$member = get_field('members');

		    	// The Query
	    		$args = array(
					'post_type' => 'staff',
					'post__in' => $member,
					'orderby' => 'post__in'
				);
				$the_query = new WP_Query( $args );
				 
				// The Loop
			    while ( $the_query->have_posts() ) {
			        $the_query->the_post();

			        get_template_part('partials/content','staff');
			    }
				
				/* Restore original Post Data */
				wp_reset_postdata();

		?>

    </div>

