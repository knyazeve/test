<?php	
	// header('Content-type: text/html; charset=utf-8');
	define(DB_HOST,'localhost');
	define(DB_LOGIN,'root');
	define(DB_PASSWORD,'');
	define(DB_NAME,'test');
	// define(ADMIN_MAIL,'admin@mysite.local');
	
	$link = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
	
	if(!$link) echo "Не получилось подключиться к БД";
	