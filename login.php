<?php  
  include './scripts/title.php'; 

  session_start();

  $errors = [];

  if (isset($_SESSION['authenticated'])) {
    header("Location: profile.php");
  }

  if (isset($_POST['login'])) {
      $userlogin = trim($_POST['notandi']);
      $passlogin = trim($_POST['lykill']);

      require_once 'connection.php';
      require_once 'classes/Users.php';

      $dbUsers = new Users($conn);
      $status = $dbUsers->validateUser($userlogin,$passlogin);

      if ($status) {
          $user_id = $dbUsers->returnUserID($userlogin);
          $user_info = $dbUsers->getUser($user_id[0]);
          $_SESSION['authenticated'] = 'Login';

          $_SESSION['userID'] = $user_id[0];
          $_SESSION['userFullName'] = $user_info[0] . " " . $user_info[1];
          $_SESSION['userFirstName'] = $user_info[0];
          $_SESSION['userLastName'] = $user_info[1];
          $_SESSION['userEmail'] = $user_info[2];
          $_SESSION['userName'] = $user_info[3];
          $_SESSION['userPassword'] = $user_info[4];
          $_SESSION['userPhone'] = $user_info[5];
          
          header("Location: profile.php");
      }
      else{
          echo "ekki";
      } 

  }

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

    <div class="login-title">
        <h2>Skráðu þig inn</h2>
    </div>

    <div class="login-form">

      <form class="pure-form pure-g" id="login" method="post" action="">

        <fieldset>

            <div class="form-padding pure-u-1-2">
                <div class="form-input">
                  <input type="text" placeholder="Netfang" name="notandi">
                </div>
            </div>
            
            <div class="form-padding pure-u-1-2">
                <div class="form-input">
                  <input type="password" placeholder="Lykilorð" name="lykill" id="pwd">
                </div>
            </div>

            <div class="form-input pure-u-1">
              <ul>
                <li><button name="login" id="login" type="submit" class="form-submit">Login</button></li>
                <li><a class="form-submit" href="#">Nýskrá &uarr;</a></li>
              </ul>

            </div>
            
        </fieldset>

      </form>
    </div
>re
    

    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>