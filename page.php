<?php get_header(); ?>
<section class="content">
  <div class="container">
    <h1><?php the_title(); ?></h1><?php if(is_page(2194)){ ?>
    <section class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2747.710957378669!2d30.729962815591563!3d46.47423297912588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c63184fbbcd221%3A0xfb1d18179775e30!2z0YPQuy4g0JHQsNC30LDRgNC90LDRjywgNjMsINCe0LTQtdGB0YHQsCwg0J7QtNC10YHRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNjUwMDA!5e0!3m2!1sru!2sua!4v1516876020674" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen=""></iframe></section><?php } ?>
    <?php if(is_page(2188)){ ?>
    <?php if( is_user_role( 'diler' ) ){ ?>
    <div class="text-content">
      <?php theme_post_thumbnail(); ?>
      <?php
      		 the_post();
      		the_content();
      	?>
    </div>
    <div class="coment">
      <?php if ( comments_open() || get_comments_number() ) :
      	comments_template();
      	endif;?>
    </div><?php } else { ?>
    <h5><?php esc_html_e( 'Access is allowed to dealers', 'theme' ); ?></h5><br/><?php } ?>
    <?php } else { ?>
    <div class="text-content">
      <?php theme_post_thumbnail(); ?>
      <?php
      		 the_post();
      		the_content();
      	?>
    </div>
    <div class="coment">
      <?php if ( comments_open() || get_comments_number() ) :
      	comments_template();
      	endif;?>
    </div><?php } ?>
  </div>
</section><?php get_footer(); ?>