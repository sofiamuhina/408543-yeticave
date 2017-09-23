 <nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($categories as $key => $value) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?=$value['name_cat']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <section class="rates container">
    <h2>Мои ставки</h2>
    <table class="rates__list">
      <?php foreach ($bets as $key => $value): ?>
      <tr class="rates__item">
        <td class="rates__info">
          <div class="rates__img">
            <img src="../img/rate<?=$value['id']+1;?>.jpg" width="54" height="40" alt="Сноуборд">
          </div>
          <h3 class="rates__title"><a href="lot.php?id=<?=$value['id']; ?>"><?php foreach($lots as $number_lot => $lot_value) {if ($number_lot == $value['id']) { print($lot_value['name']); ; ?></a></h3>
        </td>
        <td class="rates__category">
          <?php print($lot_value['category']); };}; ?>
        </td>
        <td class="rates__timer">
          <div class="timer timer--finishing">07:13:34</div>
        </td>
        <td class="rates__price">
          <?=$value['cost']; ?>
        </td>
        <td class="rates__time">
          <?php print(time_bet($value['time'])); ?>
        </td>
      </tr>
      <? endforeach; ?>
    </table>
  </section>