<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">

<link rel="stylesheet" href="../assests/css/bootstrap.min.css">

<script src="../assests/js/jquery.js"></script>
<script src="../assests/js/bootstrap.min.js"></script>

<title>InOut - Team R | Videos</title>

<link rel="shortcut icon" href="../assests/icon/JYBjRZ5C_400x400.png">

<style>
video {
  width: 100%    !important;
  height: auto   !important;
}
</style>

</head>
<body>

<nav class="navbar navbar-default navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="../index.php">InOut - Team R</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
<?php
	if(isset($_GET['v']))
		echo '<li><a href="show.php">Back</a></li>';
?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

	<div class="container">
		<div class="row">
<?php

	$path = "videos/";

	if(isset($_GET['v'])){
		$path = $_GET['v'];
	}

	$files = scandir($path);
	$files = array_diff($files, array('..', '.','show.php'));

	foreach ($files as $file) {
		if(is_dir($file))
			echo '<a href="?v=' . $file . '">' . $file . '</a>';
		else {
?>
			<div class="col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls>
						<source src="<?php echo $path . '/' . $file; ?>" type="video/mp4">
					</video>
				</div>
			</div>
<?php
		}
	}
?>
		</div>
	</div>

</body>
</html>