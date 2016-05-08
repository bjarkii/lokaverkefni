<?php  
  include './scripts/title.php'; 
   session_start();

   require_once 'connection.php';
   require_once 'classes/Users.php';

      $dbUsers = new Users($conn);
      $postInfo = $dbUsers->getSinglePost(1);

?>

<!DOCTYPE HTML>
<html>
  <head>
    <title>VEFA3 <?php echo "- {$title}"; ?></title>
    <meta charset="utf-8">
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

    <div class="header-bottom">
      <?php require'scripts/sub-menu.php' ?>
    </div>

    <div class="post-wrap">
        <div class="post-header" style="background-image: url(<?php echo "$postInfo[4]"; ?>)"> 
            <h1><?php echo "$postInfo[1]"; ?></h1>
            <a href="#"><?php echo "$postInfo[3]"; ?></a>
        </div>
        <div class="post-content">
          <p><?php echo "$postInfo[2]"; ?></p>
        </div>
    </div>


    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>