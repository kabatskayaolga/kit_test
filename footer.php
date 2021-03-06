
<script>var template = '<?php echo get_template_directory_uri() ?>';</script>
<footer>
  <div class="container">
    <div class="wrapper_block">
      <div class="flex_container">
        <div>
          <div class="flex_container flex__left contact_block"><i class="icon loc"></i>
            <div><a class="contact__adr" href="#" target="_blank"> <strong>г. Одесса, </strong><br/>ул. Базарная 63</a></div>
          </div>
          <div class="flex_container flex__left contact_block"><i class="icon mail"></i>
            <div><a class="contact__mail" href="mailto:office@kit.biz.ua">office@kit.biz.ua</a></div>
          </div>
          <div class="flex_container flex__left contact_block"><i class="icon phone"></i>
            <div>
              <div class="contact_item"><a class="contact__tel" href="tel:+380487155222">+38 (048) 715-52-22</a></div>
              <div class="contact_item"><a class="contact__tel" href="tel:+380487877781">+38 (048) 787-77-81</a></div>
            </div>
          </div>
        </div>
        <div>
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
          <div class="carts"><img src="<?php echo get_template_directory_uri()?>/images/footer/visa.png" alt=""/><img src="<?php echo get_template_directory_uri()?>/images/footer/master.png" alt=""/><img src="<?php echo get_template_directory_uri()?>/images/footer/privat.png" alt=""/></div>
        </div>
        <div class="form__wrapper">
          <div class="header">
            <h3><?php esc_html_e( 'Request a call', 'theme' ); ?></h3>
          </div>
          <form class="form__block call my_form">
            <div>
              <div class="forms__item">
                <label> 
                  <input type="text" name="name" required="required"/><span>Ваше имя</span>
                </label>
              </div>
            </div>
            <div>
              <div class="forms__item">
                <label> 
                  <input type="tel" name="phone" required="required"/><span>Ваш телефон</span>
                  <input type="hidden" name="formAction" value="Обратный звонок"/>
                </label>
              </div>
            </div>
            <div>
              <input class="button" type="submit" value="Отправить"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal__wrapper" id="login">
  <div class="modal__wrapper_flex">
    <div class="modal"><a class="hide icon"></a>
      <div class="header">
        <h3>Авторизация </h3>
        <hr/>
        <p>для диллеров</p><?php dynamic_sidebar( 'login' ); ?>
        <?php if( is_user_role( 'diler' ) ){ ?>
         <?php _e( 'Вы авторизированы как диллер, предлагаем вам ', 'AA' ); ?>  <a href="<?php echo get_page_link( 2188 );?>">ознакомится с прайсом</a></div><br>
        <?php } ?>
        <?php if( is_user_logged_in() == false){?>
        <a href="<?php echo get_page_link( 4053 );?>">Регистрация</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<div class="modal__wrapper" id="tel">
  <div class="modal__wrapper_flex">
    <div class="modal"><a class="icon hide"></a>
      <div class="header">
        <h3><?php esc_html_e( 'Request a call', 'theme' ); ?></h3>
        <hr/>
        <p>Оставьте свой номер и наши менеджеры свяжутся с вами в ближайшее время</p>
      </div>
      <form class="form__block call my_form">
        <div>
          <div class="forms__item">
            <label> 
              <input type="text" name="name" required="required"/><span>Ваше имя</span>
            </label>
          </div>
        </div>
        <div>
          <div class="forms__item">
            <label> 
              <input type="tel" name="phone" required="required"/><span>Ваш телефон</span>
              <input type="hidden" name="formAction" value="Обратный звонок"/>
            </label>
          </div>
        </div>
        <div>
          <input class="button" type="submit" value="Отправить"/>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal__wrapper" id="buy">
  <div class="modal__wrapper_flex">
    <div class="modal"><a class="icon hide"></a>
      <div class="header">
        <h3>Купить<br/>в один клик</h3>
        <h5><?php the_title(); ?></h5>
        <hr/>
        <p>Оставьте свой номер и наши менеджеры свяжутся с вами в ближайшее время</p>
      </div>
      <form class="form__block my_form">
        <div>
          <div class="forms__item">
            <label> 
              <input type="text" name="name" required="required"/><span>Ваше имя</span>
            </label>
          </div>
        </div>
        <div>
          <div class="forms__item">
            <label> 
              <input type="tel" name="phone" required="required"/><span>Ваш телефон</span>
            </label>
          </div>
        </div>
        <div>
          <div class="forms__item">
            <label> 
              <input type="email" name="email" required="required"/><span>Ваш email</span>
            </label>
          </div>
        </div>
        <div>
          <input type="hidden" value="Быстрая покупка" name="formAction"/>
          <input type="hidden" value="<?php the_title(); ?>" name="product"/>
          <input class="button" type="submit" value="Отправить"/>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal__wrapper" id="image_modal">
  <div class="modal__wrapper_flex">
    <div class="modal"><a class="icon hide"></a><img src="" alt=""/></div>
  </div>
 
</div><?php wp_footer(); ?>

