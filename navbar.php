<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="links/css/navbar.css">
</head>
<body>
  <header class='navbar_wrapper'>
    <div class='navbar_wrapper-titleholder'>
      <a href="index.php">
        <h1>fjallakaffi</h1>
        <h3>recipes</h3>
      </a>
    </div>
    <?php if(empty($_SESSION['gebruikersnaam'])){?>
      <div class='navbar_wrapper-accountholder'>
        <a href="signin.php">
          <h3>
            sign in
          </h3>
        </a>
        <a href="signup.php">
          <h3>
            sign up
          </h3>
        </a>
      </div>
    <?php }else{?>
      <div class='navbar_wrapper-accountholder'>
        <a href="profile.php">
          <h3>
            <?php 
            echo $_SESSION['gebruikersnaam'];
            ?>
          </h3>
        </a>
        <a href="clearSession.php">
          <h3>
            logout
          </h3>
        </a>
      </div>
    <?php }?>
  </header>
</body>
</html>
