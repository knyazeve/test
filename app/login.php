<?php
  if(!$_GET['fl']){
		$_SESSION['role']='';
		$_SESSION['login']='';
		$_SESSION['iduser']='';		
	}
	$result = '';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$login = trim(strip_tags($_POST['login']));
		$password = trim(strip_tags($_POST['password']));
		checkUser($login,$password);
		if($_SESSION['role']!='user' && $_SESSION['role']!='admin')
			$result = 'Неверные или пустые login (и)или пароль';
		else{
			header('Location: index.php');
			exit;
		}

	}
	if($_GET['fl']){
		echo '<h4>Вход выполнен</h4>';
	}else{
		echo '<h3>Вход зарегистрированного пользователя</h3>';
		echo '<p>';
			echo $result;
		echo '</p>';

		include PATCH_APP.'formlogin.php';
	}
