
// ///////////////////////////
// FORM PLACEHOLDER
// ///////////////////////////

var leftPX = '';
var  topPX = '10px';


$(document).ready(function(){
	$.each($('.forms__item input, .forms__item textarea'), function(i, val){
		// console.log($(val).val())

		leftPX = $(val).css('paddingLeft');
		var span = $(val).next('span');
		if($(this).val() != ''){
			span.animate({top: "-25px", left: "0px"});
		}

	})		
	// console.log(leftPX, topPX);
	
	var span = $('input:-webkit-autofill').next('span');
	span.animate({left: '0px', top: '-25px'});

})

	

$('.forms__item input, .forms__item textarea').keyup(function(){
	leftPX = $(this).css('paddingLeft');
	var span = $(this).next('span');
	if($(this).val() == ''){
		span.animate({left: leftPX, top: topPX});
		// span.removeClass('click');
		
		
	} else{
		span.animate({top: "-25px", left: "0px"});
		// span.addClass('click');
		
	}
});

$('.forms__item input, .forms__item textarea').click(function(){
	leftPX = $(this).css('paddingLeft');
	var span = $(this).next('span');
	span = $(span)[0];
	
	$(this).next('span').animate({left: "0px", top: "-25px"}).addClass('click');
	
});

$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $("span.click"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
	    && div.has(e.target).length === 0) { // и не по его дочерним элементам
		if($("span.click").prev('input').val() == ''){
		 $("span.click").animate({left: leftPX, top: topPX}).removeClass('click');
		}
	}
});


///////////////////////////////////////////////////////////////////////////////////
// SLIDERs
///////////////////////////////////////////////////////////////////////////////////


$('.arrow').click(function(event){
	event.preventDefault();


	///////////////////////////////////////////////////////////////////////////////////
	// HOME SLIDER
	///////////////////////////////////////////////////////////////////////////////////

	if($(this).parents('.sales').length == true){


		var slider = $(this).siblings('.sliders__wrapper').find('.sliders_nav__wrapper');
		var slider_wrapper_height = $(this).siblings('.sliders__wrapper').outerHeight();
		
		var slider_height = slider.outerHeight();

		var startTop= parseInt($(slider).css('margin-top')) || 0;		
		var slidesLenght = slider.find('.slider_nav').length;

		var active_slide_top = slider.find('.slider_nav')[1];
		var slide_height = $(active_slide_top).outerHeight();

		var arr = $(active_slide_top).parent().children();
		var active_slide_Number = 0;
		$.each(arr, function(i, val){
			if ($(val).hasClass('active')) active_slide_Number = i;
		})
		slider.find('.slider_nav').removeClass('active');

	
	////////////////////////////////////////////////////////////////////////////////////
	// other sliders	
	////////////////////////////////////////////////////////////////////////////////////

	} else{

		var slider_wrapper_width = $(this).siblings('.sliders__wrapper').outerWidth();

		var slider = $(this).siblings('.sliders__wrapper').find('.products_tab.active .slides, .products_tab.active .woocommerce');
		var slider_width = slider.outerWidth();

		var startleft= parseInt($(slider).css('margin-left')) || 0;
		var slidesLenght = slider.find('.product').length;

		var active_slide_Left = slider.find('.product')[1];
		var slide_width = $(active_slide_Left).outerWidth();

		var arr = $(active_slide_Left).parent().children();	
	}


	

	

	if($(this).hasClass('top')){

		if(startTop < 0 && $(window).width() >= 814 || 
			active_slide_Number > 0 && $(window).width() < 814)
		{
			
			slide_height += +startTop ;
			// console.log(startTop);
			slider.css({'marginTop': slide_height});
			var activeSlide = slider.find('.slider_nav')[active_slide_Number-1];
			// console.log(1);
		
		} else{
			slider.css({'marginTop':-slider_height+slider_wrapper_height});
			var activeSlide = slider.find('.slider_nav')[slidesLenght-1];
			// console.log(2);


		}

	} else if($(this).hasClass('bottom')){

		if(startTop-slide_height > slider_wrapper_height-slider_height && $(window).width() >= 814 || 
			active_slide_Number < slidesLenght-1 && $(window).width() < 814)
		{

			slide_height -= +startTop ;
			slider.css({'marginTop':-slide_height});
			var activeSlide = slider.find('.slider_nav')[active_slide_Number+1];
			// console.log(slide_height);
		
		} else {
			slider.css({'marginTop': '0'});
			var activeSlide = slider.find('.slider_nav')[0];

		}

	} else if($(this).hasClass('left')){
		
		if(  startleft/slide_width < -1){
			// console.log(+startleft, slide_width,+(startleft/slide_width), +(startleft/slide_width) < 1);
			slide_width += +startleft ;
			slider.css({'marginLeft': slide_width+10});
		
		} else{
			slider.css({'marginLeft':-slider_width+slider_wrapper_width});
			
		}



	} else if($(this).hasClass('right')){
		// console.log(startleft, slide_width);
		if(startleft-slide_width > slider_wrapper_width-slider_width ){

			slide_width -= +startleft ;
			slider.css({'marginLeft':-slide_width-10});
		
		} else{
			slider.css({'marginLeft':'0'});
			
			
		}
	}




	if($(this).parents('.sales').length  == true){
		$(activeSlide).addClass('active');

		var id = $(activeSlide).attr('href');
		var sect = $(this).parents('section');
		var tabs = sect.find('.slide');
		tabs.removeClass('active');
		// console.log(tabs, sect.find(id));
		sect.find(id).addClass('active');
	}
	

})

