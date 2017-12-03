<? 
	// id не зарегестрированного пользователя = 1
  define('PATCH_APP', 'app/');
	session_start();
	ob_start();
  
	require PATCH_APP."lib.php";
	require PATCH_APP."db.php";

	unset($_SESSION['msg']);
	if(empty($_SESSION['iduser'])){
		$_SESSION['iduser'] = '1';
		$_SESSION['login'] = '';
	}
	
	$result = array();
	
	include PATCH_APP.'template.php';
  
  ob_end_flush();