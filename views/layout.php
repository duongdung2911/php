<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="public/css/my-css.css">
	<link rel="stylesheet" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" href="public/css/font-awesome.min.css">
</head>
<body>
<ul class="nav" style="justify-content: center; margin-top:1em">
		<li class="nav-item">
			<a class="nav-link addPage.php" href="addPage.php">ADD</a>
		</li>
		<li class="nav-item">
			<a class="nav-link listPage" href="listPage.php">List</a>
		</li>
	</ul>
	<?php include($view.'.php'); ?>
</body>
<!-- jQuery -->
<script src="public/js/jquery-3.1.0.min.js"></script>
<script src="public/js/my-js.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="public/js/bootstrap.min.js"></script>
</html>