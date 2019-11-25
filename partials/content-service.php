<!-- Start Image Service Box 1 -->
<div class="col-md-4 service-box">
  <div class="image-service-box">
    <img src="<?php the_field('photo') ?>" alt="" />
    <div class="service-text">
      <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
      <div>
      	<?php the_content() ?>
      </div>
    </div>
  </div>
</div>
<!-- End Image Service Box 1 -->