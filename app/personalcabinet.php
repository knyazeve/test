<?php
	if($_SESSION['role'] !== 'admin' and $_SESSION['role'] !== 'user'){
		header('Location: index.php?id=noaccess');
		exit;
	}
?>
<h3>Здесь должен быть личный кабинет</h3>
<li><a href='index.php'>Выход из кабинета</a></li>
		
		