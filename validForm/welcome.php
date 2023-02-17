<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <style>
        body{
					width: 1200px;
					margin: 0 auto;
					font-family: Arial;
					display: flex;
					justify-content: center;
					color: green;
					padding: 100px 50px;
					font-size: 20px;
        }
        .ctn-center{
          display: none;
        }
    </style>
</head>
<body>
    <?php
      echo "<h2>Welcome ". $_SESSION['full_name'] ."!!!</h2>";
    ?>
</body>
</html>