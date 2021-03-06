       <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $key => $value): ?>
            <li class="promo__item promo__item--<?=$value['class']; ?>">
                <a class="promo__link" href="all-lots.html"><?=$value['name']; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
            <select class="lots__select">
                <option>Все категории</option>
                <?php foreach ($categories as $key => $value): ?>
                    <option><?=$value['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <ul class="lots__list">
            <?php foreach($lots as $number_lot => $value): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$value['img']; ?>" width="350" height="260" alt="<?=$value['name']; ?>">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$value['category']; ?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?=$number_lot; ?>"><?=$value['name']; ?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=$value['price']; ?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=$lot_time_remaining;?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>