$('.slider_nav').click(function(event){
	event.preventDefault();

	$(this).siblings().removeClass('active');
	$(this).addClass('active');

	var id = $(this).attr('href');
	var sect = $(this).parents('section');
	var tabs = sect.find('.slide');
	tabs.removeClass('active');
	sect.find(id).addClass('active');

})

///////////////////////////////////////////////////////////////////////////
// touch slider
///////////////////////////////////////////////////////////////////////////

var touch_coord = 0;
var count = 0;

$('.products').on({ 'touchstart' : function(e){ 
	count = 0;
 	touch_coord = e.originalEvent.touches[0].clientX;
} });


$('.products').on({ 'touchmove' : function(e){ 
 	
	var slider_wrapper_width = $(this).find('.sliders__wrapper').outerWidth();

	var slider = $(this).find('.sliders__wrapper').find('.products_tab.active .slides');
	var slider_width = slider.outerWidth();

	var startleft= parseInt($(slider).css('margin-left')) || 0;
	var slidesLenght = slider.find('.product').length;

	var active_slide_Left = slider.find('.product')[1];
	var slide_width = $(active_slide_Left).outerWidth();

	var arr = $(active_slide_Left).parent().children();	
	

 	if(touch_coord - e.originalEvent.touches[0].clientX > 50 && count == 0){

		if(startleft-slide_width > slider_wrapper_width-slider_width ){
			slide_width -= +startleft ;
			slider.css({'marginLeft':-slide_width-10});
		} else{
			slider.css({'marginLeft':'0'});
		}
		count ++;

 	} else if(e.originalEvent.touches[0].clientX - touch_coord > 50 && count == 0){
 		
 		if(startleft/slide_width < -1){
			slide_width += +startleft ;
			slider.css({'marginLeft': slide_width+10});
		} else{
			slider.css({'marginLeft':-slider_width+slider_wrapper_width});
		}
		count ++;
 	}
 
	
} });




/////////////////////////////////////////////////
// Tabs
/////////////////////////////////////////////////


