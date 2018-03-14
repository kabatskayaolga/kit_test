<?php get_header(); ?>
<section class="flex_container wrapper-flex_container col-2">
  <section class="content news">
    <div class="container">
      <?php if ( have_posts() ) : ?>
      <?php
      	the_archive_title( '<h1 class="page-title">', '</h1>' );
      	the_archive_description( '<div class="archive-description">', '</div>' );
      ?>
      <div class="wrapper_block wrapper_block__post">
        <div class="flex_container">
          <?php
          while ( have_posts() ) : the_post(); ?>
          <div class="post" id="post-<?php the_ID(); ?>">
            <div class="img_wrapper"><a href="<?php echo get_permalink(); ?>"><?php theme_post_thumbnail(); ?></a></div>
            <div class="text"><span class="time"><?php theme_posted_on(); ?></span><a href="<?php echo get_permalink(); ?>">
                <h3><?php the_title(); ?></h3></a><?php 
              the_excerpt();
              ?><a class="button more" href="<?php echo get_permalink(); ?>">Подробнее</a>
            </div>
          </div><?php endwhile;?>
        </div>
      </div><?php the_posts_navigation(); ?>
    </div><?php endif; ?>
  </section>
  <aside><?php if( is_category( 552 ) ){?>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4>Статьи и советы</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="flex_container">
      <?php $args = array(
      'numberposts' => 2,
      'category'    => 553,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'include'     => array(),
      'exclude'     => array(),
      'meta_key'    => '',
      'meta_value'  =>'',
      'post_type'   => 'post',
      'suppress_filters' => true, 
      );
      $posts = get_posts( $args );
      foreach($posts as $post){ setup_postdata($post); ?>
      <div class="post posts" id="post-<?php the_ID(); ?>">
        <div class="container">
          <div class="img_wrapper"><a href="<?php echo get_permalink(); ?>"><?php theme_post_thumbnail(); ?></a></div>
          <div class="text"><span class="time"><?php theme_posted_on(); ?></span><a href="<?php echo get_permalink(); ?>">
              <h3><?php the_title(); ?></h3></a><?php 
            the_excerpt();
            ?><a class="button more" href="<?php echo get_permalink(); ?>">Подробнее</a>
          </div>
        </div>
      </div><?php }
      wp_reset_postdata(); ?>
    </div><?php } ?>
    <?php if( is_category( 553 ) ){?>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4>Новости</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="flex_container">
      <?php $args = array(
      'numberposts' => 2,
      'category'    => 552,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'include'     => array(),
      'exclude'     => array(),
      'meta_key'    => '',
      'meta_value'  =>'',
      'post_type'   => 'post',
      'suppress_filters' => true, 
      );
      $posts = get_posts( $args );
      foreach($posts as $post){ setup_postdata($post); ?>
      <div class="post posts" id="post-<?php the_ID(); ?>">
        <div class="container">
          <div class="img_wrapper"><a href="<?php echo get_permalink(); ?>"><?php theme_post_thumbnail(); ?></a></div>
          <div class="text"><span class="time"><?php theme_posted_on(); ?></span><a href="<?php echo get_permalink(); ?>">
              <h3><?php the_title(); ?></h3></a><?php 
            the_excerpt();
            ?><a class="button more" href="<?php echo get_permalink(); ?>">Подробнее</a>
          </div>
        </div>
      </div><?php }
      wp_reset_postdata(); ?>
    </div><?php } ?>
  </aside>
</section><?php get_footer(); ?>