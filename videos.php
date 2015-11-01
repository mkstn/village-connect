<?php
	require 'inc/func.inc.php';
	$icons_random = array(
		'paperclip',
		'file-o',
	);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include 'layout/meta.inc.php'; ?>

<style>
	video {
	  width: 100%    !important;
	  height: auto   !important;
	}
</style>
</head>

<body class="skin-black">
<?php include 'layout/header.inc.php'; ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
<?php include 'layout/leftpanel.inc.php'; ?>

	    <aside class="right-side">
	        <section class="content">
	            <div class="row" style="margin-bottom:5px;">


<?php

	$path = 'videos';

	if(isset($_GET['v'])){
		$path = 'videos/' . $_GET['v'];
	}

	$files = scandir($path);
	$files = array_diff($files, array('..', '.','show.php'));

	foreach ($files as $file) {
		if(is_dir($path . '/' . $file)){
?>

		<div class="col-md-2">
            <a href="?v=<?php echo $file; ?>">
            	<div class="stat">
	                <div class="stat-icon" style="color:#45cf95;">
	                    <i class="fa fa-<?php echo $icons_random[rand() % count($icons_random)]; ?> fa-3x stat-elem"></i>
	                </div>
	                <h5 class="stat-info"><?php echo $file; ?></h5>
	            </div>
	        </a>
        </div>

<?php
		} else {
?>

			<div class="col-md-4">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls>
						<source src="<?php echo $path . '/' . $file; ?>" type="video/mp4">
					</video>
				</div>
			</div>

<?php
		}
	}
?>

	            </div>
	        </section>
	    </aside>
	</div>

<?php
    include 'layout/scripts.inc.php';
?>
</body>
</html>