$('.high-slider').slick({
	dots: true,
	infinite: false,
	slidesToShow: 1,
	prevArrow: '<div class="prev-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M107 24.5001L2 24.5001M2 24.5001L25 47.5M2 24.5001L25 1.50011" stroke="white" stroke-width="2"/></svg></div>',
	nextArrow: '<div class="next-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.01072e-06 24.5001L105 24.5001M105 24.5001L82 47.5M105 24.5001L82 1.50011" stroke="white" stroke-width="2"/></svg></div>'	
});

if(screen.width > 750)
{
	var slidess = 2;
}
else
{
	var slidess = 1;
}

$('.equip-slider').slick({
	dots: true,
	infinite: false,
	slidesToShow: slidess,
	slidesToScroll: slidess,
	prevArrow: '<div class="prev-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M107 24.5001L2 24.5001M2 24.5001L25 47.5M2 24.5001L25 1.50011" stroke="white" stroke-width="2"/></svg></div>',
	nextArrow: '<div class="next-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.01072e-06 24.5001L105 24.5001M105 24.5001L82 47.5M105 24.5001L82 1.50011" stroke="white" stroke-width="2"/></svg></div>'
});

// $('.equip-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
//       console.log(currentSlide);
//  });

/******мобильное меню*******/
var mobile_burger = document.querySelector(".mobile-burger");
var mobile_menu = document.querySelector("header .for-mobile");
var mobile_shade = document.querySelector("header .mobile-shade");
var body = document.querySelector("body");
var quest_butt = document.querySelector("header .popup-quest");

if(screen.width < 1000)
{
	quest_butt.addEventListener('click', Toggle_Mobile_Menu);
}

mobile_burger.addEventListener('click', Toggle_Mobile_Menu);
mobile_shade.addEventListener('click', Toggle_Mobile_Menu);

function Toggle_Mobile_Menu()
{
	mobile_menu.classList.toggle('active');
	body.classList.toggle('overflow');
	$(mobile_shade).fadeToggle(300);
}

/******мобильное меню*******/


/********скроллинг*********/

Scroll_to_elements('.smoth_link');

function Scroll_to_elements(selector)
{
	var smoothLinks = document.querySelectorAll(selector);

	for (let item of smoothLinks)
	{
		item.addEventListener('click', function (e) 
	    {
	    	if(mobile_menu.classList.contains('active'))
	    	{
	    		Toggle_Mobile_Menu();
	    	}
	    	
	        // e.preventDefault();
	        var id = item.getAttribute('href');
	        document.querySelector(id).scrollIntoView({
	            behavior: 'smooth',
	            block: 'start'
	        });
	    });
	}
}

/********скроллинг*********/

/*********Попап**********/
var my_close_equip_butt = document.querySelector('#popup-equip #close-popup-button');

$('.popup-equipment').fancybox({

    afterLoad : function(){
    		$("#popup-equip").removeClass('fadeOutDown animated');
            $("#popup-equip").addClass('fadeInUp animated');
            my_close_equip_butt.addEventListener('click',function(){
				document.querySelector('#popup-equip .fancybox-close-small').click();
			});
        },
    beforeClose : function(){
    		$("#popup-equip").removeClass('fadeInUp animated');
            $("#popup-equip").addClass('fadeOutDown animated');
        }

});


var my_close_quest_butt = document.querySelector('#popup-quest #close-popup-button-quest');

$('.popup-quest').fancybox({

    afterLoad : function(){
    		$("#popup-quest").removeClass('fadeOutDown animated');
            $("#popup-quest").addClass('fadeInUp animated');
            my_close_quest_butt.addEventListener('click',function(){
				document.querySelector('#popup-quest .fancybox-close-small').click();
			});
        },
    beforeClose : function(){
    		$("#popup-quest").removeClass('fadeInUp animated');
            $("#popup-quest").addClass('fadeOutDown animated');
        }

});

