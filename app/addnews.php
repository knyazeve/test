<?
	if($_SESSION['role'] !== 'admin'){
		header('Location: index.php?id=noaccess');
		exit;
	}
  
	$result = array();
	$news = array();
  if(!empty($_GET['id_news'])) $news['id'] = $_GET['id_news'];

	if($_SERVER['REQUEST_METHOD']=='POST'){
    $news['id'] = trim(strip_tags($_POST['id']));
    $news['date'] = trim(strip_tags($_POST['date']));
    $news['source_url'] = trim(strip_tags($_POST['source_url']));
    $news['title'] = trim(strip_tags($_POST['title']));
    $news['description'] = trim(strip_tags($_POST['description']));
    $news['content'] = trim($_POST['content']);
    
    if(empty($news['date'])) $result[] = 'Поле "Дата" не заполнено';
    if(empty($news['title'])) $result[] = 'Поле "Заголовок" не заполнено';
    if(empty($news['content'])) $result[] = 'Поле "Контент" не заполнено';
  
    if(isset($result) && !count($result)){
      if(!empty($news['id'])) updateNews($news);
      else $news['id'] = createNews($news);
    }else{
      include PATCH_APP.'outputerr.php';
    }
  }
  
  if(!empty($news['id'])) $data = getOneNews($news['id']);
  else $data = $news;
  include PATCH_APP.'formeditnews.php';