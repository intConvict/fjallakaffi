<?php
  require('database.php');
  require('navbar.php');

  $gebruikersnaam = $_SESSION['gebruikersnaam'];

  $sql = "SELECT gebruikers.gebruikersnaam, recepten.gerecht_naam, recepten.foto, recepten.tijd, recepten.gang, recepten.moeilijkheid FROM gebruikers JOIN recepten ON gebruikers.id = recepten.gebruiker_id WHERE gebruikers.gebruikersnaam = '$gebruikersnaam'";
  $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="links/css/index.css">
  <link rel="stylesheet" href="links/css/profileStatus.css">
</head>
<body>
  <div class="profileStatus_wrapper">
    <?php 
    if (mysqli_num_rows($result) > 0) {
      foreach($result as $recept) {
        ?>
        <a href="#">
          <div class="recept_wrapper">
            <div class="img-div" style="background-image: url(<?php if(!empty($recept['foto'])){
              echo $recept['foto'];
            } else {
              echo 'links/images/replacement.png';
            } ?>);">
            </div>
            <div class="naam-div">
              <h6>
                <?php echo $recept['gebruikersnaam'] ?>
              </h6>
            </div>
            <div class="title-div">
              <h2>
                <?php echo $recept['gerecht_naam'] ?>
              </h2>
            </div>
            <div class="tijd-div">
              <h4>
                <?php echo $recept['tijd'] ?>min
              </h4>
            </div>
            <div class="gang-div">
              <h6>
                - <?php echo $recept['gang'] ?>
              </h6>
            </div>
            <div class="diff-div">
              <h6>
                - <?php echo $recept['moeilijkheid'] ?>
              </h6>
            </div>
          </div>
        </a>
        <?php 
          } ?>
          <div class="nieuw-recept_wrapper">
            <a href="makeRecipe.php">
              <h1>
                +maak een nieuw recept aan
              </h1>
            </a>
          </div>
          <?php
    } else { ?>
      <div class="nieuw-recept_wrapper">
        <a href="makeRecipe.php">
          <h1>
            +maak een nieuw recept aan
          </h1>
        </a>
      </div>
    <?php } ?>
  </div>
</body>
</html>
