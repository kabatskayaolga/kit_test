<?php get_header(); ?>
<section class="sales">
  <div class="slides">
    <?php
    if(count(wc_get_product_ids_on_sale()) != 0){
    	$posts_count = wc_get_product_ids_on_sale();
    } else{
    	$posts_count = wc_get_featured_product_ids();
    }
    $args = array(
    	'post_type' => 'product',
    	'post__in' => array_merge( array( 0 ), $posts_count )
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) {
    $counter = 0;
    while ( $loop->have_posts() ) : $loop->the_post();
    global $product;
    if ( empty( $product ) || ! $product->is_visible() ) {
    	return;
    }
    $backcat = '';
    $cats =  get_the_terms( $post->ID, 'product_cat' ); 
    foreach ($cats as $cat) { 
    	if ($cat->parent == 0){
    		$backcat = $cat->term_id;
    	}
    }
    if ($counter == 0) { ?>
    <div class="slide active cat<?php echo $backcat; ?>" id="slide<?php echo $counter ?>">
      <div class="container">
        <div class="flex_container">
          <div class="content_text"><?php if($product->date_on_sale_to != ''){?>
            <div class="stock"><span>акция</span> до <?php $date = $product->date_on_sale_to; 
              echo $date->format('d.m.Y'); ?>
            </div><?php } ?><a href="<?php the_permalink(); ?>">
              <h1><?php the_title(); ?></h1></a>
            <p>
              <?php $text = get_the_content();
              $maxchar = 150;
              if ( mb_strlen( $text ) > $maxchar ){
              	$text = mb_substr( $text, 0, $maxchar ) .' ';
              }
              echo $text; 
              ?><a href="<?php the_permalink(); ?>">Подробнее...</a>
            </p><div class="price"><?php echo $product->get_price_html(); ?></div><?php woocommerce_template_loop_add_to_cart(); ?>
          </div>
        </div>
      </div>
    </div><?php } else { ?>
    <div class="slide cat<?php echo $backcat; ?>" id="slide<?php echo $counter ?>">
      <div class="container">
        <div class="flex_container">
          <div class="content_text"><?php if($product->date_on_sale_to != ''){?>
            <div class="stock"><span>акция</span> до <?php $date = $product->date_on_sale_to; 
              echo $date->format('d.m.Y'); ?>
            </div><?php } ?><a href="<?php the_permalink(); ?>">
              <h1><?php echo $product->name; ?></h1></a>
            <p>
              <?php $text = get_the_content();
              $maxchar = 150;
              if ( mb_strlen( $text ) > $maxchar ){
              	$text = mb_substr( $text, 0, $maxchar ) .' ';
              }
              echo $text; 
              ?><a href="<?php the_permalink(); ?>">Подробнее...</a>
            </p><div class="price"><?php echo $product->get_price_html(); ?></div><?php woocommerce_template_loop_add_to_cart(); ?>
          </div>
        </div>
      </div>
    </div><?php } ?>
    <?php $counter ++; 
    endwhile;
    wp_reset_postdata();
    } else { ?>
    <?php } ?>
  </div>
  <div class="sliders_nav"><?php if(count(wc_get_product_ids_on_sale()) > 3 || count(wc_get_featured_product_ids()) > 3 ) { ?><a class="icon arrow top" href=""></a><?php } else { ?><a class="icon arrow top hidden" href=""></a><?php } ?>
    <div class="sliders_nav__wrapper_overflow sliders__wrapper">
      <div class="sliders_nav__wrapper">
        <?php 
        if(count(wc_get_product_ids_on_sale()) != 0){
        	$posts_count = wc_get_product_ids_on_sale();
        } else{
        	$posts_count = wc_get_featured_product_ids();
        }
        $args = array(
        'post_type' => 'product',
        'post__in' => array_merge( array( 0 ), $posts_count )
        );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
        $counter = 0;
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php global $product;
        if ( empty( $product ) || ! $product->is_visible() ) {
        	return;
         
        } ?>
        <?php if ($counter == 0) { ?><a class="slider_nav active" href="#slide<?php echo $counter; ?>">
          <?php if ( has_post_thumbnail() ) {
          echo get_the_post_thumbnail( $post->ID, 'woocommerce_single', $attributes );
          } else {
          sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
          } ?></a><?php } else { ?><a class="slider_nav" href="#slide<?php echo $counter; ?>">
          <?php if ( has_post_thumbnail() ) {
          echo get_the_post_thumbnail( $post->ID, 'woocommerce_single', $attributes );
          } else {
          	echo 'fsdfsfdsf';
          sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
          } ?></a><?php } ?>
        <?php $counter ++; endwhile;
        wp_reset_postdata();
        } else { 
        } ?>
      </div>
    </div><?php if(count(wc_get_product_ids_on_sale()) > 3 || count(wc_get_featured_product_ids()) > 3 ) {  ?><a class="icon arrow bottom" href=""></a><?php } else { ?><a class="icon arrow bottom hidden" href=""></a><?php } ?>
  </div>
