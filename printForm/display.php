<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Download-Here</title>
  <style>
    body{
      font-family: Arial;
      text-align: center;
    }
    h3{
      font-size: 21px;
      color: green;
    }
    table{
      margin: 0 auto;
      width: 350px;
    }
    table th,td{
      padding: 7px;
    }
    img{
      width: 150px;
      height: 150px;
    }
    h6{
      color: pink;
    }
    h5{
      color: red;
    }
    div{
      margin-top: 100px;
    }
    div button{
      padding: 10px 12px;
      font-size: 17px;
    }
  </style>
</head>
<body>
  <?php
  global $status;
  if($_SERVER['REQUEST_METHOD']=="POST"){

    $user_email = $_POST['user_email'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$user_email",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: 3ti1A2XST7POC3bhKnPwNaCYsRSfLsOf"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $check_validity= json_decode($response, true);

    if($check_validity['format_valid'] && $check_validity['smtp_check']){
      if(isset($_FILES['user_img'])){
        /*echo "Welcome";
        echo "<pre>";
        print_r ($_FILES);
        echo "</pre>";*/

        $_SESSION['user_name'] = $_POST['fname'] ." ". $_POST['lname'];
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_phone'] = $_POST['phone'];


        $img_name = $_FILES['user_img']['name'];
        $img_size = $_FILES['user_img']['size'];
        $img_tmp = $_FILES['user_img']['tmp_name'];
        $img_type = $_FILES['user_img']['type'];

        move_uploaded_file($img_tmp, "../uploaded/".$img_name);
        echo "<h1>";
        echo $_POST['fname'];
        echo " you logged-in welcome!!!</h1>";
        echo "<div>";
        echo '<img src="uploaded/'.$img_name.'">';
        echo "<h3>". $_POST['fname'] ." ". $_POST['lname'] ."</h3>";
        echo "<h3>Phone's number : ". $_POST['phone'] ."</h3>";
        echo "<h3>Verified-email : ". $user_email ."</h3>";
        echo "</div>";

        $_SESSION['user_image'] = "uploaded/".$img_name;
      }

      if(isset($_POST['sub_details'])){
        $sub_info = Array();
        $line_change = explode("\n", $_POST['sub_details']);
        foreach($line_change as $info){
          $line = explode("|", $info);
          if($line[0]!=""){
            if($line[1]>=0 && $line[1]<=100){
              $sub_info[$line[0]] = $line[1];
            }else{
              $sub_info[$line[0]] = "NAN";
            }
          }
        }

        $_SESSION['sub_data'] = $sub_info;

        echo "<table border='1'>";
        echo "<tr><th>Subjects</th><th>Marks</th></tr>";
        foreach($sub_info as $sub_name => $sub_marks){
          echo "<tr><td>". $sub_name ."</td>";
          echo "<td>". $sub_marks . "</td></tr>";
        }
        echo "</table>";
      }
      $status=true;
    }else{
        $status=false;
        echo "<h5>OOPS! please check your email..</h5>";
    }
  }
  ?>


  <div>
  <form action="download.php" method="post">
    <?php
      if($status==true){
        echo "<button>Download</button>";
      }
    ?>
  </form>
  </div>
</body>
</html>