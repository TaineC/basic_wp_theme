
<?php get_header() ?>
 
    <!-- Container -->
    <div class="container index">
		<?php
			$term = get_queried_object();
			echo '<h1>' . $term->name . '</h1>';
			echo '<p>' . get_field('summary',$term) . '</p>';
		?>
    	
    	<div class="row">
	    <?php
	      	while (have_posts()) :
	      		the_post();
	         	get_template_part('partials/content','project');
	   		endwhile;
	    ?>
	    </div>
    </div>

<?php get_footer()?>

