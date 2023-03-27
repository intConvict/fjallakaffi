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
          Sign in :)
        </h1>
      </div>
      <div class="signupholder-formholder">
      </div>
    </div>
    <?php $database = include('database.php') ?>
  </div>
  <div class="signin-wrapper">
  </div>
</body>
</html>

<?php
if(isset($_POST['submit'])){
  $voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
  $achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
  $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
  $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $sql = "INSERT INTO gebruikers(voornaam, achternaam, gebruikersnaam, wachtwoord, email ) VALUES ('$voornaam', '$achternaam', '$gebruikersnaam', '$wachtwoord', '$email')";
  header('Location: index.php');

  mysqli_query($conn, $sql);
}

?>