$('.tab_item').click(function(event){
	event.preventDefault();

	$(this).siblings().removeClass('active');
	$(this).addClass('active');
	var id = $(this).attr('href');
	var sect = $(this).parents('section.tab_parent');
	var tabs = sect.find('.products_tab');
	
	tabs.removeClass('active');
	sect.find(id).addClass('active');
	
})

////////////////////////////////////////////////////////////////
// Делегирование
////////////////////////////////////////////////////////////////

$('.categories').on('click', '.flex__column h4' , function(){
	$(this).siblings().toggle();
	$(this).find('.icon').toggleClass('active');
})


function tabsItemsToAllWidth(){
	var width_content = 0;
	var width_content_wrapp = 0;
	$.each($('.categories'), function(i, val ){
		$(val).find('.flex_container').removeClass('flex__column');
		width_content_wrapp = $(val).find('.wrapper_block').outerWidth();
		width_content = $(val).find('h4').outerWidth();
		$.each($(val).find('h4').siblings(), function(i2, val2 ){
			width_content += $(val2).outerWidth();

		})
		if($(val).parents('.filter').length == 0){
			
			// console.log(width_content, width_content_wrapp, this, width_content > width_content_wrapp, $(val).find('.flex_container'));
			if(width_content > width_content_wrapp){
				$(val).find('.flex_container').addClass('flex__column');
				$(val).find('.tab_item').hide();
				if($(val).find('h4 .icon').length == 0){
					$(val).find('h4').append(' <i class="icon down-arrow"></i>');
				}
			} else{


				$(val).find('.flex_container').removeClass('flex__column');
				$(val).find('.tab_item').show();
				$(val).find('h4 .icon').remove();
				
			}
		}
	})
}
$(document).ready(function(){
	 tabsItemsToAllWidth()
});

$(window).resize(function(){
	tabsItemsToAllWidth()
})

///////////////////////////////////////////////////////
// Menu
///////////////////////////////////////////////////////

$('.menu_button').click(function(e){
	e.preventDefault();
	$('.menu_wrapper_hidden').toggle();
})


if($(window).width() >= 1050){
	$('.menu > li:first-child').addClass('current');
	
}

$('.menu > li > a').click(function(e){
	e.preventDefault();
	
	if($(this).parent().hasClass('current')){
		if($(window).width() <= 1050){
			$(this).parent().removeClass('current');
			// console.log('fsdf');
		}
	} else{

		$(this).parents('.menu').find('li').removeClass('current');
		$(this).parent().addClass('current');
		
	}
})
$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $(".menu_wrapper_hidden"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
	    && div.has(e.target).length === 0) { // и не по его дочерним элементам
		$('.menu_wrapper_hidden').fadeOut();
	}
});


///////////////////////////////////////////////////////
// MOdal
///////////////////////////////////////////////////////


// open

$('[modal]').click(function(e){
	e.preventDefault();
	$($(this).attr('modal')).fadeIn();
	// $('body').addClass('modal-open');
})


// hide

$('.modal .hide').click(function(e){
	
	$('.modal__wrapper').fadeOut();
	// $('body').removeClass('modal-open');
	
})

$(document).mouseup(function (e){ // событие клика по веб-документу
	var div = $(".modal"); // тут указываем ID элемента
	if (!div.is(e.target) // если клик был не по нашему блоку
	    && div.has(e.target).length === 0) { // и не по его дочерним элементам
		$('.modal__wrapper').fadeOut();
	// $('body').removeClass('modal-open');
	}
});



//////////////////////////////////////////////////////////
// gallery
//////////////////////////////////////////////////////////


$('.gallery a').click(function(e){
	e.preventDefault();
	
	$('body').addClass('modal-open');
	var src_image = $(this).children('img').attr('src');
	// console.log(src_image);
	$('#image_modal img').attr('src', src_image)
	$('#image_modal').fadeIn();
})

//////////////////////////////////////////////////////////
// categories
//////////////////////////////////////////////////////////

var startWidth = $('.content.products .product').css('max-width');

