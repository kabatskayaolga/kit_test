<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><?php wp_head(); ?>
    <script>var templateDist= '<?php echo get_template_directory_uri()?>'</script>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <div class="header_top">
        <div class="container"><?php dynamic_sidebar( 'lang' ); ?></div>
      </div>
      <div class="header_middle">
        <div class="container">
          <div class="flex_container">
            <div><?php if ( is_front_page() && is_home() ) : ?><img src="<?php echo get_template_directory_uri() ?>/images/logo.png"><?php else : ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png"></a><?php endif; ?></div>
            <div class="contacts flex_container">
              <div class="contact">
                <div class="flex_container flex__left"><i class="icon loc"></i>
                  <div><strong>г. Одесса, </strong><br>ул. Базарная 63</div>
                </div>
                <div class="flex_container flex__left"><i class="icon mail"></i>
                  <div><a class="contact__mail" href="mailto:office@kit.biz.ua">office@kit.biz.ua</a></div>
                </div>
              </div>
              <div class="contact">
                <div class="flex_container flex__left"><i class="icon phone"></i>
                  <div>
                    <div class="contact_item"><a class="contact__tel" href="tel:+380487155222">+38 (048) 715-52-22</a></div>
                    <div class="contact_item"><a class="contact__tel" href="tel:+380487877781">+38 (048) 787-77-81</a></div>
                  </div>
                </div><a class="button" href="#" modal="#tel"><?php esc_html_e( 'Request a call', 'theme' ); ?></a>
              </div>
            </div>
            <div class="search__form">
              <div class="form__block">
                <div class="forms__item">
                  <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                  	<label class="screen-reader-text" for="s">
                  	<input type="search" class="search-field"  value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'theme' ); ?>" /><span><?php _e( 'Search', 'theme' ); ?></span>	<input type="submit" class='search__form_button' value="" />
                  	<input type="hidden" name="post_type" value="product" /></label>
                  </form>
                </div>
              </div>
            </div>
            <div class="shop__buttons wrapper_link"><a class="icon balance yith-woocompare-open" href="" title="Сравнение"></a><a class="icon cart" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( "Basket", "theme" ); ?>"><?php if(WC()->cart->get_cart_contents_count() != 0){ ?><span class="number_of_goods"><?php echo WC()->cart->get_cart_contents_count(); ?> </span><?php } ?></a></div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container">
          <div class="flex_container menu_wrapper">
            <div><a class="menu_button" href="#"> <i class="icon menu"> </i><?php esc_html_e( 'Catalog', 'theme' ); ?></a>
              <div class="menu_wrapper_hidden">
                <div class="flex_container">
                  <div class="flex_container flex__column">
                    <?php
                    	wp_nav_menu( array(
                    		'theme_location' => 'category-menu',
                    		
                    	) );
                    ?>
                    <?php if( is_user_role( 'diler' ) ){ ?>
                    <a href="<?php echo get_page_link( 2188 );?>">Прайс</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav">
              <?php
              	wp_nav_menu( array(
              		'theme_location' => 'menu-1',
              		'menu_id'        => 'primary-menu',
              		'items_wrap' 	 => '%3$s',
              		'container'=> false
              	) );
              ?>
              <?php if( is_user_role( 'diler' ) ){ ?>
              <a href="<?php echo get_page_link( 2188 );?>">Прайс</a>
              <?php } ?>
            </div>
            <div><a class="login_button" href="#" modal="#login">
                <?php if ( is_user_logged_in() ) : ?><?php esc_html_e( 'You is Authorization', 'theme' ); ?><?php else : ?><i class="icon login"> </i><?php esc_html_e( 'Authorization', 'theme' ); ?><?php endif; ?></a></div>
          </div>
        </div>
      </div>
    </header>
  </body>
</html>