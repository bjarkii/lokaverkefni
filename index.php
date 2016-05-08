<?php  
  include './scripts/title.php'; 
   session_start();

   require_once 'connection.php';
   require_once 'classes/Users.php';

      $dbUsers = new Users($conn);
      $postCount = $dbUsers->getPostCount();
      $allPostsInfo = $dbUsers->getAllPosts();

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



    <div class="slider" style="background-image: url(<?php print_r($slider_picture[rand(0, 3)])?>)">
        <div class="slider-title">
          <h1>Titill</h1>
          <h3>Einhverjar upplýsingar</h3>
        </div>
    </div>

    <div class="content pure-g">
      <div class="feed pure-u-2-3">
          <?php   

            for ($i=0; $i < $postCount[0]; $i++) { 
              echo '<div class="home-post-wrap">';
              echo '<div class="home-post-img" style="background-image: url(' . $allPostsInfo[$i][4] . ')">';
              echo '</div>';
              echo '<div class="home-post-desc">';
              echo "<h3>" . $allPostsInfo[$i][1] . "</h3>";
              echo "<p>" . $allPostsInfo[$i][2] . "</p>";
              echo '<a href="#">Skoða nánar...</a>';
              echo '</div>';
              echo '</div>';
            }

           ?>

      </div>

      <div class="sidebar pure-u-1-3">
        <div class="sidebar-content">
            <h3>Sidebar</h3>
        </div>
      </div>
      
    </div>

    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>