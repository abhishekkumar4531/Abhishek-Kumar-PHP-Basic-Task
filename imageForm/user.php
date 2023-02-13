<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image-Uploaded</title>
  <style>
    body{
      font-family: Arial;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>You logged-in welcome!!!</h1>
  <?php
  if(($_SERVER['REQUEST_METHOD'])){
    if(isset($_FILES['img'])){
      /*echo "Welcome";
      echo "<pre>";
      print_r ($_FILES);
      echo "</pre>";*/


      $img_name = $_FILES['img']['name'];
      $img_size = $_FILES['img']['size'];
      $img_tmp = $_FILES['img']['tmp_name'];
      $img_type = $_FILES['img']['type'];

      move_uploaded_file($img_tmp, "uploaded/".$img_name);
      echo "<div>";
      echo '<img src="uploaded/'.$img_name.'">';
      echo "<h3>". $_POST['name'] ."</h3>";
      echo "</div>";
    }
  }
  ?>
</body>
</html>