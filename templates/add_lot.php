<<<<<<< HEAD
<?php 
    $lot_name = $_POST['lot-name'] ?? ''; 
    $category = $_POST['category'] ?? ''; 
    $message = $_POST['message'] ?? ''; 
    $lot_rate = $_POST['lot-rate'] ?? ''; 
    $lot_step = $_POST['lot-step'] ?? ''; 
    $lot_date = $_POST['lot-date'] ?? ''; 
?>
   <nav class="nav">
=======
  <nav class="nav">
>>>>>>> 5c4ae456b7b35783de0e909c81510feacba8f6f7
    <ul class="nav__list container">
      <li class="nav__item">
        <a href="all-lots.html">Доски и лыжи</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Крепления</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Ботинки</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Одежда</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Инструменты</a>
      </li>
      <li class="nav__item">
        <a href="all-lots.html">Разное</a>
      </li>
    </ul>
  </nav>
<<<<<<< HEAD
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
          <option value="Доски и лыжи" <?php if ($category == 'Доски и лыжи') print(' selected'); ?> >Доски и лыжи</option>
          <option value="Крепления"<?php if ($category == 'Крепления') print(' selected'); ?> >Крепления</option>
          <option value="Ботинки"<?php if ($category == 'Ботинки') print(' selected'); ?> >Ботинки</option>
          <option value="Одежда"<?php if ($category == 'Одежда') print(' selected'); ?>>Одежда</option>
          <option value="Инструменты"<?php if ($category == 'Инструменты') print(' selected'); ?>>Инструменты</option>
          <option value="Разное"<?php if ($category == 'Разное') print(' selected'); ?>>Разное</option>
=======
  <form class="form form--add-lot container" action="../add.php" method="post"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" required>
        <span class="form__error"></span>
      </div>
      <div class="form__item">
        <label for="category">Категория</label>
        <select id="category" name="category" required>
          <option>Выберите категорию</option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
          <option>Разное</option>
>>>>>>> 5c4ae456b7b35783de0e909c81510feacba8f6f7
        </select>
        <span class="form__error"></span>
      </div>
    </div>
<<<<<<< HEAD
    <div class="form__item form__item--wide <?php print(check_error($errors, 'message')); ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" value="<?=$message; ?>" placeholder="Напишите описание лота"></textarea>
=======
    <div class="form__item form__item--wide">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required></textarea>
>>>>>>> 5c4ae456b7b35783de0e909c81510feacba8f6f7
      <span class="form__error"></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
<<<<<<< HEAD
        <input class="visually-hidden" type="file" id="photo2" name="photo" value="">
=======
        <input class="visually-hidden" type="file" id="photo2" value="">
>>>>>>> 5c4ae456b7b35783de0e909c81510feacba8f6f7
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
<<<<<<< HEAD
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
=======
      <div class="form__item form__item--small">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" required>
        <span class="form__error"></span>
      </div>
      <div class="form__item form__item--small">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" required>
        <span class="form__error"></span>
      </div>
      <div class="form__item">
        <label for="lot-date">Дата завершения</label>
        <input class="form__input-date" id="lot-date" type="text" name="lot-date" placeholder="20.05.2017" required>
>>>>>>> 5c4ae456b7b35783de0e909c81510feacba8f6f7
        <span class="form__error"></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>