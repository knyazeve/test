<?if (!empty($_GET['id_news'])) $news = getOneNews(trim(strip_tags($_GET['id_news'])));?>
<?if (!empty($news)):?>
<div class="news-block-detail">
  <div>
    <span class="date"><?= $news['date']; ?></span>
    <span><a href="<?= $news['source_url']; ?>" target="_blank" class="greyText">Источник</a></span>
  </div>
  <div class="title"><h2><?= $news['title']; ?></h2></div>
  <div class="description"><h4><?= $news['description']; ?></h4></div>
  <div class="content"><?= $news['content']; ?></div>
</div>
<?else:?>
<h3>Новость не найдена</h3>
<?endif;?>