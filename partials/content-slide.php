<?php 
	global $active_class;
	$link =  get_field('link');
?>
<div class="carousel-item <?php echo $active_class ?>">
  <img src="<?php the_field('image')?>" alt="">
  <div class="carousel-caption">
    <h3 class="slide-title animated fadeInDown"><?php the_title()?></h3>
    <h5 class="slide-text animated fadeIn"><?php the_content()?></h5>
    <a href="<?php echo $link['url'] ?>" class="btn btn-lg btn-default-filled animated fadeInUp"><?php echo $link['title'] ?></a>
  </div>
</div>