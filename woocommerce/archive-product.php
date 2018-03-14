<?php get_header(); 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<section class="flex_container wrapper-flex_container col-3">
  <aside class="category filter">
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4> <span><?php esc_html_e( 'Filter', 'theme' ); ?></span><i class="icon down-arrow"></i></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="container"><?php dynamic_sidebar( 'sidebar-category-product' ); ?></div>
  </aside>
  <section class="content products">
    <div class="container">
      <?php do_action( 'woocommerce_before_main_content' ); ?>
      <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
      <h1><?php woocommerce_page_title(); ?></h1><?php endif; ?>
      <?php do_action( 'woocommerce_archive_description' ); ?><?php if ( have_posts() ) {?>
      <p><?php esc_html_e( 'Sorting is done at a price', 'theme' ); ?></p><?php 
      woocommerce_product_loop_start();
      if ( wc_get_loop_prop( 'total' ) ) { ?>
      <div class="wrapper_block">
        <div class="flex_container flex-products">
          <?php while ( have_posts() ) : the_post();
          wc_get_template_part( 'content', 'product' );
           endwhile; ?>
        </div>
      </div><?php } ?>
      <?php woocommerce_product_loop_end(); ?>
      <?php do_action( 'woocommerce_after_shop_loop' ); ?>
      <?php } else {
      do_action( 'woocommerce_no_products_found' );
      }?>
    </div>
  </section>
  <aside class="category calc">
    <?php 
    if(get_queried_object()->term_id == 120 ||
      get_queried_object()->parent == 120 ||
    	get_queried_object()->parent == 121 ||
    	get_queried_object()->parent == 127 ||
    	get_queried_object()->parent == 133 ) { ?>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4><?php esc_html_e( 'Calculating the power of the air conditioner', 'theme' ); ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <form action="" name="condition" id="condition">
        <div class="flex_container">
          <div class="filter__block">
            <p><?php esc_html_e( 'Area of the room', 'theme' ); ?>, м2</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" name="S" placeholder="5"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p><?php esc_html_e( 'Ceiling height', 'theme' ); ?>, м</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="text" name="H" placeholder="2.5"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p><?php esc_html_e( 'Orientation of windows', 'theme' ); ?>*</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="Y">
                  <option value="138"><?php esc_html_e( 'North', 'theme' ); ?></option>
                  <option value="203"><?php esc_html_e( 'South', 'theme' ); ?></option>
                  <option value="242"><?php esc_html_e( 'Northwest', 'theme' ); ?></option>
                  <option value="242"><?php esc_html_e( 'Northeast', 'theme' ); ?></option>
                  <option value="270"><?php esc_html_e( 'Southwest', 'theme' ); ?></option>
                  <option value="270"><?php esc_html_e( 'Southeast', 'theme' ); ?></option>
                  <option value="336"><?php esc_html_e( 'East', 'theme' ); ?></option>
                  <option value="336"><?php esc_html_e( 'West', 'theme' ); ?></option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p><?php esc_html_e( 'Number of computers and / or televisions', 'theme' ); ?></p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" placeholder="1" name="A"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p><?php esc_html_e( 'How many people are usually indoors', 'theme' ); ?></p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" placeholder="2" name="B"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block result"><span>Результат:</span>
            <h3></h3>
          </div>
        </div>
      </form>
    </div><?php } 
    
    elseif(get_queried_object()->term_id == 166 ||
      get_queried_object()->parent == 166 ||
    	get_queried_object()->parent == 121 ||
    	get_queried_object()->parent == 127 ||
    	get_queried_object()->parent == 133 ) {?>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4>Расчет теплопотерь помещения</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <form action="" name="fm_clc" id="fm_clc">
        <div class="flex_container">
          <div class="filter__block">
            <p>Окна</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel1" id="sel1">
                  <option value="0.85">Тройной стеклопакет</option>
                  <option value="1.0">Двойной стеклопакет</option>
                  <option value="1.27" selected="selected">Обычное (двойное) остекление</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Стены</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel2" id="sel2">
                  <option value="0.85" selected="selected">Кирпич 650мм</option>
                  <option value="1.0">Кирпич(550 мм)</option>
                  <option value="1.13">Кирпич(410 мм)</option>
                  <option value="1.27">Кирпич(290 мм)</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Соотношение площадей окон и пола</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel3" id="sel3">
                  <option value="0.80" selected="selected">10%</option>
                  <option value="0.90">11%-19%</option>
                  <option value="1.00">20%</option>
                  <option value="1.10">21%-29%</option>
                  <option value="1.20">30%</option>
                  <option value="1.30">31%-39</option>
                  <option value="1.40">40%</option>
                  <option value="1.50">50%</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Температура снаружи помещения</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel4" id="sel4">
                  <option value="0.70">до -10</option>
                  <option value="0.80" selected="selected">-10</option>
                  <option value="0.90">-15</option>
                  <option value="1.00">-20</option>
                  <option value="1.10">-25</option>
                  <option value="1.20">-30</option>
                  <option value="1.30">-35</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Число стен, выходящих наружу</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel5" id="sel5">
                  <option value="1.00">Одна</option>
                  <option value="1.11">Две</option>
                  <option value="1.22">Три</option>
                  <option value="1.33" selected="selected">Четыре</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Тип помещения над расчитываемым</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel6" id="sel6">
                  <option value="0.82">Обогреваемое помещение</option>
                  <option value="0.91" selected="selected">Теплый чердак</option>
                  <option value="1.00">Холодный чердак</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Высота помещения</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel7" id="sel7">
                  <option value="1.00">2,5</option>
                  <option value="1.05" selected="selected">3,0</option>
                  <option value="1.10">3,5</option>
                  <option value="1.15">4,0</option>
                  <option value="1.20">4,5</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Необходимость в ГВС</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="sel8" id="sel8">
                  <option value="1.20">ГВС требуется</option>
                  <option value="1.00" selected="selected">ГВС не требуется</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Площадь помещения</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" name="sel9" id="sel9" placeholder="0" value="0" size="10"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Теплопотери, кВт</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" name="teplopoter" id="teplopoter" placeholder="0" value="0" readonly="readonly" size="10"/>
                </label>
              </div>
            </div>
          </div>
        </div>
      </form>
      <form action="" name="fm_itog" id="fm_itog">
        <div class="flex_container">
          <div class="filter__block result"><span>Результат:</span>
            <h3></h3>
          </div>
        </div>
      </form>
    </div><?php } ?>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4> <?php esc_html_e( 'Previously Viewed Items', 'theme' ); ?></h4>
          </div>
        </div>
      </div>
    </div>
    <div class="container other-products"><?php dynamic_sidebar( 'sidebar-category-product-right' ); ?></div>
  </aside>
</section><?php get_footer(); ?>