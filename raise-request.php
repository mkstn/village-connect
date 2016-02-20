<?php
/**
 * @Author: Prabhakar Gupta
 * @Date:   2016-02-16 01:57:09
 * @Last Modified by:   Prabhakar Gupta
 * @Last Modified time: 2016-02-20 07:02:59
 */

	require_once 'inc/connection.inc.php';
	require_once 'inc/func.inc.php';

	if(isset($_POST['request'])){
		$request = clean_string($_POST['request']);
		
		/**
		 * to check if the request is made by some
		 * logged in user or if it is anonymous
		 */
		if(loggedin()){
			$sender_id = (int)($_SESSION['id']);
		} else {
			$sender_id = 0;	
		}

		$query = "INSERT INTO `requests_raised` (`sender_id`,`request`) VALUES ('$sender_id','$request')";
		if(mysqli_query($connection, $query)){
			$error = false;
			$error_message = "Request has been successfully logged";
		} else {
			$error = true;

			if(stripos(mysqli_error($connection), 'duplicate') == FALSE){
				$duplicate_flag = true;	
				$error_message = "This request has already been raised earlier, either resolved else it would be resolved soon!";
			} else {
				$duplicate_flag = false;
				$error_message = "Some technical glitch, try again later!";
			}
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
<?php

	include 'layout/meta.inc.php';

?>
</head>
<body class="skin-black">
<?php

	include 'layout/header.inc.php';

?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
<?php
	
	include 'layout/leftpanel.inc.php';

?>
	    <aside class="right-side">
	        <section class="content">
	            <div class="row" style="margin-bottom:5px;">
					<div class="col-lg-8 col-lg-offset-2">
<?php

	if(isset($error)){
		$panel_color = ($error) ? 'danger' : 'success';
		echo '<div class="alert alert-' . $panel_color . '">
			<button data-dismiss="alert" class="close close-sm" type="button">
			<i class="fa fa-times"></i>
			</button>' . $error_message . '
		</div>';
	}
?>
						<section class="panel">
							<header class="panel-heading">Raise a Request</header>
							<div class="panel-body">
								<form method="POST" role="form">
									<div class="form-group">
										<label>Request Message <small>(eg.- agriculture)</small></label>
										<textarea name="request" rows="3" class="form-control" placeholder="Enter your request message here..."></textarea>
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