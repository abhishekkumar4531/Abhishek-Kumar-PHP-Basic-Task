<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email-Form</title>
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
  function checkPhone(){
    var user_phone = document.getElementById('phone').value;
    var check_phone = /^(\+91)[0-9]{10}$/;
    if(!(user_phone.match(check_phone))){
      document.getElementById('invalid_phone').innerHTML = '<span style="color:red;">Enter only 10 digits number and country code<span>';
      document.getElementById("submitBtn").disabled = true;
    }else{
      document.getElementById('invalid_phone').innerHTML = '';
      document.getElementById("submitBtn").disabled = false;
    }
  }
  function checkEmail(){
    var user_email = document.getElementById('user_email').value;
    var check_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(!(user_email.match(check_email))){
      document.getElementById('email_status').innerHTML = '<span style="color:red;">Enter a valid-email syntax<span>';
      document.getElementById("submitBtn").disabled = true;
    }else{
      document.getElementById('email_status').innerHTML = '<span style="color:green;">This is valid-email syntax<span>';
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
  <form action="email.php" method="post" enctype="multipart/form-data">
    <h1>Student log-in page</h1>
    Enter your first-name : <input type="text" name="fname" id="fname" onblur="checkFname()" required><span id="invalid_fname"></span><br><br>
    Enter your last-name : <input type="text" name="lname" id="lname" onblur="checkLname()" required><span id="invalid_lname"></span><br><br>
    Enter your phone-number : <input type="text" name="phone" id="phone" onblur="checkPhone()" placeholder="Enter like : +919876543210" required><span id="invalid_phone"></span><br><br>
    Enter your email-address : <input type="text" name="user_email" id="user_email" onblur="checkEmail()" placeholder="Enter a valid email" required><span id="email_status"></span><br><br>
    Upload your img : <input type="file" name="user_img" id="user_img" required><br><br>
    Enter your subject-name and subject-marks in below text-area : <br>
    <textarea name="sub_details" id="sub_details" cols="30" rows="5" placeholder="Enter like Sub_Name|Sub_Marks.." required></textarea><br><br>
    <button id="submitBtn">Submit</button>
  </form>
</body>
</html>