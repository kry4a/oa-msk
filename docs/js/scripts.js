$(function (){
  console.log('init');
  $('.nav__item--parent').click(function(e){
    console.log('clicked');
    $(this).toggleClass('nav__item--active');
  });
});
