<?php get_header(); ?>
<section class="content">
  <div class="container"><span class="time"><?php theme_posted_on(); ?></span>
    <h1><?php the_title(); ?></h1>
    <div class="text-content">
      <?php theme_post_thumbnail(); ?>
      <?php
      		 the_post();
      		the_content();
      	?>
    </div>
  </div>
</section><?php get_footer(); ?>