function onLoadjqm(hash){
  var name = $(hash.t).data('name');

  if($(hash.t).data('autohide')){
    $(hash.w).data('autohide', $(hash.t).data('autohide'));
  }

  if(name == 'order_product'){
    if($(hash.t).data('product')) {
      var product = $(hash.t).data('product');
      var box = $(hash.t).data('box');
      if(box) {
        product = product + ' (' + box + ')'; 
      }
      $('input[name="PRODUCT"]').val(product);
      $('input[name="PRODUCT"]').parent().hide();
    }

    if($(hash.t).data('title')) {
      $('span.title').html($(hash.t).data('title'));
    }

    if($(hash.t).data('price')) {
      $('.popup__body').prepend('<p class="popup__info">Стоимость: <span>'+$(hash.t).data('price')+'</span></p>');
    }

    if($(hash.t).data('box')) {
      $('.popup__body').prepend('<p class="popup__info">Вариант поставки: <span>'+$(hash.t).data('box')+'</span></p>');
    }

    if($(hash.t).data('version')) {
      $('.popup__body').prepend('<p class="popup__info">Версия: <span>'+$(hash.t).data('version')+'</span></p>');
    }
  }
}

function onHide(hash){
  if($(hash.w).data('autohide')){
    eval($(hash.w).data('autohide'));
  }
  hash.w.empty();
  hash.o.remove();
  hash.w.removeClass('show');
}

$.fn.jqmEx = function(){
  
  $(this).each(function(){
    var _this = $(this);
    var name = _this.data('name');

    if(name.length){
      var script = '/bitrix/components/pixelaria/form/ajax/form.php';
      var paramsStr = ''; var trigger = ''; var arTriggerAttrs = {};
      
      $.each(_this.get(0).attributes, function(index, attr){
        var attrName = attr.nodeName;
        var attrValue = _this.attr(attrName);
        trigger += '[' + attrName + '=\"' + attrValue + '\"]';
        arTriggerAttrs[attrName] = attrValue;
        if(/^data\-param\-(.+)$/.test(attrName)){
          var key = attrName.match(/^data\-param\-(.+)$/)[1];
          paramsStr += key + '=' + attrValue + '&';
        }
      });
      
      var triggerAttrs = JSON.stringify(arTriggerAttrs);
      var encTriggerAttrs = encodeURIComponent(triggerAttrs);
      script += '?' + paramsStr + 'data-trigger=' + encTriggerAttrs;
      
      if(!$('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').length){
        if(_this.attr('disabled') != 'disabled'){
          $('body').find('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').remove();
          $('body').append('<div class="' + name + '_frame jqmWindow" style="width:500px" data-trigger="' + encTriggerAttrs + '"></div>');
          
          $('.' + name + '_frame[data-trigger="' + encTriggerAttrs + '"]').jqm({
            trigger: trigger, 
            onLoad: function(hash){
              onLoadjqm(hash);
            }, 
            onHide: function(hash){
              onHide(hash);
            },
            ajax:script,
          });


        }
      }
    }
  })
}

$(function (){
  console.log('init');

  $('.navbar-toggler').click(function(e){
    var target = $(this).data('target');
    $('#'+target).toggleClass('nav--active');
  });

  $('.search__toggler').click(function(e){
    var target = $(this).data('target');
    $('#'+target).toggleClass('search--active');
    return false;
  });


  $('.nav__item--parent').click(function(e){
    console.log('clicked');
    $(this).toggleClass('nav__item--active');
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

  
  $('html').click(function() {
    $('.search--active').removeClass('search--active');
  });

  $('.search').click(function(e){
    return false;
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
  

  $('.radioblock__item').click(function(e){
    $(this).parent().find('.radioblock__item').removeClass('radioblock__item--active');
    $(this).addClass('radioblock__item--active');
  });


  $('.config .radioblock__item').click(function(e){
    var title = $(this).data('title');
    var price = $(this).data('price');

    var config = $(this).closest('.config');

    var config__price = config.find('.config__price');
    var config__btn = config.find('.config__btn');

    config__price.html(price);
    config__btn.data('price',price);
    config__btn.data('box',title);

    console.log(config__btn.data('price'));
  });

  if ($('.slider').length) {
    $('.slider').unslider({ 
      nav: false,
      autoplay: true, 
      delay: 4500,
      arrows: {
        prev: '<a class="unslider-arrow prev">Previous slide</a>',
        next: '<a class="unslider-arrow next">Next slide</a>',
      }
    });
  }

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
  

  if ($('.parallax').length) {
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
  }
  
  /*$('*[data-event="jqm"]').click(function(e){
    $(this).jqmEx();
    $(this).trigger('click');
  });*/
  
  $('body').delegate('*[data-event="jqm"]','click', function(e){
    e.preventDefault();
    $(this).jqmEx();
    $(this).trigger('click');
  });
  
  //$('*[data-event="jqm"]').jqmEx();
  
  console.log('complete...');
});
