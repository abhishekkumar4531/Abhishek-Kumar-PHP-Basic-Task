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
    h3{
      font-size: 18px;
      color: green;
    }
  </style>
</head>
<body>
  <?php
  echo "<h1>";
  echo $_POST['fname'];
  echo " you logged-in welcome!!!</h1>";
  //if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_FILES['user_img'])){
      /*echo "Welcome";
      echo "<pre>";
      print_r ($_FILES);
      echo "</pre>";*/

      $img_name = $_FILES['user_img']['name'];
      $img_size = $_FILES['user_img']['size'];
      $img_tmp = $_FILES['user_img']['tmp_name'];
      $img_type = $_FILES['user_img']['type'];

      move_uploaded_file($img_tmp, "../uploaded/".$img_name);
      echo "<div>";
      echo '<img src="../uploaded/'.$img_name.'">';
      echo "<h3>". $_POST['fname'] ." ". $_POST['lname'] ."</h3>";
      echo "</div>";
    }
  //}
  ?>
</body>
</html>