<? if((empty($_SESSION['login']))||($id=='input')):?>
  <span><a href='index.php?id=login'>Войти</a></span>
  <span> или </span>
  <span><a href='index.php?id=createuser'>Зарегистрироваться</a></span>
<?else:?>
  <?if($_SESSION['role'] === 'admin'):?>
    <span><a href='index.php?id=addnews'> Добавить новость </a></span>
  <?endif; ?>
  <span><a href='index.php?id=personalcabinet&fl=1'><?=$_SESSION['login'];?></a></span>
  <span><a href='index.php?id=logout'>  Выход</a></span>
<?endif; ?>