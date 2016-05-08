<?php
include './scripts/title.php';

session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
 header('Location: http://tsuts.tskoli.is/2t/3003952369/vsha/login.php');
 exit;
}

  $imageName = $_POST['editPic'];
  echo "$imageName";

  require_once 'connection.php';
  require_once 'classes/Users.php';

  $dbUsers = new Users($conn);
  $imgID = $dbUsers->getImgID($imageName);

  print_r($imgID);

?>


<!DOCTYPE HTML>
<html>
  <head>
    <title>VEFA3 <?php echo "- {$title}"; ?></title>
    <meta charset="utf-8">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <!-- TABS -->
    <script src="scripts/tabs.js"></script>
    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700' rel='stylesheet' type='text/css'>
    <!-- PURE CSS -->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->
    <!-- STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="styles.css">


  </head>

  <body>
    <?php
      include './scripts/slider.php';
     ?>

    <header class="pure-g">
      <?php require'scripts/menu.php' ?>
    </header>

    <div class="content">

    </div>


    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>
