$(function (){
  console.log('init');
  $('.nav__item--parent').click(function(e){
    console.log('clicked');
    $(this).toggleClass('nav__item--active');
    return false;
  });

  $('.link--readmore').click(function(e){
    console.log('readmore');
    var target = $(this).data('target');
    $('#'+target).toggleClass('section__readmore--active');
    
    $(this).hide();
    
    return false;
  });

  $('.link--less').click(function(e){
    console.log('less');
    var target = $(this).data('target');
    $('#'+target).removeClass('section__readmore--active');
    
    $('.link--readmore').show();
    return false;
    
  });

  $('.btn--orange').click(function(e){
    $('.popup').show();
    $('.popup__bg').show();
  });


  $('body').on('click','.popup__close',function(){
    $('.popup').hide();
    $('.popup__bg').hide();
  });

  $('.im--phone').mask('+7 (000) 000-00-00', {placeholder: "+7 (___) ___-__-__"});

  $('.input--required').change(function(e){
    $(this).removeClass('input--error');
    $(this).removeClass('input--success');
    
    var val = $(this).val();
    if ($(this).hasClass('im--phone')) {
      if (val.length<18)
        $(this).addClass('input--error');
      else {
        $(this).addClass('input--success');
      }
    } else {
      if (val=='') {
        $(this).addClass('input--error');
      } else {
        $(this).addClass('input--success');
      } 
    }
    
  });

  
  var parallax = document.querySelectorAll(".parallax"),
      speed = 0.5;

  window.onscroll = function(){
    [].slice.call(parallax).forEach(function(el,i){

      var windowYOffset = window.pageYOffset,
          elBackgrounPos = "50% " + (windowYOffset * speed) + "px";

      el.style.backgroundPosition = elBackgrounPos;

    });
  };
});
