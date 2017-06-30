$(document).ready(function() {

// прокручивающийся блок новостей
  $("#newsticker").jCarouselLite({
   vertical: true, //вертикальная или горизонтальная
   hoverPause:true, //пауза прокрутки при наведении
   btnPrev: "#news-prev",
   btnNext: "#news-next",
   visible: 3, //количество новостей
   auto:3000, // интервал прокручиивания новостей 3 сек
   speed:500 //
});


// вывод на главную страницу (по два или списком)
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

// скрывает и запоминает блоки в выоде категорий
$('#block-category > ul > li > a').click(function(){

            if ($(this).attr('class') != 'active'){

			$('#block-category > ul > li > ul').slideUp(400);
            $(this).next().slideToggle(400);

                    $('#block-category > ul > li > a').removeClass('active');
					$(this).addClass('active');
                    $.cookie('select_cat', $(this).attr('id'));

				}else
                {

                    $('#block-category > ul > li > a').removeClass('active');
                    $('#block-category > ul > li > ul').slideUp(400);
                    $.cookie('select_cat', '');
                }
});

if ($.cookie('select_cat') != '')
{
$('#block-category > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}

$('#genpass').click(function(){
$.ajax({
type: "POST",
url: "/functions/genpass.php",
dataType: "html",
cache: false,
success: function(data) {
$('#reg_pass').val(data);
}
});

});

$('#reloadcaptcha').click(function(){
$('#block-captcha > img').attr("src","/reg/reg_captcha.php?r="+ Math.random());
});

});
