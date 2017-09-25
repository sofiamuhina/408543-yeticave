  <nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($categories as $key => $value) : ?>
      <li class="nav__item">
        <a href="all-lots.html"><?=$value['name_cat']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  <form enctype="multipart/form-data" class="form container <?php if ( count($errors) > 0) print(' form--invalid'); ?>" action="../sign_up.php" method="post" > <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?php print(check_error($errors, 'email')); ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail">
      <span class="form__error"></span>
    </div>
    <div class="form__item <?php print(check_error($errors, 'password')); ?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль">
      <span class="form__error"></span>
    </div>
    <div class="form__item <?php print(check_error($errors, 'name')); ?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя">
      <span class="form__error"></span>
    </div>
    <div class="form__item <?php print(check_error($errors, 'message')); ?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться"></textarea>
      <span class="form__error"></span>
    </div>
    <div class="form__item form__item--file form__item--last">
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
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="#">Уже есть аккаунт</a>
  </form>