function Slider_Init()
{
    $('.popup-slider').not('.slick-initialized').slick({
        dots: false,
        infinite: false,
        slidesToShow: 1,
        variableWidth: true,
        prevArrow: '<div class="prev-photo"><svg width="11" height="21" viewBox="0 0 11 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 19.5L1.00017 10.5L10 1.50015" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
        nextArrow: '<div class="next-photo"><svg width="11" height="21" viewBox="0 0 11 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 19.5L9.99983 10.5L1 1.50015" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>'
    });
}

Slider_Init();



/*********Попап**********/


/**********Детальное отображение карточки товара***********/
var popup_reff = document.querySelectorAll('.popup-equipment');
var hidden_input_equip = document.querySelector('#equip_form #product_name_popup');

for (let item of popup_reff)
{
	item.addEventListener('click', function(){
		Send_Ajax_Request(item.dataset.id);
		hidden_input_equip.value = item.dataset.name;
	});
	// item.addEventListener('click', () => Send_Ajax_Request(item.dataset.id));
}

var name_popup = document.querySelector('#popup-equip .product-name');
var short_descr_popup = document.querySelector('#popup-equip .product-descr');
var slider_popup = document.querySelector('#popup-equip .popup-slider');
var max_rows = 6;//максимальное количество колонок в первом столбце свойств
var one_prop_box = document.querySelector('#one-prop-box');
var two_prop_box = document.querySelector('#two-prop-box');

function Return_Table_Props(first_iter, last_iter, data_mas)
{
	var all_props = '';
	for (let i = first_iter; i <= last_iter; i++) 
	{
		let arr = data_mas[i].split('%%%');
		all_props+=`
					<div class="prop-row">
                        <div class="left-div">
                            ${arr[0]}
                            <div class="erase"></div>
                        </div>

                        <div class="right-div">
                            ${arr[1]}                  
                            <div class="erase"></div>
                        </div>
                    </div>
		`;
	}

	return all_props;
}
			

function Send_Ajax_Request(id)
{
	$.ajax({
		type: "POST",
		url: '/ajax/common.php',
		data: {
			'delimiter': 'Попап детальный просмотр',
			'id': id
		},
		dataType: "json",
		success: function(data){
			if (data.status == true)
			{
				name_popup.innerHTML = data.name;
				short_descr_popup.innerHTML = data.short_descr;

				var all_slides = '';
				slider_popup.innerHTML = '';
				for(let img_path of data.galery)
				{
					all_slides+=`
						<div class="popup-slide">
			                <div class="img-box">
			                    <img src="${img_path}">
			                </div>  
			            </div>
					`;
				}
				$('.popup-slider').slick('unslick');
				$('.popup-slide').remove();

				slider_popup.innerHTML = all_slides;
    			Slider_Init();

    			var all_props = '';
    			var num_props = data.character.length;

    			if(num_props <= max_rows)//одна колонка
    			{
					one_prop_box.innerHTML = Return_Table_Props(0, num_props-1, data.character);
    			}
    			else//2 колонки
    			{
					one_prop_box.innerHTML = Return_Table_Props(0, max_rows-1, data.character);
					two_prop_box.innerHTML = Return_Table_Props(max_rows, num_props-1, data.character);
    			}
			}
		}
	});
}

/**********Детальное отображение карточки товара***********/

/****************Формы*************/
$(".phone").mask("+7(999) 999-9999");

var top_form_butt = document.querySelector("#send-order-butt-top");
var top_form = document.querySelector("#top-form");
if (top_form) { top_form_butt.addEventListener('click',() => Send_Form(top_form)); }


var lower_form_butt = document.querySelector("#send-order-butt-lowerr");
var lower_form = document.querySelector("#lower-formm");
if(lower_form)
{
	lower_form_butt.addEventListener('click',() => Send_Form(lower_form));
}

