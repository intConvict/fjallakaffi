<?php
session_start();

require('database.php');

//get gang enum
$sql = "SHOW COLUMNS FROM recepten WHERE Field = 'gang'";
$enum_gang = mysqli_query($conn, $sql);
$row_gang = mysqli_fetch_assoc($enum_gang);
$enum_values_gang = explode(",", str_replace("'", "", substr($row_gang['Type'], 5, -1)));

//get moeilijkheid enum
$sql = "SHOW COLUMNS FROM recepten WHERE Field = 'moeilijkheid'";
$enum_moeilijkheid = mysqli_query($conn, $sql);
$row_enum_moeilijkheid = mysqli_fetch_assoc($enum_moeilijkheid);
$enum_values_moeilijkheid = explode(",", str_replace("'", "", substr($row_enum_moeilijkheid['Type'], 5, -1)));

//get ingredienten
$sql = "SELECT ingredient_naam FROM ingredienten";
$result_ingredienten = mysqli_query($conn, $sql);

if(isset($_POST['submit'])){

  //set recipe image
  $target_dir = "links/images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  
  foreach ($_FILES as $key => $value) {
    unset($_FILES[$key]);
  } 

  //set recipe database
  $gebruikersnaam = $_SESSION['gebruikersnaam'];
  $gerechtnaam = $_POST['titel'];
  $ingredienten = $_POST['ingredienten'];
  $instructie = $_POST['instructie'];
  $foto = $target_file;
  $tijd = $_POST['tijd'];
  $gang = $_POST['gang'];
  $moeilijkheid = $_POST['moeilijkheid'];

  $sql_myid = "SELECT id FROM `gebruikers` WHERE gebruikersnaam = '$gebruikersnaam'";
  $result_myid = mysqli_query($conn, $sql_myid);
  $row_myid = mysqli_fetch_assoc($result_myid);
  $myid = $row_myid['id'];

  $sql = "INSERT INTO `recepten`(`gebruiker_id`, `gerecht_naam`, `ingredienten`, `instructie`, `foto`, `tijd`, `gang`, `moeilijkheid`) VALUES ($myid,'$gerechtnaam','$ingredienten','$instructie','$foto','$tijd','$gang','$moeilijkheid')";
  $insert = mysqli_query($conn, $sql);
  header('location: profile.php');
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
  <link rel="stylesheet" href="links/css/makeRecipe.css">
</head>
<body>
  <div class="top-bar">
    <a href="profile.php">
    <div class="terug">
      <h2>
        << laat maar
      </h2>
    </div>
    </a>
  </div>
    <div class="make-recipe_wrapper">
      <form method="post" enctype="multipart/form-data">
        <div class="row-1">
          <div id="preview" class="col-1">
            <input type="file" name="fileToUpload" class="foto" onchange="previewImage(event)">
            <h1 id="preview-text">
              kies een foto...
            </h1>
          </div>
          <div class="col-2">
            <input class="titel" name="titel" placeholder="hoe heet het?" required>
            <a href="#">
              <div class="ingredient">
                <h2>
                  nieuw ingredient +
                </h2>
              </div>
            </a>
          </div>
        </div>
        <label class="label" for="textarea">ingredienten</label>
        <div class="row-2">
          <textarea id="textarea" name="ingredienten"></textarea>
        </div>
        <label class="label" for="textarea">instructie</label>
        <div class="row-2">
          <textarea id="textarea" name="instructie"></textarea>
        </div>
        <div class="row-3">
          <input class="duur" placeholder="hoeveel minuten duurt dit" name="tijd" required>
          <select name="gang" required>
            <option value="welke gang?" selected disabled>welke gang?</option>
            <?php foreach($enum_values_gang as $gang) { ?>
              <option value="<?php echo $gang ?>"><?php echo $gang ?></option>
            <?php } ?>
          </select>
          <select name="moeilijkheid" required>
            <option value="moeilijkheidsgraad" selected disabled>moeilijkheidsgraad</option>
            <?php foreach($enum_values_moeilijkheid as $enum_moeilijkheid) { ?>
              <option value="<?php echo $enum_moeilijkheid ?>"><?php echo $enum_moeilijkheid ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row-4">
          <input type="submit" name="submit" class="submit" value="upload">
        </div>
      </form>
  </div>

  <script>
    //preview recipe image function
    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('preview');
      var preview_text = document.getElementById('preview-text');
      var reader = new FileReader();
      
      reader.onload = function(){
        preview.style.backgroundImage = "url('" + reader.result + "')";
        preview_text.style.display = "none";
        
      };
      
      reader.readAsDataURL(input.files[0]);
    }
  </script>
</body>
</html>