</section>
<section class="about">
  <div class="container">
    <div class="flex_container flex__center">
      <div class="flex_container item"><i class="icon home"></i>
        <div class="text">
          <h4>Наши сферы:</h4>
          <ul>
            <li><span>системы отопления</span></li>
            <li><span>вентиляция</span></li>
            <li><span>кондиционирование</span></li>
            <li><span>электро- и водоснабжение</span></li>
          </ul>
        </div>
      </div>
      <div class="flex_container item"><i class="icon worker"></i>
        <div class="text">
          <h4>Мы профессионально занимаемся: </h4>
          <ul>
            <li><span>проектированием, </span></li>
            <li><span>монтажом, </span></li>
            <li><span>наладкой</span></li>
            <li><span>обслуживанием оборудования</span></li>
          </ul>
        </div>
      </div>
      <div class="flex_container item"><i class="icon basket"></i>
        <div class="text">
          <h4>Мы организуем: </h4>
          <ul>
            <li><span>продажу,</span></li>
            <li><span>установку</span></li>
            <li><span>сервис техники</span></li>
            <li><span>предоставлением гарантии</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="news tab_parent">
  <div class="categories">
    <div class="container">
      <div class="wrapper_block">
        <div class="flex_container flex__left flex__center">
          <h4>Новые поступления</h4><?php $terms = get_terms( array(
          	'taxonomy'   => 'product_cat',
          	'hide_empty' => false,
          	'orderby'    => 'id',
          	'order'      => 'ASC',
          ) );  ?>
          <?php 
          $counter = 0;
          foreach ($terms as $term) {  
          if ($term->parent == 0 && $term->slug != uncategorized && $counter < 1 ){
          $counter++; ?><a class="tab_item active" href="#news<?php echo $counter; ?>"><?php echo $term->name; ?></a><?php }} ?>
        </div>
      </div>
    </div>
  </div>
  <div class="products slides_wrapper">
    <div class="container">
      <div class="wrapper_block slides_products"><a class="icon arrow left" href=""></a>
        <div class="sliders__wrapper">
          <div class="products_tab active" id="news0"><?php echo do_shortcode ('[products orderby="popularity" limit="10"]' ); ?></div><?php 
          $counter = 0;
          foreach ($terms as $term) {  
          if ($term->parent == 0 && $term->slug != uncategorized && $counter < 1 ){
          $counter++; ?>
          <div class="products_tab" id="news<?php echo $counter; ?>">
            <?php 
            $category = $term->name; 
            echo do_shortcode ('[products orderby="popularity" limit="10" category="' . $category . '" ]' ); ?>					
          </div><?php }} ?>
        </div><a class="icon arrow right" href=""></a>
      </div>
    </div>
  </div>
</section>
<section class="tops tab_parent">
  <div class="categories">
    <div class="container">
      <div class="wrapper_block">
        <div class="flex_container flex__left flex__center">
          <h4>Популярные товары </h4><?php $terms = get_terms( array(
          	'taxonomy'   => 'product_cat',
          	'hide_empty' => false,
          	'orderby'    => 'id',
          	'order'      => 'ASC',
          ) );  ?>
          <?php 
          $counter = 0;
          foreach ($terms as $term) {  
          if ($term->parent == 0 && $term->slug != uncategorized && $counter < 1 ){
          $counter++; ?><a class="tab_item active" href="#news<?php echo $counter; ?>"><?php echo $term->name; ?></a><?php }} ?>
        </div>
      </div>
    </div>
  </div>
  <div class="products slides_wrapper">
    <div class="container">
      <div class="wrapper_block slides_products"><a class="icon arrow left" href=""></a>
        <div class="sliders__wrapper">
          <div class="products_tab active" id="news0"><?php echo do_shortcode ('[products orderby="date" limit="10"]' ); ?></div><?php 
          $counter = 0;
          foreach ($terms as $term) {  
          if ($term->parent == 0 && $term->slug != uncategorized && $counter < 1 ){
          $counter++; ?>
          <div class="products_tab" id="news<?php echo $counter; ?>">
            <?php 
            $category = $term->name; 
            echo do_shortcode ('[products orderby="date"  limit="10" category="' . $category . '" ]' ); ?>					
          </div><?php }} ?>
        </div><a class="icon arrow right" href=""></a>
      </div>
    </div>
  </div>
</section>
<section class="posts">
  <div class="categories">
    <div class="container">
      <div class="wrapper_block">
        <div class="flex_container flex__left flex__center">
          <h4>Статьи и советы</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="wrapper_block">
      <div class="flex_container flex__posts">
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
        	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        );
        $posts = get_posts( $args ); 
        foreach($posts as $post){ setup_postdata($post); ?>
        <div class="post">
          <div class="wrapper_block">
            <div class="flex__post flex_container">
              <div>
                <div class="img__wrap"><?php theme_post_thumbnail(); ?></div>
              </div>
              <div><a href="<?php echo get_permalink(); ?>">
                  <h4><?php the_title(); ?></h4></a><?php 
                the_excerpt();
                ?><a class="button more" href="<?php echo get_permalink(); ?>">Подробнее</a>
              </div>
            </div>
          </div>
        </div><?php }
        wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section><?php get_footer(); ?>