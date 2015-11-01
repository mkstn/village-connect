<?php

require_once 'inc/func.inc.php';
require_once 'inc/connection.inc.php';

$error_message = array(
	"Invalid Username - Password Combination",
);

if(!isadmin())
	header('Location: index.php');

if(isset($_POST['submit'])){
	$username = strip_tags($_POST['username']);
	$password = md5(strip_tags($_POST['pass']));	
	
	$query = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password' LIMIT 1";
	
	if(mysqli_num_rows(mysqli_query($connection, $query)) == 0 ){
		$error = 0;
	} else {
		$query_row = mysqli_fetch_assoc(mysqli_query($connection, $query));

		$_SESSION['id'] = $query_row['id'];
		$_SESSION['username'] = $query_row['username'];
		$_SESSION['name'] = $query_row['name'];
		
		if($http_referer)
			header('Location: '.$http_referer);
		else
			header('Location: index.php');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include 'layout/meta.inc.php'; ?>
</head>
<body class="skin-black">
<?php include 'layout/header.inc.php'; ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
<?php include 'layout/leftpanel.inc.php'; ?>

	    <aside class="right-side">
	        <section class="content">
	            <div class="row" style="margin-bottom:5px;">
<?php 
	if(isset($error)){
		echo $error_message[$error];
	}
?>	
            <div class="col-lg-8 col-lg-offset-2">
            	<section class="panel">
            		<header class="panel-heading">Add a website</header>
            		<div class="panel-body">
		                <form action="websites/download-website.php" method="POST">
		                    <div class="form-group">
		                        <label>Website</label><input name="website_url" type="text" class="form-control input-lg" placeholder="Enter URL" required>
		                    </div>
		                    <button type="submit" name="download_website" class="btn btn-success btn-lg">Add website</button>
		                </form>
		            </div>
            </section>
            </div>
        </div>
    </div>
<?php
    include 'layout/scripts.inc.php';
?>
</body>
</html>