<?php 
    $lot_name = $_POST['lot-name'] ?? ''; 
    $category = $_POST['category'] ?? ''; 
    $message = $_POST['message'] ?? ''; 
    $lot_rate = $_POST['lot-rate'] ?? ''; 
    $lot_step = $_POST['lot-step'] ?? ''; 
    $lot_date = $_POST['lot-date'] ?? ''; 
?>

  <nav class="nav">
    <ul class="nav__list container">
     <?php foreach ($categories as $key => $value) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?=$value['name_cat']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <form enctype="multipart/form-data" class="form form--add-lot container <?php if ( count($errors) > 0) print(' form--invalid'); ?>" action="../add.php" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      
      <div class="form__item <?php print(check_error($errors, 'lot-name')); ?> "> 
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" value="<?=$lot_name; ?>" placeholder="Введите наименование лота">
        <span class="form__error"></span>
      </div>
      <div class="form__item ">
        <label for="category">Категория</label>
        <select id="category" name="category">
          <option>Выберите категорию</option>
          <?php foreach ($categories as $key => $value): ?>
                <option <?php print(choose_category($value['name_cat'], $category)); ?>><?=$value['name_cat']; ?></option>
          <?php endforeach; ?>
        </select>
        <span class="form__error"></span>
      </div>
    </div>
    <div class="form__item form__item--wide <?php print(check_error($errors, 'message')); ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота"><?=$message; ?></textarea>
      <span class="form__error"></span>
    </div>
    <div class="form__item form__item--file <?php print(check_error($errors, 'photo')); ?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="photo" value="">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
        <span class="form__error">Загрузите файл в формате JPEG</span>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?php print(check_error($errors, 'lot-rate')); ?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" name="lot-rate" value="<?=$lot_rate; ?>" placeholder="0">
        <span class="form__error"></span>
      </div>
      <div class="form__item form__item--small <?php print(check_error($errors, 'lot-step')); ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" name="lot-step" value="<?=$lot_step; ?>" placeholder="0">
        <span class="form__error"></span>
      </div>
      <div class="form__item  <?php print(check_error($errors, 'lot-date')); ?>">
        <label for="lot-date">Дата завершения</label>
        <input class="form__input-date" id="lot-date" type="text" value="<?=$lot_date; ?>" name="lot-date" placeholder="20.05.2017">
        <span class="form__error"></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
  