var popup_form_butt = document.querySelector("#send-quest-popup");
var popup_form = document.querySelector("#quest-form");
popup_form_butt.addEventListener('click',() => Send_Form(popup_form));

var popup_form_butt_eq = document.querySelector("#send-equip-popup-butt");
var popup_form_eq = document.querySelector("#equip_form");
popup_form_butt_eq.addEventListener('click',() => Send_Form(popup_form_eq));

function Validate(form_ref, input_class)
{
	var err=0;

	var inputs = form_ref.querySelectorAll(input_class);

    for (let item of inputs)
    {
        var bool = ($(item).val() == '');

        if (bool)
        {
            err++;
            $(item).addClass("hasError");
        } 
        else 
        {
            $(item).removeClass("hasError");
        }
    }

    return err;
}

function Send_Form(form_ref)
{
	var err = Validate(form_ref, '.all-input');

	if (err == 0)
    {
    	var formData = new FormData(form_ref);
        $.ajax({
            type: "POST",
            url: '/ajax/common.php',
            data: formData,
            processData: false,
        	contentType: false,
            dataType: "json",
            success: function(data){

                if (data.status == true)
                {
                	console.log(data);
                	form_ref.reset();
                	form_ref.querySelector('.form-box.form').classList.add("hide");
                	form_ref.querySelector('.form-box.succes').classList.remove("hide");
                }
            }
        });
    }
}


/********Повторить**********/

var all_forms = document.querySelectorAll('form.all-forms');
for(let item of all_forms)
{
	let repeat_butt = item.querySelector('.repeat-form');
	let form_box = item.querySelector('.form');

	let succes_box = item.querySelector('.succes');

	repeat_butt.addEventListener('click', function(){
		succes_box.classList.add('hide');
		form_box.classList.remove('hide');
	});
}
/********Повторить**********/

/********Масштабирование надписи******/
window.addEventListener('scroll', Scrolll);

var logo_back = document.querySelector('.premium .big-logo-back');

function Scrolll()
{
	let offset = ''
	if (logo_back) offset = logo_back.getBoundingClientRect().bottom;
	if(offset > 0)
	{
		let delta = 1 - 1/offset*50;
		if(delta < 0.1)
		{
			delta = 1;
		}
		logo_back.style.scale = delta;
	}
}

/********Масштабирование надписи******/


// $(".slider").on("init", function(event, slick){
//     $(".count").text(parseInt(slick.currentSlide + 1) + ' / ' + slick.slideCount);
// });

// $(".slider").on("afterChange", function(event, slick, currentSlide){
//     $(".count").text(parseInt(slick.currentSlide + 1) + ' / ' + slick.slideCount);
// });
// $(".page-article-item_image-slider").slick({
//     slidesToShow: 1,
//     arrows: true
// });


$(document).ready(function(){
	$(document).on('click', '#send-order-butt-lower', function (e) {
		
		e.preventDefault();

		let error = ''
		let form_url = '/ajax/ajax_form.php'

		if (!$('#form_fio').val()) {
			error = 1;
		}
		if (!$('#form_email').val()) {
			error = 1;
		}
		if (!$('#form_phone').val()) {
			error = 1;
		}
		let formData = 'form_fio='+$('#form_fio').val()+'form_email='+$('#form_email').val()+'form_phone='+$('#form_phone').val();

		if (!error) {
			$.ajax({
				url: form_url,
				type: 'POST',
				data: formData,
				success: function (data) {
					$('#lower-form .form-box.form').addClass('hide')
					$('.form-box.succes').removeClass('hide')
				},
				cache: false,
				contentType: false,
				processData: false
			});
		}

		return false;
	});

	$(document).on('change', '#sort', function (e) {
		location.href = $('#uri').val()+'order='+$(this).val()
	});

	$(document).on('click', '.repeat-form', function (e) {
		$('.standard-form .all-input').val('')
		$('.standard-form .form-box.succes').addClass('hide')
		$('.standard-form .form-box.form').removeClass('hide')
	});

});


