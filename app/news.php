<?$news = getNews();?>
<? foreach ($news as $item): ?>
  <div class="news-block">
  <?if($_SESSION['role'] === 'admin'):?>
    <span class="admin-icon">
      <a href="index.php?id=addnews&id_news=<?= $item['id']; ?>" class="greyText">Редактировать</a>
      <a href="index.php?id=deletenews&id_news=<?= $item['id']; ?>" class="greyText">Удалить</a>
    </span>
  <?endif;?>
    <br/><span class="date"><?= $item['date']; ?></span>
    <span><a href="<?= $item['source_url']; ?>" target="_blank" class="greyText">Источник</a></span>
    <a href="index.php?id=newsdetail&id_news=<?= $item['id']; ?>">
      <img src="<?= $item['icon']; ?>" alt="" border="0" width="100%"/><?= $item['title']; ?>
    </a><br/>
  </div>
<? endforeach; ?>
