<?php
/**
 * @Author: Prabhakar Gupta
 * @Date:   2016-02-16 01:57:09
 * @Last Modified by:   Prabhakar Gupta
 * @Last Modified time: 2016-02-20 07:27:08
 */

	require_once 'inc/connection.inc.php';
	require_once 'inc/func.inc.php';

	if(!isadmin()){
		header('Location: index.php');
	}

	if(!empty($_POST)){
		if(!empty($_POST['res'])){
			$request_array = json_decode($_POST['res'], true);

			$message_id = (int)$request_array[0];
			$item = $request_array[1];
			$defination = $request_array[2];

			$query = "INSERT INTO `requests` (`item`,`defination`) VALUES ('$item','$defination')";
			mysqli_query($connection, $query);
		} else {
			$message_id = (int)$_POST['rej'];
		}
		
		/**
		 * soft delete request from requests table
		 */
		delete_request($connection, $message_id);
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
				<div class="row">
					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading">inbox</header>
							<div class="panel-body">
								<table class="table table-bordered">
									<tbody>
										<tr>
											<th style="width: 10px">#</th>
											<th>Sender</th>
											<th>Message</th>
											<th>Defination</th>
											<th style="width: 120px">Resolve?</th>
											<th style="width: 120px">Reject?</th>
										</tr>
<?php

	$query_fetch = "SELECT R.request, U.name, R.requests_raised_id FROM requests_raised R INNER JOIN users U ON R.sender_id = U.id WHERE R.status = 0 ORDER BY R.timestamp DESC"; 
	$query_fetch_run = mysqli_query($connection, $query_fetch);

	$i = 0;
	while($query_row = mysqli_fetch_assoc($query_fetch_run)){
		$request_text = clean_string($query_row['request']);
		
		/**
		 * this is to check if duckduckgo API is giving any definition or not
		 * if it fails to provide any definition, it would automically be
		 * soft deltetd.
		 */
		if(duckduckgoreturn($request_text) == null){
			delete_request($connection, $query_row['requests_raised_id']);
		} else {
			echo '<tr>
					<td>' . ++$i . '</td>
					<td>' . $query_row['name'] . '</td>
					<td>' . $request_text . '</td>
					<td>' . duckduckgoreturn($request_text) . '</td>
					<form method="POST">
						<td><button value=\'' . json_encode(array($query_row['requests_raised_id'],$request_text, duckduckgoreturn($request_text))) . '\' type="submit" name="res" class="btn btn-sm btn-success">Resolve</button></td>
						<td><button value="' . $query_row['requests_raised_id'] . '" type="submit" name="rej" class="btn btn-sm btn-danger">Reject</button></td>
					</form>
				</tr>';
		}
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
