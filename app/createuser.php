<?php

	$result = array();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$newUser['login'] = trim(strip_tags($_POST['login']));
		$password1 = trim(strip_tags($_POST['password1']));
		$password2 = trim(strip_tags($_POST['password2']));
		$newUser['email'] = trim(strip_tags($_POST['email']));
		$newUser['lastname'] = trim(strip_tags($_POST['lastname']));
		$newUser['firstname'] = trim(strip_tags($_POST['firstname']));
		
		if(empty($newUser['login'])) $result[] = 'Поле "Login" не заполнено';
		if(empty($password1)) $result[] = 'Поле "Пароль" не заполнено';
		if(empty($password2)) $result[] = 'Поле "Повторите пароль" не заполнено';
		if(empty($newUser['email'])) $result[] = 'Поле "Email" не заполнено';
		if(empty($newUser['lastname'])) $result[] = 'Поле "Фамилия" не заполнено';
		
		if($password1 == $password2)
			$newUser['password'] = $password1;
		else
			$result[] = 'Пароли не совпадают';
			
		$template = "/.+@.+\..+/i";
		if (!preg_match($template,$newUser['email'])) $result[] = 'Email имеет неправильный формат';
		$template = "/[^(\w)|(\x7F-\xFF)|(\s)]/";
		if(preg_match($template,$newUser['login'])) $result[] = 'Поле "Login" содержит запрещеные символы';
		if(preg_match($template,$newUser['lastname'])) $result[] = 'Поле "Фамилия" содержит запрещеные символы';
		if(preg_match($template,$newUser['firstname'])) $result[] = 'Поле "Имя" содержит запрещеные символы';
			
		$err = checkNewUser($newUser['login'],$newUser['email']);
		
		if($err==1 or $err==3) {
			$result[] = 'Такой логин уже используется';
			$newUser['login'] = '';
		}		
		if($err==2 or $err==3) {
			$result[] = 'Такой email уже используется';
			$newUser['email'] = '';
		}

		if(isset($result) && !count($result)){
			addUser($newUser);
			header('Location: index.php?id=createuser&fl=1');
			exit;
		}
	}
	
	if($_GET[fl]){
		echo '<h4>Поздравляем вы успешно зарегистрированы</h4>';
	}else{	
		echo '<h3>Регистрация нового пользователя</h3>';
		include PATCH_APP.'outputerr.php';
		include PATCH_APP.'formnewuser.php';
	}
?>