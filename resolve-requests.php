<?php

	require 'inc/connection.inc.php';
	require 'inc/func.inc.php';

	if(!loggedin()){
		header('Location: login.php');
	}

    if(!empty($_POST)){
        if(!empty($_POST['res'])){
            $test = json_decode($_POST['res'], true);
            
            $message_id = (int)$test[0];
            $item = $test[1];
            $defination = $test[2];

            $query = "INSERT INTO `requests` (`item`,`defination`) VALUES ('$item','$defination')";
            mysqli_query($connection, $query);
            delete_message($connection, $message_id);
        } else {
            $message_id = (int)$_POST['rej'];
            delete_message($connection, $message_id);
        }
    }
        // requests

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
                <div class="row">
                  <div class="col-lg-12">
                          <section class="panel">
                              <header class="panel-heading">inbox</header>
                              <div class="panel-body">
                              	<table class="table table-bordered">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>Sender</th>
                                            <th>Message</th>
                                            <th>Defination</th>
                                            <th style="width: 120px">Resolve?</th>
                                            <th style="width: 120px">Reject?</th>
                                        </tr>
<?php

	$reciever_id = (int)($_SESSION['id']);
	$query_fetch = "SELECT M.message, U.name, M.m_id FROM messages M INNER JOIN users U ON M.sender_id = U.id WHERE ((M.reciever_id='$reciever_id' OR M.reciever_id=0) AND M.sender_id != '$reciever_id') AND M.message LIKE 'request%' ORDER BY M.timestamp DESC"; 
	$query_fetch_run = mysqli_query($connection, $query_fetch);

	$i = 0;
	while($query_row = mysqli_fetch_assoc($query_fetch_run)){

        $message = explode('-', trim($query_row['message']));
        unset($message[0]);
        $message = trim(implode('-', $message));

		echo '<tr>
                <td>' . ++$i . '</td>
                <td>' . $query_row['name'] . '</td>
                <td>' . $message . '</td>
                <td>' . duckduckgoreturn($message) . '</td>
                <form method="POST">
                    <td><button value=\'' . json_encode(array($query_row['m_id'],$message, duckduckgoreturn($message))) . '\' type="submit" name="res" class="btn btn-sm btn-success">Resolve</button></td>
                    <td><button value="' . $query_row['m_id'] . '" type="submit" name="rej" class="btn btn-sm btn-danger">Reject</button></td>
                </form>
            </tr>';
	}

?>
                                        
                                    </tbody></table>
                              </div>
                          </section>
                      </div>
                  </div>

                  <?php
    include 'layout/scripts.inc.php';
?>
</body>
</html>