$('.documents_slider').slick({
	dots: false,
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1000,
			settings: {
				slidesToShow: 2
			}
		},
		{
			breakpoint: 750,
			settings: {
				slidesToShow: 1
			}
		}
	],
	prevArrow: '<div class="prev-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M107 24.5001L2 24.5001M2 24.5001L25 47.5M2 24.5001L25 1.50011" stroke="white" stroke-width="2"/></svg></div>',
	nextArrow: '<div class="next-photo"><svg width="107" height="49" viewBox="0 0 107 49" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.01072e-06 24.5001L105 24.5001M105 24.5001L82 47.5M105 24.5001L82 1.50011" stroke="white" stroke-width="2"/></svg></div>'
});

var form = document.querySelector('header .search_form');
document.querySelector('.search_form .loopa').addEventListener("click", function(){
	form.submit();
});



$('.product-slider__items').slick({
  dots: true,
  infinite: false,
  arrows: true,
  prevArrow:".product-slider__prev",
  nextArrow:".product-slider__next",
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
	{
      breakpoint: 1280,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
	{
      breakpoint: 960,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
	{
      breakpoint: 750,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
		dots: false,
      }
    },
  ]
});
let search_input = document.getElementById('search_input');
if (search_input) {
	search_input.addEventListener("focusin", (event) => {
		search_input.parentNode.classList.add('focused');
	});
	search_input.addEventListener("focusout", (event) => {
		setTimeout(function(){
			search_input.parentNode.classList.remove('focused');
		},500);
		
	});
	search_input.addEventListener("input", (event) => {
		let value = event.target.value;
		if (value && value.length > 2) {
			$.post('/', {
				ajax_call: 'y',
				INPUT_ID: 'title-search-input',
				q: value,
				l: 2
			}, function (result) {
				document.querySelector('.search-list').innerHTML = result;

				if (result.length > 0) {
					document.querySelector('.search-list').classList.add('open');
				} else {
					document.querySelector('.search-list').classList.remove('open');
				}
			}, 'html');

			/*let html = '';
			html += '<ul>';
			html += '<li><span>Шпигорезки</span></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> вертикальная QD-3000</a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> с вакуумным упаковщиком HVV-410 / 1A</a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> HVV-410 / 1A</a></li>';
			html += '<li><span>Колбасные шприцы</span></li>';
			html += '<li><a href="">Вертикальная колбасная <mark>шпигорезка</mark></a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> HVV-410 / 1A</a></li>';
			html += '<li><span>Шпигорезки</span></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> вертикальная QD-3000</a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> с вакуумным упаковщиком HVV-410 / 1A</a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> HVV-410 / 1A</a></li>';
			html += '<li><span>Колбасные шприцы</span></li>';
			html += '<li><a href="">Вертикальная колбасная <mark>шпигорезка</mark></a></li>';
			html += '<li><a href=""><mark>Шпигорезка</mark> HVV-410 / 1A</a></li>';
			html += '</ul>';
			html += '<a href="" class="search-list__all">Показать все результаты</a>';
			if (html.length > 0) {
				document.querySelector('.search-list').classList.add('open');
			} else {
				document.querySelector('.search-list').classList.remove('open');
			}*/
		} else {
			document.querySelector('.search-list').innerHTML = '';
			document.querySelector('.search-list').classList.remove('open');
		}
	});
}

$('.video-gallery__big-slider').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	asNavFor: '.video-gallery__thumbs-slider'
});
$('.video-gallery__thumbs-slider').slick({
	slidesToShow: 5,
	slidesToScroll: 1,
	asNavFor: '.video-gallery__big-slider',
	dots: false,
	arrows: true,
	centerMode: false,
	focusOnSelect: true,
	responsive: [
	{
      breakpoint: 960,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
	{
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
		dots: false,
      }
    },
	{
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
		dots: false,
      }
    },
  ]
});