function resizeProduct(){
	$('.content.products .product').css('max-width',startWidth);
	$('.content.products .product').css('max-width',$('.content.products .product').outerWidth());
};

$(document).ready(function(){
	
	resizeProduct();
});

$(window).resize(function(){
	resizeProduct();
})


/////////////////////////////////////////////////////////////
// filter
/////////////////////////////////////////////////////////////

$('.filter .down-arrow').click(function(){
	$(this).parents('.categories').next().fadeToggle()

})



/////////////////////////////////////////////////////////////
// CALC
/////////////////////////////////////////////////////////////

$('#condition input, #condition select').change(function(){

	calcConditionPower();
})
function formatNumber(num){			
	str = new String(num);
	new_str = str.split('.');
	res_str = new_str[0];
	
	if (new_str[1]) {
		res_str += "." + new_str[1].substr(0, 2);
	}						
	return res_str;		
}	

function calcConditionPower() {	
	form_el = document.forms['condition'].elements;
	Q = 0;
	S = form_el['S'].value;
	H = form_el['H'].value;
	Y = $(form_el['Y']).val();
	Y = form_el['Y'].options[form_el['Y'].options.selectedIndex].value;
	A = form_el['A'].value;
	B = form_el['B'].value;
	Q = ((S*H*Y)/10000)+(A*0.3)+(B*0.1)+((S*H*3.226)/1000);
	// form_el['Q'].value = formatNumber(Q);
	// console.log(formatNumber(Q) == typeOf(object));
	if(isNaN(formatNumber(Q))){
		$('.filter__block.result h3').text('Не корректные данные');
	} else{
		$('.filter__block.result h3').text(formatNumber(Q)  + ' кВт.');
	}
}

$('#fm_clc input, #fm_clc select').change(function(){

	calcTeplopoter();
})
function calcTeplopoter() {	
	var itogValue = 0.1 * fm_clc.sel1.value * fm_clc.sel2.value * fm_clc.sel3.value * fm_clc.sel4.value *  fm_clc.sel5.value *  fm_clc.sel6.value *  fm_clc.sel7.value  * fm_clc.sel8.value  * fm_clc.sel9.value;
	fm_clc.teplopoter.value = itogValue;
	$('#fm_itog h3').text(Math.round(itogValue * 1.2 * 100000) / 100000 + ' кВт');
}



/////////////////////////////////////////////////////////////////
// Compare
/////////////////////////////////////////////////////////////////
// $('body').on('load', 'iframe', function(){
// 	console.log($(this));
// 	$(this).css('background', 'red')
// })
// $('iframe')
$('.yith-woocompare-open').click(function(){
	$('iframe').css('background-color', 'red');
})


$(document).ready(function(){
	var page = $('.page-id-2075 h4')[0];
	$(page).nextUntil("h4").toggle();
	$(page).toggleClass('active');
})
$('.page-id-2075 h4').click(function(){
	$(this).nextUntil("h4").toggle();
	$(this).toggleClass('active');
})



// $(document).ready(function(){
    $(".my_form").submit(function(e) { //устанавливаем событие отправки для формы с id=form
            e.preventDefault();
            
            var form_data = $(this).serialize(); //собераем все данные из формы
            $.ajax({
	            type: "POST", //Метод отправки
	            url: template+"/send_admin.php", //путь до php фаила отправителя
	            data: form_data,
	            success: function() {
	            		var f = $(e)[0].target;
	                	$(f).prev().html('<h3>Спасибо за заявку</h3><hr /><p>Наши менеджеры свяжутся с вами в ближайшее время.</p>');
	                   	$(f).hide();
	            }
	        });
	        if($(e)[0].target.attr('class') != 'call'){
		        $.ajax({
		            type: "POST", //Метод отправки
		            url: template+"/send_client.php", //путь до php фаила отправителя
		            data: form_data,
		            success: function() {
		                  
		            }
		        });
		    }

    });
// });    