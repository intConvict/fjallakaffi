<?php
include('database.php') ;

if(isset($_POST['submit'])){
  
  $gebruikersnaam = $_POST['gebruikersnaam'];
  $wachtwoord = $_POST['wachtwoord']; 
  
  $sql = "SELECT gebruikersnaam, wachtwoord FROM `gebruikers` WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord';";
  
  $check = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($check);

  if ($num_rows == 0) {
      echo "No results found";
  } else {
    session_start();
    $_SESSION = $_POST;
    mysqli_fetch_assoc($check);
    header('Location: index.php');
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="links/css/signin.css">
  <link rel="stylesheet" href="links/css/index.css">
</head>
<body>
  <div class="signin-wrapper">
    <div class='titleholder'>
      <a href="index.php">
        <h1>fjallakaffi</h1>
        <h3>recipes</h3>
      </a>
    </div>
    <div class='signinholder'>
      <div>
        <h1>
          Sign in :)
        </h1>
      </div>
      <div class="signinholder-formholder">
        <form method="post">
          <br>
          <label for="gebruikersnaam">gebruikersnaam:</label>
          <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
          <br>
          <br>
          <br>
          <label for="wachtwoord">wachtwoord:</label>
          <input type="password" id="wachtwoord" name="wachtwoord" required></input>
          <br>          
          <br>          
          <br>
          <br>
          <input name="submit" class="button" type="submit" value="Sign in">
        </form>
      </div>
    </div>
    <?php $database = include('database.php') ?>
  </div>
  <div class="signup-wrapper">
    <h1>
      Welkom
    </h1>
    <h3>
      heb je nog geen account?
    </h3>
    <h4>
      <a href="signup.php">
        sign up
      </a>
    </h4>
  </div>
</body>
</html>
