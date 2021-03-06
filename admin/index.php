<?php
 
session_start();
include 'view/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Gravilib - Booking Book Online</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" type="text/css" href="public/css/semantic.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/app.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/semantic.min.js"></script>
    <script src="public/js/following-header.js"></script>
    <script src="public/js/banner-carousel.js"></script>
    <script src="public/js/date.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</head>

<body>
    <div class="pusher">
    
        <?php 
        if(isset($_SESSION['login_user_admin'])){
        	include 'view/layout/header-login.php';
		    
		}else {
			include 'view/layout/header.php';
		}
        ?>
    <div id="index">

        <?php
        include 'view/layout/sidebar.php';
        ?>
    <div class="twelve wide column">
        <?php 
        $pages_dir = 'view';
        if (!empty($_GET['p'])){
            $pages = scandir($pages_dir, 0);
            unset($pages[0], $pages[1]);
 
            $p = $_GET['p'];
            
            // if(in_array($p.'.php', $pages)){
                include($pages_dir.'/'.$p.'.php');
            // } else {
                // echo 'Halaman '.$pages_dir.'/'.$p.'.php'.' tidak ditemukan! :(';
            // }
        }
        else {
            include($pages_dir.'/content-home.php');
        }
        ?>
        </div>
        </div>
        </div>
    
    
    
    <?php include 'view/layout/footer.php'; ?>


</body>
<?php mysql_close($connection); ?>

</html>