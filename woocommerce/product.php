<?php get_header(); ?>
<section class="flex_container wrapper-flex_container col-2">
  <section class="content product">
    <div class="container">
      <div class="wrapper_block">
        <div class="flex_container flex_info__product">
          <div class="wrap_image">
            <?php global $post, $product;
            $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
            $thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
            $post_thumbnail_id = get_post_thumbnail_id( $post->ID );
            $full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
            $placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
            $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
            	'woocommerce-product-gallery',
            	'woocommerce-product-gallery--' . $placeholder,
            	'woocommerce-product-gallery--columns-' . absint( $columns ),
            	'images',
            ) );
            ?>
            <div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 1; transition: opacity .25s ease-in-out;"><figure class="woocommerce-product-gallery__wrapper">
            <?php
            $attributes = array(
            	'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
            	'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
            	'data-src'                => $full_size_image[0],
            	'data-large_image'        => $full_size_image[0],
            	'data-large_image_width'  => $full_size_image[1],
            	'data-large_image_height' => $full_size_image[2],
            );
            if ( has_post_thumbnail() ) {
            	$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'woocommerce_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
            	$html .= get_the_post_thumbnail( $post->ID, 'woocommerce_single', $attributes );
            	$html .= '</a></div>';
            } else {
            	$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
            	$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
            	$html .= '</div>';
            }
            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
            do_action( 'woocommerce_product_thumbnails' );
            ?>
            </figure>
            </div><img src="images/products/1.jpg" alt=""/>
          </div>
          <div class="flex_container flex__column">
            <h1>Chigo CMV-V36Q2/HR1-B</h1>
            <h3 class="price">36 000 грн.<span>цена</span></h3>
            <table class="global-attr">
              <tr>
                <td>Площадь помещения</td>
                <td>до 400 м</td>
              </tr>
              <tr>
                <td>Мощность охлаждения</td>
                <td>до 400 м</td>
              </tr>
              <tr>
                <td>Тип установки</td>
                <td>оконный</td>
              </tr>
              <tr>
                <td>Тип компрессора</td>
                <td>обычный</td>
              </tr>
            </table>
            <div class="wrapper_block buttons"><a class="button buy" href="#" modal="#buy">Заказать прямо сейчас <i class="icon click"></i></a><a class="button" href="#">В корзину <i class="icon cart"></i></a><a class="button balance_button" href="#"><i class="icon balance"></i></a></div>
          </div>
        </div>
      </div>
    </div>
    <section class="tab_parent info_block">
      <div class="categories">
        <div class="container">
          <div class="wrapper_block">
            <div class="flex_container flex__left flex__center">
              <h4>Информация</h4><a class="tab_item active" href="#about">Описание</a><a class="tab_item" href="#characteristics">Характеристики</a><a class="tab_item" href="#reviews">Отзывы</a>
            </div>
          </div>
        </div>
      </div>
      <div class="product_info">
        <div class="container">
          <div class="active products_tab" id="about">
            <p>Тип установки внутреннего блока: Настенный.</p>
            <p>Рекомендованная площадь помещения: 21 кв.м. </p>
            <p>Особенности: теплообменник сложной конфигурации с покрытием Golden Fin, защита от холодных потоков, внутренняя защита и самодиагностика, интеллектуальная разморозка, температурная компенсация. Гарантия 5 лет.</p>
            <p>Класс энергоэффективности А+. </p>
            <p>Фильтр грубой очистки, Фильтр с витамином С благотворно влияет на здоровье кожи, укрепляет иммунитет и способствует снятию стресса, PLAZMA фильтр - устраняет неприятные запахи и делает воздух свежим, новый современный пульт, 3D Air Delivery - технология трехмерного распределения воздуха управляя с пульта, R-410.</p>
          </div>
          <div class="products_tab" id="characteristics">
            <table class="characteristics">
              <tr>
                <td>Мощность охлаждения, кВт</td>
                <td>9, 6</td>
              </tr>
              <tr>
                <td>Мощность обогрева, кВт</td>
                <td>10</td>
              </tr>
              <tr>
                <td>Площадь помещения, м</td>
                <td>0</td>
              </tr>
              <tr>
                <td>Производитель</td>
                <td>Chigo</td>
              </tr>
              <tr>
                <td>Тип компрессора</td>
                <td>Обычный</td>
              </tr>
              <tr>
                <td>Тип установки</td>
                <td>Настенный</td>
              </tr>
              <tr>
                <td>Режимы работы	</td>
                <td>охлаждение, обогрев, вентилятор, автоматический, осушение, очистка воздуха, ночной, турборежим.</td>
              </tr>
              <tr>
                <td>Рекомендованная площадь помещения, м.кв.</td>
                <td>100</td>
              </tr>
              <tr>
                <td>Тип фреона</td>
                <td>R410A</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </section>
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4>Похожие товары</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="products slides_wrapper">
      <div class="container">
        <div class="wrapper_block slides_products"><a class="icon arrow left" href=""></a>
          <div class="sliders__wrapper">
            <div class="products_tab active">
              <div class="flex_container flex-products slides">
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>1 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/2.png" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>2 Chigo CMV-V45LD/HR1-B</h3></a>
                    <h5>Напольно-потолочный тип VRF внутренние блоки</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>3 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/3.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>4 Chigo CMV-V36Q2/HR1-B</h3></a>
                    <h5>Кассетный тип 2-стор. VRF внутренние блоки</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>5 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>6 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>1 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/2.png" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>2 Chigo CMV-V45LD/HR1-B</h3></a>
                    <h5>Напольно-потолочный тип VRF внутренние блоки</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>3 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/3.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>4 Chigo CMV-V36Q2/HR1-B</h3></a>
                    <h5>Кассетный тип 2-стор. VRF внутренние блоки</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>5 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>6 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>7 PANASONIC /U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>8 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>9 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
                <div class="product">
                  <div class="img__wrap"><a href="product.html"><img src="images/products/1.jpg" alt=""/></a></div>
                  <div class="info"><a href="product.html">
                      <h3>10 PANASONIC S-F24DB4E5/U-B24DBE5</h3></a>
                    <h5>Настенные сплит-систем</h5>
                  </div>
                  <div class="price_wrapper">
                    <div class="price">1931 $</div><a class="button" href="">Купить <i class="icon cart"></i></a><a class="button balance_button" href=""><i class="icon balance"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div><a class="icon arrow right" href=""></a>
        </div>
      </div>
    </div>
  </section>
  <aside class="category calc">
    <div class="categories">
      <div class="container">
        <div class="wrapper_block">
          <div class="flex_container flex__left flex__center">
            <h4>Расчет мощности кондиционера</h4>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <form action="" name="condition" id="condition">
        <div class="flex_container">
          <div class="filter__block">
            <p>Площадь помещения, м2</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" name="S" placeholder="5"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Высота потолка, м</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="text" name="H" placeholder="2.5"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Ориентация окон*</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <select name="Y">
                  <option value="138">Север</option>
                  <option value="203">Юг</option>
                  <option value="242">Северо-запад</option>
                  <option value="242">Северо-восток</option>
                  <option value="270">Юго-запад</option>
                  <option value="270">Юго-восток</option>
                  <option value="336">Восток</option>
                  <option value="336">Запад</option>
                </select>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Количество компьютеров и/или телевизоров</p>
            <div class="form__block">
              <div class="forms__item without_span">
                <label>
                  <input type="number" placeholder="1" name="A"/>
                </label>
              </div>
            </div>
          </div>
          <div class="filter__block">
            <p>Сколько людей обычно в помещении</p>
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
    </div>
  </aside>
</section><?php get_footer(); ?>