$(document).ready(function() {

  $("#newsticker").jCarouselLite({
   vertical: true, //вертикальная или горизонтальная
   hoverPause:true, //пауза прокрутки при наведении
   btnPrev: "#news-prev",
   btnNext: "#news-next",
   visible: 3, //количество новостей
   auto:3000, // интервал прокручиивания новостей 3 сек
   speed:500 //
});

$("#style-grid").click(function(){
$("#block-tovar-list").hide();
$("#block-tovar-grid").show();
$.cookie('select_style','grid');
$("#style-grid").attr("src","/images/icon-grid-active.png");
$("#style-list").attr("src","/images/icon-list.png");
});

$("#style-list").click(function(){
$("#block-tovar-grid").hide();
$("#block-tovar-list").show();
$.cookie('select_style','list');
$("#style-list").attr("src","/images/icon-list-active.png");
$("#style-grid").attr("src","/images/icon-grid.png");
});

if ($.cookie('select_style') == 'grid') {
  $("#block-tovar-list").hide();
  $("#block-tovar-grid").show();
  $("#style-grid").attr("src","/images/icon-grid-active.png");
  $("#style-list").attr("src","/images/icon-list.png");
}
else {
  $("#block-tovar-grid").hide();
  $("#block-tovar-list").show();
  $("#style-list").attr("src","/images/icon-list-active.png");
  $("#style-grid").attr("src","/images/icon-grid.png");
}

$("#select-sort").click(function(){
  $("#sorting-list").slideToggle(200);
});
});
