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
            <img src="<?=$value['img'];?>" width="54" height="40" alt="<?=$value['name_lot']; ?>">
          </div>
          <h3 class="rates__title"><a href="lot.php?id=<?=$value['id']; ?>"><?=$value['name_lot']; if ($value['is_win']) print('Вы победитель!!'); ?></a></h3>
        </td>
        <td class="rates__category">
          <?php print($value['category']);  ?>
        </td>
        <td class="rates__timer">
          <div class="timer timer--finishing">07:13:34</div>
        </td>
        <td class="rates__price">
          <?=$value['price']; ?>
        </td>
        <td class="rates__time">
          <?php print(time_bet($value['time'])); ?>
        </td>
      </tr>
      <? endforeach; ?>
    </table>
  </section>