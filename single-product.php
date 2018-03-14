<?php get_header(); ?><section class="flex_container wrapper-flex_container col-2"><?php while ( have_posts() ) : the_post(); ?><section class="content product"><div class="container"><?php do_action( 'woocommerce_before_main_content' ); ?></div><div class="wrapper_block"><div class="flex_container flex_info__product"><div class="wrap_image"><?php global $post, $product;
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
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;"><figure class="woocommerce-product-gallery__wrapper">
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
</figure></div></div><div class="flex_container flex__column"><h1><?php the_title(); ?></h1><h3 class="price"> <?php echo $product->get_price_html(); ?><span class="pr">цена</span></h3><table class="global-attr"><?php global $product;
$attributes = $product->get_attributes();
foreach ( $attributes as $attribute ) : 
	if ( $attribute->is_taxonomy() ) { 
 	$attribute_taxonomy = $attribute->get_taxonomy_object();
	if ( $attribute_taxonomy->attribute_public ) { ?>
	<tr>
		<td><?php echo wc_attribute_label( $attribute->get_name() ); ?></td>
		<td><?php
			$values = array();
				
				$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
				foreach ( $attribute_values as $attribute_value ) {
					$value_name = esc_html( $attribute_value->name );
					
						$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
					
				}
			echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
		?></td>
	</tr>
<?php } 
}
endforeach; ?></table><div class="wrapper_block buttons"><a class="button buy" href="#" modal="#buy">Заказать прямо сейчас <i class="icon click"></i></a><?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $product;
if ( ! $product->is_purchasable() ) {
	return;
}
echo wc_get_stock_html( $product );
if ( $product->is_in_stock() ) : ?>
	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
	<form class="cart" action="<?php echo esc_url( get_permalink() ); ?>" method="post" enctype='multipart/form-data'>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
<?php endif; ?></div></div></div></div></div><section class="tab_parent info_block"><div class="categories"><div class="container"><div class="wrapper_block"><div class="flex_container flex__left flex__center"><h4>Информация</h4><a class="tab_item active" href="#about">Описание</a><a class="tab_item" href="#characteristics">Характеристики</a><a class="tab_item" href="#reviews"> <?php _e( 'Reviews', 'woocommerce' ); ?></a></div></div></div></div><div class="product_info"><div class="container"><div class="active products_tab" id="about"><?php the_content(); ?></div><div class="products_tab" id="characteristics"><table class="characteristics"><?php global $product;
$attributes = $product->get_attributes();
foreach ( $attributes as $attribute ) : ?>
	<tr>
		<td><?php echo wc_attribute_label( $attribute->get_name() ); ?></td>
		<td><?php
			$values = array();
			if ( $attribute->is_taxonomy() ) {
				$attribute_taxonomy = $attribute->get_taxonomy_object();
				$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
				foreach ( $attribute_values as $attribute_value ) {
					$value_name = esc_html( $attribute_value->name );
					if ( $attribute_taxonomy->attribute_public ) {
						$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
					} else {
						$values[] = $value_name;
					}
				}
			} else {
				$values = $attribute->get_options();
				foreach ( $values as &$value ) {
					$value = make_clickable( esc_html( $value ) );
				}
			}
			echo apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
		?></td>
	</tr>
<?php endforeach; ?></table></div><div class="products_tab" id="reviews"><?php comments_template( '/single-product-reviews.php', $separate_comments ); ?></div></div></div></section><?php echo do_shortcode ('[related_products per_page="10"]'); ?></section><?php endwhile; ?>					<aside class="category calc"><div class="categories"><div class="container"><div class="wrapper_block"><div class="flex_container flex__left flex__center"><h4>Расчет мощности кондиционера</h4></div></div></div></div><div class="container"><form action="" name="condition" id="condition"><div class="flex_container"><div class="filter__block"><p>Площадь помещения, м2</p><div class="form__block"><div class="forms__item without_span"><label><input type="number" name="S" placeholder="5"/></label></div></div></div><div class="filter__block"><p>Высота потолка, м</p><div class="form__block"><div class="forms__item without_span"><label><input type="text" name="H" placeholder="2.5"/></label></div></div></div><div class="filter__block"><p>Ориентация окон*</p><div class="form__block"><div class="forms__item without_span"><select name="Y"><option value="138">Север</option><option value="203">Юг</option><option value="242">Северо-запад</option><option value="242">Северо-восток</option><option value="270">Юго-запад</option><option value="270">Юго-восток</option><option value="336">Восток</option><option value="336">Запад</option></select></div></div></div><div class="filter__block"><p>Количество компьютеров и/или телевизоров</p><div class="form__block"><div class="forms__item without_span"><label><input type="number" placeholder="1" name="A"/></label></div></div></div><div class="filter__block"><p>Сколько людей обычно в помещении</p><div class="form__block"><div class="forms__item without_span"><label><input type="number" placeholder="2" name="B"/></label></div></div></div><div class="filter__block result"><span>Результат:</span><h3></h3></div></div></form></div><div class="categories"><div class="container"><div class="wrapper_block"><div class="flex_container flex__left flex__center"><h4> Ранее просмотренные товары</h4></div></div></div></div><div class="container other-products"><?php dynamic_sidebar( 'sidebar-category-product-right' ); ?></div></aside></section><?php get_footer(); ?>