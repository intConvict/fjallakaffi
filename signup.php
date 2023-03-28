<?php
$database = include('database.php');

if(isset($_POST['submit'])){

  //set session array
  session_start();
  if (isset($_POST) && !empty($_POST)) {
    $_SESSION = $_POST;
  }

  //get post array ready for use
  $voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
  $achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
  $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
  $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  //check if user available
  $check_availability = "SELECT gebruikersnaam, wachtwoord FROM `gebruikers` WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord';";
  
  $sql = "INSERT INTO gebruikers(voornaam, achternaam, gebruikersnaam, wachtwoord, email ) VALUES ('$voornaam', '$achternaam', '$gebruikersnaam', '$wachtwoord', '$email')";
  
  mysqli_query($conn, $sql);

  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="links/css/signup.css">
  <link rel="stylesheet" href="links/css/index.css">
</head>
<body>
  <div class="signup-wrapper">
    <div class='titleholder'>
      <a href="index.php">
        <h1>fjallakaffi</h1>
        <h3>recipes</h3>
      </a>
    </div>
    <div class='signupholder'>
      <div>
        <h1>
          Sign up :)
        </h1>
      </div>
      <div class="signupholder-formholder">
        <form method="post">
          <br>
          <label for="voornaam">voornaam:</label>
          <input type="text" id="voornaam" name="voornaam" required>
          <br>
          <br>
          <br>
          <label for="achternaam">achternaam:</label>
          <input type="text" id="achternaam" name="achternaam" required>
          <br>
          <br>
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
          <label for="email">email:</label>
          <input type="email" id="email" name="email" required></input>
          <br>          
          <br>          
          <br>
          <br>
          <input name="submit" class="button" type="submit" value="Sign up">
        </form>
      </div>
    </div>
  </div>
  <div class="signin-wrapper">
    <h1>
      Welkom
    </h1>
    <h3>
      heb je al een account?
    </h3>
    <h4>
      <a href="signin.php">
        sign in
      </a>
    </h4>
  </div>
</body>
</html>
