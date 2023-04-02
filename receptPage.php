<?php 
  require('database.php');
  $gerecht = $_GET['gerecht'];

  $sql = "SELECT * FROM recepten JOIN gebruikers ON recepten.gebruiker_id = gebruikers.id WHERE gerecht_naam = '$gerecht'";
  $result = mysqli_query($conn, $sql);
  $gerecht_result = mysqli_fetch_assoc($result);
  ?>

<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="links/css/index.css">
  <link rel="stylesheet" href="links/css/receptPage.css">
  <title>Document</title>
 </head>
 <body>
  <?php require('navbar.php') ?>
  <div class="wrapper">
    <img src="<?php echo $gerecht_result['foto'] ?>" alt="what?">
    <div>
      <h1>
        <?php echo $gerecht_result['gerecht_naam'] ?>
      </h1>
      <h3>
        by <?php echo $gerecht_result['gebruikersnaam'] ?>
      </h3>
      <h4>
        <?php echo $gerecht_result['tijd'] ?>min
      </h4>
      <h4>
        <?php echo $gerecht_result['gang'] ?>
      </h4>
      <h4>
        <?php echo $gerecht_result['moeilijkheid'] ?>
      </h4>
      <p>
        <br><?php echo $gerecht_result['ingredienten'] ?>
      </p>
      <p>
        <br><?php echo $gerecht_result['instructie'] ?>
      </p>
    </div>
  </div>
 </body>
 </html>
