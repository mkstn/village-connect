<?php
/**
 * @Author: Prabhakar Gupta
 * @Date:   2016-02-20 06:26:59
 * @Last Modified by:   Prabhakar Gupta
 * @Last Modified time: 2016-02-20 06:33:27
 */

	require_once 'inc/connection.inc.php';
	require_once 'inc/func.inc.php';

	if(!loggedin()){
		header('Location: login.php');
	}

	if(isset($_POST['reciever'])){
		$message = clean_string($_POST['message']);
		$sender_id = (int)($_SESSION['id']);
		$reciever_id = (int)$_POST['reciever'];

		$query = "INSERT INTO `messages` (`sender_id`,`reciever_id`,`message`) VALUES ('$sender_id','$reciever_id','$message')";
		if(mysqli_query($connection, $query)){
			$error = 0;
		} else {
			$error = 1;
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

    $color = array(
        'success',
        'danger',
    );

    $error_messages = array(
        'Message <strong>successfully</strong> sent!',
        '<strong>Error</strong> in sending message',
    );

  if(isset($error))
    echo'
            <div class="alert alert-' . $color[$error] . ' ">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                ' . $error_messages[$error] . '
            </div>';
?>
						<section class="panel">
							<header class="panel-heading">Send a message / raise a request</header>
							<div class="panel-body">
								<form role="form" method="POST">
									<div class="form-group">
										<label for="exampleInputEmail1">Reciever ID</label>
										<input name="reciever" class="form-control" type="text" required>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Message</label>
										<textarea name="message" required class="form-control"></textarea>
									</div>
									<button type="submit" class="btn btn-info">Submit</button>
								</form>
							</div>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">inbox</header>
							<div class="panel-body">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<th style="width: 10px">#</th>
											<th>Sender <small>(Sender ID)</small></th>
											<th>Message</th>
											<th style="width: 120px">Time</th>
										</tr>
<?php

	$reciever_id = (int)($_SESSION['id']);
	$query_fetch = "SELECT U.id, M.message, M.timestamp, U.name FROM messages M INNER JOIN users U ON M.sender_id = U.id WHERE ((M.reciever_id='$reciever_id' OR M.reciever_id=0) AND M.sender_id != '$reciever_id') AND M.message NOT LIKE 'request%' ORDER BY M.timestamp DESC"; 
	$query_fetch_run = mysqli_query($connection, $query_fetch);

	/**
	 * used to show count of messages to the user
	 * @var integer
	 */
	$i = 0;
	while($query_row = mysqli_fetch_assoc($query_fetch_run)){
	echo '<tr>
	        <td>' . ++$i . '</td>
	        <td>' . $query_row['name'] . ' <small>(' . $query_row['id'] . ')</small></td>
	        <td>' . $query_row['message'] . '</td>
	        <td>' . return_display_time(strtotime($query_row['timestamp'])) . '</td>
	    </tr>';
	}

?>
                                        
									</tbody>
								</table>
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