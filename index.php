<?php
  require('database.php');

  $gebruikersnaam = $_SESSION['gebruikersnaam'];

  $sql = "SELECT gebruikers.gebruikersnaam, recepten.gerecht_naam, recepten.foto, recepten.tijd, recepten.gang, recepten.moeilijkheid FROM gebruikers JOIN recepten ON gebruikers.id = recepten.gebruiker_id";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);
  $num_rows_amount;
  if($num_rows <= 1){
    $num_rows_amount = '';
  } else {
    $num_rows_amount = 's';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="links/css/index.css">
</head>
<body>
  <div class="num_rows">
    <?php echo '(' . $num_rows . ')' . ' different recipe' . $num_rows_amount?>
  </div>
  <div class="recipe_wrapper">
    <?php 
    if (mysqli_num_rows($result) > 0) {
      foreach($result as $recept) {
      ?>
      <a href="receptPage.php?gerecht=<?php echo $recept['gerecht_naam'] ?>">
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
    <?php }} ?>
  </div>
</body>
</html>

<?php
 include('navbar.php')
?>