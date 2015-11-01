<?php
require_once 'inc/func.inc.php';
require_once 'inc/connection.inc.php';

$error_message = array(
	"Entered Passwords do not match",
	"Username cannot have white spaces",
	"Username Already Taken",
	"Successfully Register. Now Please Login To Proceed", //success case
);

if(loggedin())
	header('Location: index.php');

if(isset($_POST['submit'])){
	$name 		= strtolower(strip_tags($_POST['name']));
	$username 	= strip_tags($_POST['username']);
	$pass 		= md5(strip_tags($_POST['pass']));
	$conf_pass 	= md5(strip_tags($_POST['confpass']));
	
	if($conf_pass != $pass){
		$error = 0;
	} elseif(preg_match('/\s/',$username)){
		$error = 1;
	} else {
		$query = "SELECT `id` FROM `users` WHERE `username`='$username'";
		if(mysqli_num_rows(mysqli_query($connection, $query)) > 0 ){
			$error = 2;
		} else {
			$query = "INSERT INTO `users` (`username`,`password`,`name`) VALUES ('$username','$pass','$name')";
			mysqli_query($connection, $query);
			$error = 3;
			header('Location: login.php?signup=true');
		}
	}
}
?>
	<div class="container">
<?php 
	if(isset($error)){
		echo $error_message[$error];
		echo '<br>';
	}
?>	
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <form id="login-form" method="POST">
                    <h1>sign up</h1>
                    <div class="form-group">
                        <label>Name *</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter Your Name" required>
                    </div>
                    <div class="form-group">
                        <label>Username *</label>
                        <input name="username" type="text" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input name="pass" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Re-enter Password *</label>
                        <input name="confpass" type="password" class="form-control" placeholder="ReEnter Password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-warning btn-lg">Sign Up</button>
                </form>
            </div>
        </div>
    </div>