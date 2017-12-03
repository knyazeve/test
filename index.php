<? 
  define('PATCH_APP', 'app/');
	session_start();
	ob_start();
  
	require PATCH_APP."lib.php";
	require PATCH_APP."db.php";
	
	$result = array();
	
	include PATCH_APP.'template.php';
  
  ob_end_flush();