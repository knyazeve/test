<?php
	$id = array();
	if(isset($_GET['id_news'])){
		$id = $_GET['id_news'];
		deleteNews($id);
		header('Location: index.php');
		exit;
	}
