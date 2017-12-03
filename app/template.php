<!DOCTYPE html>
<html>
	<head>
		<title>ТЕСТ</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="app/style.css" />
	</head>
	<body>

		<div id="header">
      <div class="nav">
        <span><a href='index.php'>Главная</a></span>
      </div>
      <div class="login-panel">
        <? include PATCH_APP.'loginpanel.php';?>	
      </div>
		</div>

		<div id="content">

      <? include PATCH_APP.'routing.php';?>	

		</div>
		<div id="footer">
			<?= date('Y')?>
		</div>
	</body>
</html>