<?php
  use classes\Upload;
  require_once 'connection.php';
  require_once 'classes/Users.php';

  session_start();
  // if session variable not set, redirect to login page
  if (!isset($_SESSION['authenticated'])) {
   header('Location: http://tsuts.tskoli.is/2t/3003952369/vsha/login.php');
   exit;
  }

  include './scripts/title.php';
  include './scripts/logout.php';

    if (isset($_POST['upload'])) {

      $imageName = $_FILES["image"]["name"];
      $imageTitle = $_POST['imageTitle'];
      $imageDesc = $_POST['imageDesc'];


   // define the path to the upload folder
   //$destination = $_SERVER['DOCUMENT_ROOT'] . "/2t/3003952369/vsha/userImg/";
   $destination = $_SERVER['DOCUMENT_ROOT'] . "/skoli/vsha/userImg/";
   require_once 'classes/Upload.php';

   try {
     $dbUsers = new Users($conn);
     $upload = $dbUsers->newImage($imageName[0],$imageTitle,$imageDesc);

      $loader = new Upload($destination);
      $loader->upload(); // Duplicate, false
      $result = $loader->getMessages();
       }

    catch (Exception $e) {
      echo $e->getMessage();
      }
    }
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

    <div class="content">
        <div class="profile-column-wrap pure-g">

          <div class="pure-u-1-2 profile-column-wrap">
            <div class="profile-column-content">
              <form action="" method="post" enctype="multipart/form-data">
                <p>
                    <label for="image">Upload image:</label>
                    <!-- Við þurfum að vísa í superglobal array $_FILES til að nálgast    skráarupplýsingar og skrá -->
                    <input type="file" name="image[]" id="image" multiple>
                    <input type="text" name="imageTitle" placeholder="Image Title" required>
                    <input type="text" name="imageDesc" placeholder="Image Desc" required>
                </p>
                <p>
                  <input type="submit" name="upload" id="upload" value="Upload">
                </p>
              </form>
            </div>
          </div>

           <div class="pure-u-1-2 profile-column-wrap">
               <div class="profile-column-content">
                 <form method="post" action="edit-pic.php">
                   <select name="editPic" id="pix">
                     <option value="">Select an image</option>
                     <?php
                       $files = new FilesystemIterator('userImg');
                       $images = new RegexIterator($files, '/\.(?:jpg|png|gif)$/i');
                       foreach ($images as $image) {
                       $filename = $image->getFilename();
                     ?>
                     <option value="<?= $filename; ?>"><?= $filename; ?></option>
                     <?php } ?>
                   </select>
                   <input type="submit" name="editImg" id="editImg" value="Edit">
                 </form>
              </div>
           </div>

           <div class="pure-u-1">
             <div class="profile-column-content pure-g">
                   <?php
                     $files = new FilesystemIterator('userImg');
                     $images = new RegexIterator($files, '/\.(?:jpg|png|gif)$/i');
                     foreach ($images as $image) {
                     $filename = $image->getFilename();
                   ?>
                   <div class="pure-u-1-3 user-imgs">
                   <img src="userImg/<?=$filename;?>">
                   </div>
                   <?php } ?>
            </div>
           </div>

    </div>
    </div>


    <footer>
      <?php require'scripts/footer.php' ?>
    </footer>

  </body>
