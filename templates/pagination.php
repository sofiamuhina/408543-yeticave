    <ul class="pagination-list">
      <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
      <?php foreach($pages as $page) : ?>
      <li class="pagination-item <?php if ($page_cur == $page) print('pagination-item-active'); ?>"><a href="index.php?page=<?=$page;?>"><?=$page; ?></a></li>
      <?php endforeach; ?>
      <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
    </ul>