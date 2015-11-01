<?php
	require 'inc/func.inc.php';
	require 'inc/connection.inc.php';
?>
<!--

<?php

	echo '<h1>inout</h1><hr>';

	echo '<a href="videos/show.php">Videos</a><br>';
	echo '<a href="message.php">Messages</a><br>';
	
	if(loggedin()){
		echo '<a href="logout.php">Logout</a><br>';	
	} else {
		echo '<a href="login.php">Sign In</a><br>';	
	}

	if(isadmin()){
		echo '<a href="websites/download-website.php">add a Website</a><br>';
	}

	echo '<a href="raise-request.php">Raise a Request</a><br>';

	echo '<hr>';

	$path = "websites/";
	$files = scandir($path);
	$files = array_diff($files, array('..', '.', 'log.file', 'download-website.php'));
	foreach ($files as $file) {
	    echo $file . '<br>';
	}
?>

-->


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
	            	<div class="col-lg-6">
	            		<section class="panel">
                            <header class="panel-heading">Websites</header>
                                	<div class="panel-body" id="noti-box1" style="overflow: hidden; width: auto; height: 400px;">
                                    
<?php
	$query = "SELECT M.message, M.timestamp, U.name FROM messages M INNER JOIN users U ON M.sender_id = U.id WHERE M.reciever_id = 0 ORDER BY M.timestamp DESC LIMIT 10";
	$query_run = mysqli_query($connection, $query);
	while($query_row = mysqli_fetch_assoc($query_run)){
		echo '<div class="alert alert-info">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                ' . $query_row['message'] . '<br>
                <strong>' . $query_row['name'] . '</strong><br>
            </div>';
	}
                                    
?>


                                </div><div class="slimScrollBar" style="width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 5px; z-index: 99; right: 1px; height: 213.333px; background: rgb(0, 0, 0);"></div>
                        </section>
	            	</div>
	            	<div class="col-lg-3">
	            		<section class="panel">
                            <header class="panel-heading">bulletin board</header>
                            	<div class="panel-body" id="noti-box2" style="overflow: hidden; width: auto; height: 400px;">
<?php
	$query = "SELECT M.message, M.timestamp, U.name FROM messages M INNER JOIN users U ON M.sender_id = U.id WHERE M.reciever_id = 0 ORDER BY M.timestamp DESC LIMIT 10";
	$query_run = mysqli_query($connection, $query);
	while($query_row = mysqli_fetch_assoc($query_run)){
		echo '<div class="alert alert-info">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                ' . $query_row['message'] . '<br>
                <strong>' . $query_row['name'] . '</strong> @ <small>' . return_display_time(strtotime($query_row['timestamp'])) . '</small><br>
            </div>';
	}
                                    
?>

                            </div>
                            <div class="slimScrollBar" style="width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 5px; z-index: 99; right: 1px; height: 213.333px; background: rgb(0, 0, 0);"></div>
                        </section>
	            	</div>
	            	<div class="col-lg-3">
	            		<section class="panel">
                            <header class="panel-heading">
                                know more
                            </header>
                        	<div class="panel-body" id="noti-box3" style="overflow: hidden; width: auto; height: 400px;">
<?php
	$query = "SELECT * FROM `requests` ORDER BY `last_updated_tx` DESC LIMIT 10";
	$query_run = mysqli_query($connection, $query);
	while($query_row = mysqli_fetch_assoc($query_run)){
		echo '<div class="alert alert-info">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="fa fa-times"></i>
                </button>
                <strong>' . $query_row['item'] . '</strong><br>
                ' . $query_row['defination'] . '
            </div>';
	}
                                    
?>
                            </div>
                            <div class="slimScrollBar" style="width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 5px; z-index: 99; right: 1px; height: 213.333px; background: rgb(0, 0, 0);"></div>
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