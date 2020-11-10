<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="fichier">
    <input type="submit" name="btn" value="Valider">
  </form>
</body>
</html>

<?php
if(isset($_POST['btn']) && isset($_FILES['fichier']))
{
  $file = $_FILES['fichier'];
  $filename = $_FILES['fichier']['name'];
  $filetype = $_FILES['fichier']['type'];
  $fileloctmp = $_FILES['fichier']['tmp_name'];
  $filesize = $_FILES['fichier']['size'];
  $fileerror = $_FILES['fichier']['error'];

if($fileerror ==0 && $filesize < 100000)
{
  move_uploaded_file($fileloctmp,"uploads".DIRECTORY_SEPARATOR.$filename);
  echo "file moved";
}

}

?>