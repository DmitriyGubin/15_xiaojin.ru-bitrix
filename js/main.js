$(document).ready(function(){

	$('#menu-btn').click(function(){
   $('.menu').slideToggle(300);
   if ($(this).hasClass('not-active')) {
    $(this).addClass('is-active').removeClass('not-active');
  }else{
    setTimeout(function(){
     $('.is-active').addClass('not-active').removeClass('is-active')
   },250)
  }
});


/*===================*/
$('.show_select_in').select2({
  minimumResultsForSearch: -1
});
/*===================*/
$('.slider_card').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  adaptiveHeight: true,
  autoplay:false,
  dots: true,
  autoplaySpeed:2000
});
/*===================*/
$('.card_block2_flex_right_img_slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  variableWidth: true,
  responsive: [
    {
      breakpoint: 1101,
      settings:{
        slidesToShow: 1,
        variableWidth: false,
      }
    }
  ]
});


/*===================*/
$('input,textarea').focus(function () {
  $(this).data('placeholder', $(this).attr('placeholder'))
  $(this).attr('placeholder', '');
});
$('input,textarea').blur(function () {
  $(this).attr('placeholder', $(this).data('placeholder'));
});
  /*==============*/
  $(".mask_tel").mask("+0 (000) 000-00-00", {
        clearIfNotMatch: true
    });
  $('.mask_email').mask("A", {
  translation: {
    "A": { pattern: /[\w@\-.+]/, recursive: true }
  }
});

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



});/*$(document).ready(function()*/