<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>Интернет магазин</title>
  <link rel="stylesheet" type="text/css" href="/css/reset.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script src="/js/jquery-1.8.2.min.js"></script>
  <script src="/js/jcarousellite_1.0.1.js"></script>
  <script src="/js/shop-script.js"></script>
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
    <div id="block-content"></div>
    <?php
    include_once "/include/block-footer.php";
    ?>
  </div>

</body>
</html>
