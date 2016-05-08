<?php
  use classes\Upload;

  session_start();
  // if session variable not set, redirect to login page
  if (!isset($_SESSION['authenticated'])) {
   header('Location: login.php');
   exit;
  }

  include './scripts/title.php';
  include './scripts/logout.php';
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

     <?php
          if (isset($result)) {
          echo '<ul>';
          foreach ($result as $message) {
          echo "<li>$message</li>";
          }
           echo '</ul>';
          }
      ?>

    <header class="pure-g">
      <?php require'scripts/menu.php' ?>
    </header>

    <div class="login-title">
         <h2><?php echo 'Velkominn, ' . $_SESSION['userFirstName']; ?></h2>
    </div>

    <div class="content pure-g">

        <div class="pure-u-1 profile-column-wrap">
            <div class="profile-column-content">
                <a href="add-post.php">
                <h3>Nýr póstur</h3>
                <p>Lorem ipsum dom</p>
               </a>
           </div>
        </div>

        <div class="pure-u-1-2 profile-column-wrap">
            <div class="profile-column-content">
                <a href="edit-profile.php">
                <h3>Aðgangsupplýsingar</h3>
                <p>Lorem ipsum dom</p>
               </a>
           </div>
        </div>

        <div class="pure-u-1-2 profile-column-wrap">
            <div class="profile-column-content">
                <a href="files.php">
                <h3>Skjöl</h3>
                <p>Lorem ipsum dom</p>
               </a>
           </div>
        </div>

    </div>

    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>
