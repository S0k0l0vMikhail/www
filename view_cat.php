<?php

include_once "/include/db_connect.php";
include_once "/functions/functions.php";

$cat = clear_string($_GET["cat"]);
$type = clear_string($_GET["type"]);

$sorting = $_GET["sort"];

switch ($sorting)
{
    case 'price-asc';
    $sorting = 'price ASC';
    $sort_name = 'От дешевых к дорогим';
    break;

    case 'price-desc';
    $sorting = 'price DESC';
    $sort_name = 'От дорогих к дешевым';
    break;

    case 'popular';
    $sorting = 'count DESC';
    $sort_name = 'Популярное';
    break;

    case 'news';
    $sorting = 'datetime DESC';
    $sort_name = 'Новинки';
    break;

    case 'brand';
    $sorting = 'brand';
    $sort_name = 'Новинки';
    break;

    default:
    $sorting = 'products_id DESC';
    $sort_name = 'Нет сортировки';
    break;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>Интернет магазин</title>
  <link rel="stylesheet" type="text/css" href="/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/trackbar/trackbar.css">
  <script src="/js/jquery-1.8.2.min.js"></script>
  <script src="/js/jcarousellite_1.0.1.js"></script>
  <script src="/js/shop-script.js"></script>
  <script src="/js/jquery.cookie.min.js"></script>
  <script src="/trackbar/jquery.trackbar.js"></script>
</head>
<body>
  <div id="block-body">
    <?php
    include_once "/include/block-header.php";
    ?>
    <div id="block-right">
      <?php
      include_once "/include/block-category.php";
      include_once "/include/block-parameter.php";
      include_once "/include/block-news.php";
      ?>
    </div>
    <div id="block-content">


      <?php
      if (!empty($cat) && !empty($type))
      {
        $querycat = "AND brand='$cat' AND type_tovara='$type'";
        $catlink = "cat=$cat&";
      } else
      {
        if(!empty($type))
        {
          $querycat = "AND type_tovara='$type'";
        } else {
          $querycat = "";
        }
        if(!empty($cat))
        {
          $catlink = "cat=$cat&";
        } else {
          $catlink = "";
        }

      }
      $result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting", $link );
      if (mysql_num_rows($result) > 0){
        $row =  mysql_fetch_array($result);
        echo '<div id="block-sorting">
          <p id="nav-breadcrumbs"><a href="index.php">Главная страница</a> \ <span>Все товары</span><p>
            <ul id="options-list">
              <li>Вид: </li>
              <li><img id="style-grid" src="/images/icon-grid-active.png" /></li>
              <li><img id="style-list" src="/images/icon-list.png" /></li>
              <li>Сортировка:</li>
              <li><a id="select-sort">'.$sort_name.'</a>
              <ul id="sorting-list">
                <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-asc">От дешёвых к дорогим</a></li>
                <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=price-desc">От дорогих к дешёвым</a></li>
                <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=popular">Популярные</a></li>
                <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=news">Новинки</a></li>
                <li><a href="view_cat.php?'.$catlink.'type='.$type.'&sort=brand">От А до Я</a></li>
              </ul>
              </li>
            </ul>
        </div>
        <ul id="block-tovar-grid">
        ';
        do {
          if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
              {
              $img_path = './uploads_images/'.$row["image"];
              $max_width = 200;
              $max_height = 200;
               list($width, $height) = getimagesize($img_path);
              $ratioh = $max_height/$height;
              $ratiow = $max_width/$width;
              $ratio = min($ratioh, $ratiow);
              $width = intval($ratio*$width);
              $height = intval($ratio*$height);
              }else
              {
              $img_path = "/images/no-image.png";
              $width = 110;
              $height = 200;
              }
          echo '
          <li>
          <div class="block-images-grid">
            <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
          </div>
          <p class="style-title-grid">
            <a href="">'.$row["title"].'</a>
          </p>
          <ul class="reviews-and-counts-grid">
          <li><img src="images/eye-icon.png" /><p>0</p></li>
          <li><img src="images/comment-icon.png" /><p>0</p></li>
          </ul>
          <a class="add-cart-style-grid"></a>
          <p class="style-price-grid"><strong>'.$row["price"].'</strong> руб.</p>
          <div class="mini-features">
            '.$row["mini_features"].'
          </div>
          </li>
          ';
        }
        while ($row =  mysql_fetch_array($result));
      //}88888
      ?>
    </ul>

    <ul id="block-tovar-list">
    <?php
    $result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting", $link );
    if (mysql_num_rows($result) > 0){
      $row =  mysql_fetch_array($result);
      do {
        if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
            {
            $img_path = './uploads_images/'.$row["image"];
            $max_width = 150;
            $max_height = 150;
             list($width, $height) = getimagesize($img_path);
            $ratioh = $max_height/$height;
            $ratiow = $max_width/$width;
            $ratio = min($ratioh, $ratiow);
            $width = intval($ratio*$width);
            $height = intval($ratio*$height);
            }else
            {
            $img_path = "/images/noimages80x70.png";
            $width = 80;
            $height = 70;
            }
        echo '
        <li>
        <div class="block-images-list">
          <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
        </div>
        <ul class="reviews-and-counts-list">
        <li><img src="images/eye-icon.png" /><p>0</p></li>
        <li><img src="images/comment-icon.png" /><p>0</p></li>
        </ul>
        <p class="style-title-list">
          <a href="">'.$row["title"].'</a>
        </p>
        <a class="add-cart-style-list"></a>
        <p class="style-price-list"><strong>'.$row["price"].'</strong> руб.</p>
        <div class="style-text-list">
          '.$row["mini_description"].'
        </div>
        </li>
        ';
      }
      while ($row =  mysql_fetch_array($result));
    }
  } //*********
  else {
    echo '<h2>Категория не доступна или не создана!</h2>';
  }
    ?>
  </ul>
    </div>
    <?php
    include_once "/include/block-footer.php";
    ?>
  </div>

</body>
</html>