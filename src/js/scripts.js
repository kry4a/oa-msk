$(function (){
  console.log('init');

  $('.navbar-toggler').click(function(e){
    var target = $(this).data('target');
    $('#'+target).toggleClass('nav--active');
  });

  $('.search__toggler').click(function(e){
    var target = $(this).data('target');
    $('#'+target).toggleClass('search--active');
  });


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

  $('.accordeon__preview').click(function(e){
    $(this).closest('.accordeon').toggleClass('accordeon--active');
  });

  $('.btn--orange').click(function(e){
    $('.popup').addClass('popup--active');
    $('.popup__bg').addClass('popup__bg--active');
  });


  $('body').on('click','.popup__closer',function(){
    $('.popup').removeClass('popup--active');
    $('.popup__bg').removeClass('popup__bg--active');
  });

  $('.im--phone').mask('+7 (000) 000-00-00');



  $('.row__title').click(function(){
    $(this).next('.row__body').toggleClass('active');
  });
  
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
  

  $('.slider').unslider();

  if ($('.baron').length) {
    baron({
        root: '.baron',
        scroller: '.baron__scroller',
        bar: '.baron__bar',
        scrollingCls: '_scrolling',
        draggingCls: '_dragging'
    }).fix({
        elements: '.header__title',
        outside: 'header__title_state_fixed',
        before: 'header__title_position_top',
        after: 'header__title_position_bottom',
        clickable: true
    }).controls({
        // Element to be used as interactive track. Note: it could be different from 'track' param of baron.
        track: '.baron__track',
        forward: '.baron__down',
        backward: '.baron__up'
    });
  }
  
  var parallax_1 = document.querySelectorAll(".parallax--1"),
      parallax_2 = document.querySelectorAll(".parallax--2"),
      speed_big = 0.25,
      speed_small = 0.6;

  window.onscroll = function(){
    [].slice.call(parallax_1).forEach(function(el,i){

      var windowYOffset = window.pageYOffset,
          big_pos = "50% " + (windowYOffset * speed_big - 200) + "px";
          el.style.backgroundPosition = big_pos;
    });
    [].slice.call(parallax_2).forEach(function(el,i){

      var windowYOffset = window.pageYOffset,
          small_pos = "50% " + (windowYOffset * speed_small - 200) + "px";
      el.style.backgroundPosition = small_pos;
    });
  };
});
