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
        <div class="row-2">
          <input class="recipe" value="recipe" required>
        </div>
        <div class="row-3">
          <input class="duur" value="duur">
          <input class="moeilijkheid" value="moeilijkheid">
          <input class="gang" value="gang">
        </div>
        <div class="row-4">
          <input type="submit" name="submit" class="submit" value="upload">
        </div>
      </form>
  </div>

  <script>
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

<?php
if(isset($_POST['submit'])){
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
}
?>