    <nav class="nav">
        <ul class="nav__list container">
          <?php foreach ($categories as $key => $value) : ?>
          <li class="nav__item">
            <a href="all-lots.html"><?=$value['name_cat']; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$lot_item['name_lot']; ?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img src="<?=$lot_item['img']; ?>" width="730" height="548" alt="<?=$lot_item['name_lot']; ?>">
                </div>
                <p class="lot-item__category">Категория: <span><?=$lot_item['name_cat']; ?></span></p>
                <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
                    снег
                    мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
                    снаряд
                    отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
                    кэмбер
                    позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
                    просто
                    посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
                    равнодушным.</p>
            </div>
            <div class="lot-item__right">
               
                <?php if ($add_bet == true) : ?>
                    <div class="lot-item__state">
                        <div class="lot-item__timer timer">
                            10:54:12
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"><?=$lot_item['price_cur']; ?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span>12 000 р</span>
                            </div>
                        </div>
                        <form class="lot-item__form" action="../lot.php?id=<?=$id?>" method="post">
                            <p class="lot-item__form-item <? if ($error == true) print(' form__item--invalid');?>">
                                <label for="cost">Ваша ставка</label>
                                <input id="cost" type="number" name="cost" placeholder="12 000">
                            </p>
                            <button type="submit" class="button">Сделать ставку</button>
                        </form>
                        <?php if ($error == true) : ?>
                        <span class="form__error" style="display: block">Ваша ставка должна быть больше 11500р</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="history">
                    <h3>История ставок (<span>4</span>)</h3>
                    <!-- заполните эту таблицу данными из массива $bets-->
                    <table class="history__list">
                        <?php foreach($bets as $bet): ?>
                            <tr class="history__item">
                                <td class="history__name"><?=$bet['name']; ?></td>
                                <td class="history__price"><?=$bet['price']; ?>р</td>
                                <td class="history__time"><?php print(time_bet($bet['ts'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>