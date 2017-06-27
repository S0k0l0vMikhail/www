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

});
