<header class="header">
    <a href="index.php" class="logo">Village Connect</a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        <span>
<?php

    if(loggedin())
        echo $_SESSION['name'];
    else
        echo 'Guest';

?>
                            <i class="caret"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">Account</li>
                        <li>
<?php
    if(loggedin())
        echo '<a href="logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>';
    else
        echo '<a href="login.php"><i class="fa fa-ban fa-fw pull-right"></i> Login</a>';
?>
                            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>