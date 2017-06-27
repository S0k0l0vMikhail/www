<div id="block-parameter">
  <p class="header-title">Поиск по параметрам</p>
  <p class="title-filter">Стоимость</p>
  <form method="GET" action="search-filter.php">
    <div id="block-input-price">
      <ul>
        <li><p>от</p></li>
        <li><input type="text" id="start-price" name="start_price" value="1000" /></li>
        <li><p>до</p></li>
        <li><input type="text" id="end-price" name="end_price" value="3000" /></li>
        <li><p>руб</p></li>
      </ul>
    </div>
    <div id="blocktrackbar"></div>
    <p class="title-filter">Производитель</p>
    <ul class="checkbox-brand">
      <li><input type="checkbox" id="checkboxbrand1"/><label id="checkrend1">Бренд 1</label></li>
      <li><input type="checkbox" id="checkboxbrand2"/><label id="checkrend2">Бренд 2</label></li>
      <li><input type="checkbox" id="checkboxbrand3"/><label id="checkrend3">Бренд 3</label></li>
    </ul>
    <center><input type="submit" name="submit" id="button-param-search" value=" " /></center>
  </form>
</div>
