<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
            <li><a href="message.php"><i class="fa fa-gavel"></i> <span>Messages</span></a></li>
            <li><a href="videos.php"><i class="fa fa-globe"></i> <span>Video</span></a></li>
            <li><ul>
<?php

    $path = 'videos';
            $files = scandir($path);
    $files = array_diff($files, array('..', '.','show.php'));

    foreach ($files as $file) {
        if(is_dir($path . '/' . $file)){
?>

            <li><a href="videos.php?v=<?php echo $file; ?>"><?php echo $file; ?></a></li>

<?php
        }
    }
?>
        </ul></li>
<?php
    if(!isadmin()){
        echo '<li><a href="raise-request.php"><i class="fa fa-globe"></i> <span>Raise a Request</span></a></li>';
    } else {
        echo '<li><a href="resolve-requests.php"><i class="fa fa-globe"></i> <span>Resolve Requests</span></a></li>';
        echo '<li><a href="add-website.php"><i class="fa fa-leaf"></i> <span>Add a website</span></a></li>';
    }


    if(loggedin()){
        echo '<li><a href="logout.php"><i class="fa fa-cogs"></i> <span>Logout</span></a></li>';
    } else {
        echo '<li><a href="login.php"><i class="fa fa-cogs"></i> <span>Sign In</span></a></li>';
    }


?>
        </ul>
    </section>
</aside>