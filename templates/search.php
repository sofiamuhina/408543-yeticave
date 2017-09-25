   <nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($categories as $key => $value) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?=$value['name_cat']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <div class="container">
    <section class="lots">
      <h2>Результаты поиска по запросу «<span>Union</span>»</h2>
      <ul class="lots__list">
      
       <?php foreach ($lots as $lot => $value) : ?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src="<?=$value['img']; ?>" width="350" height="260" alt="Сноуборд">
          </div>
          <div class="lot__info">
            <span class="lot__category"><?=$value['name_cat']; ?></span>
            <h3 class="lot__title"><a class="text-link" href="lot.html"><?=$value['name_lot']; ?></a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?=$value['price_start']; ?><b class="rub">р</b></span>
              </div>
              <div class="lot__timer timer">
                16:54:12
              </div>
            </div>
          </div>
        </li>
        <?php endforeach; ?>
        
      </ul>
    </section>
    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <li class="pagination-item pagination-item-active"><a>1</a></li>
      <li class="pagination-item"><a href="#">2</a></li>
      <li class="pagination-item"><a href="#">3</a></li>
      <li class="pagination-item"><a href="#">4</a></li>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>
  </div>