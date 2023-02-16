<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image-Form</title>
  <style>
    body{
      margin: 100px auto;
      font-family: Arial;
      font-size: 18px;
      width: 1200px;
    }
    input{
      padding: 7px;
    }
    button{
      padding: 7px 25px;
      font-size: 17px;
    }
  </style>
  <script type="text/javascript">
    var check_valid = /^[A-Za-z]+$/;
    function checkFname(){
      var first_name = document.getElementById('fname').value;
      if(!(first_name.match(check_valid))){
        document.getElementById('invalid_fname').innerHTML = `<span style="color:red;">Enter only alphabets<span>`;
        document.getElementById("submitBtn").disabled = true;
      }else{
        document.getElementById('invalid_fname').innerHTML = '';
        document.getElementById("submitBtn").disabled = false;
      }
    }
    function checkLname(){
      var last_name = document.getElementById('lname').value;
      if(!(last_name.match(check_valid))){
        document.getElementById('invalid_lname').innerHTML = `<span style="color:red;">Enter only alphabets<span>`;
        document.getElementById("submitBtn").disabled = true;
      }else{
        document.getElementById('invalid_lname').innerHTML = '';
        document.getElementById("submitBtn").disabled = false;
      }
    }
  </script>
</head>
<body>
  <?php
  $user_profile = $_SESSION['login_user'];
  if($user_profile==false){
    header("location: ../login.php");
  }
  ?>
  <form action="user.php" method="post" enctype="multipart/form-data">
    <h1>User log-in page</h1>
    Enter your first-name : <input type="text" name="fname" id="fname" onblur="checkFname()" required><span id="invalid_fname"></span><br><br>
    Enter your last-name : <input type="text" name="lname" id="lname" onblur="checkLname()" required><span id="invalid_lname"></span><br><br>
    Upload your img : <input type="file" name="user_img" id="user_img" required><br><br>
    <button id="submitBtn">Submit</button>
  </form>
</body>
</html>