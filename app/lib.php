<?php
	// Выборка новостей
	function getNews(){
		global $link;
		$sql = "SELECT id,title,icon,date
						FROM news";
		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = resultArray($result);
		mysqli_free_result($result);
		return $items;
	}
  
	// Выборка 1 новости
	function getOneNews($id){
		global $link;
		$sql = "SELECT *
						FROM news
            WHERE id = '$id'";
		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = result2Array($result);
		mysqli_free_result($result);
		return $items;
	}
  
  //создание новости 
  function createNews($news){
		global $link;
		$sql = 'INSERT INTO news (date,
                               source_url,
                               title,
                               description,
                               content)
						VALUES (?,?,?,?,?)';
		if(!$stmt = mysqli_prepare($link,$sql)){
			return '';
		}
		mysqli_stmt_bind_param($stmt,"sssss",$news['date'],
																				$news['source_url'],
																				$news['title'],
																				$news['description'],
																				$news['content']);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return mysqli_insert_id($link);		
	}
  
  //обновление новости 
  function updateNews($news){
 		global $link;
		$sql = "UPDATE news
						SET date='{$news['date']}',
								source_url='{$news['source_url']}',
								title='{$news['title']}',
								description='{$news['description']}',
								content='{$news['content']}'
					WHERE id='{$news['id']}'";
		if(!$result = mysqli_query($link, $sql))
			return '';
		return $news['id'];
	}
  
	// Новый пользователь
	function addUser($d){
		global $link;
		$role = 'user';
		$sql = 'INSERT INTO users (login,
															 password,
															 email,
															 lastname,
															 firstname,
                               role)
						VALUES (?,?,?,?,?,?)';
		$dt = time();
		if(!$stmt = mysqli_prepare($link,$sql)){	
			return false;
		}
		mysqli_stmt_bind_param($stmt,"ssssss",$d['login'],
																				$d['password'],
																				$d['email'],
																				$d['lastname'],
																				$d['firstname'],
                                        $role);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return true;		
		
	}

	//Удаление новости
	function deleteNews($id){
		global $link;
		$sql = "DELETE FROM news
						WHERE id='{$id}'";
		if(!$result = mysqli_query($link, $sql))
			return false;
		return true;
	}
  
	// поиск логина и емейла при регистрации
	function checkNewUser($login,$email){
		global $link;
		$i=0;
		$sql = "SELECT login
						FROM users
						WHERE login = '$login'";
		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = result2Array($result);
		mysqli_free_result($result);
		if(!empty($items)){$i+=1;}

		$sql = "SELECT email
						FROM users
						WHERE email = '$email'";
		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = result2Array($result);
		mysqli_free_result($result);
		if(!empty($items)){$i+=2;}
		
		return $i;
	}

	// Обработка результатов запроса выход массив
	function result2Array($data){
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return $arr=$arr[0];
	}
	
	// Обработка результатов запроса выход массив[массив]
	function resultArray($data){
		$arr = array();
		while($row = mysqli_fetch_assoc($data)){
			$arr[] = $row;
		}
		return $arr;
	}

	// поиск пользователя
	function checkUser($login,$pas){
		global $link;

		$sql = "SELECT id,login,password,role
						FROM users
						WHERE login = '$login' AND password = '$pas' ";
		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = result2Array($result);
		mysqli_free_result($result);
		if(!empty($items)){
			$_SESSION['role'] = $items['role'];
			$_SESSION['login'] = $items['login'];
			$_SESSION['iduser'] = $items['id'];
		}	
	}
	