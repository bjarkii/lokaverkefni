<?php      
  use classes\Upload;
  
  session_start();
  // if session variable not set, redirect to login page
  if (!isset($_SESSION['authenticated'])) {
   header('Location: http://tsuts.tskoli.is/2t/3003952369/vsha/login.php');
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

<form class="pure-form pure-g" method="post" action="">
    <div class="content"> 
        <div class="profile-column-wrap pure-g">

            <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Fornafn</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userFirstName']; ?>">
           </div>

           <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Eftirnafn</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userLastName']; ?>">
           </div>

           <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Netfang</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userEmail']; ?>">
           </div>

           <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Notendanafn</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userName']; ?>">
           </div>

            <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Lykilorð</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userPassword']; ?>">
           </div>

           <div class="profile-column-content pure-u-md-1-3 pure-u-1"> 
                <p>Símanúmer</p> 
                <input type="text" name="fornafn" value="<?php  echo $_SESSION['userPhone']; ?>">
           </div>


        </div>

        <div class="pure-u-1 profile-column-wrap">
            <div class="profile-column-content">

                <button name="editprofile" id="editprofile" type="submit" class="form-submit">Nýskrá</button>
           </div>
        </div>

        
        </form>

    </div>

    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>