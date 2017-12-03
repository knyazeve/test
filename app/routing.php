<?php
$id = strtolower(strip_tags(trim($_GET['id'])));
if ($id == ''){
  include PATCH_APP.'news.php';
}else{
  include PATCH_APP.$id.'.php';
}