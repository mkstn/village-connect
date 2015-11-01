<?php

	require 'inc/connection.inc.php';
	require 'inc/func.inc.php';

	if(isset($_POST['message'])){
		$message = 'request - ' . trim($_POST['message']);
		
		if(loggedin())
			$sender_id = (int)($_SESSION['id']);
		else
			$sender_id = 0;
		
		$reciever_id = 1;

		$query = "INSERT INTO `messages` (`sender_id`,`reciever_id`,`message`) VALUES ('$sender_id','$reciever_id','$message')";
		if(mysqli_query($connection, $query)){
			echo "success";
		} else {
			echo 'failure';
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
	            	<hr>
					<div class="col-lg-8 col-lg-offset-2">
						<section class="panel">
							<header class="panel-heading">Raise a Request</header>
							<div class="panel-body">
								<form method="POST" role="form">
									<div class="form-group">
										<label>Request Message</label>
										<textarea name="message" rows="3" class="form-control" placeholder="Enter here..."></textarea>
									</div>
									<button type="submit" class="btn btn-info">Submit</button>
								</form>
							</div>
						</section>
					</div>
				</div>
            </section>
        </aside>
    </div>
<?php
    include 'layout/scripts.inc.php';
?>
</body>
</html>