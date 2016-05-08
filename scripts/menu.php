	
	<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); 

  $homePage = $_SERVER['DOCUMENT_ROOT'] . "/2t/3003952369/vsha/index.php";
  $PageRoot = "/2t/3003952369/vsha/";
  $homePage2 = "/2t/3003952369/vsha/index.php";
  ?>
	
	<div class="menu pure-u-lg-2-3 pure-u-1">
          <ul>
            <li><a <?php if ($currentPage == 'index.php') {echo 'id="current-page"';}?> href="http://tsuts.tskoli.is/2t/3003952369/vsha/">Heim</a></li>
          </ul>
      </div>

      <div class="profile pure-u-lg-1-3 pure-u-1">
        
          
          <?php   
          // if session variable not set, redirect to login page
          if (isset($_SESSION['authenticated'])) {
          echo '
          <a href="profile.php">
          <div class="profile-image pure-u-1-2">
          </div>
          </a>

        <div class="profile-username pure-u-1-2">';
        echo '<p>Velkominn, ' . $_SESSION['userFirstName'] . '</p>';
          } ?>

          <?php  if (isset($_SESSION['authenticated'])) {
              echo '<form method="post" action="">
                <input id="logout" name="logout" type="submit" value="Skrá Út">
            </form></div>';
            } ?>
        
      </div>