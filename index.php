<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
    <style>
        lable{
            font-size: 18px;
            font-weight: bold;
        }
        input{
            width: 200px;
            padding: 10px;
        }
        body{
            width: 1200px;
            margin: 100px;
        }
        span{
            color: red;
        }
        h2{
            margin-top:100px;
        }
    </style>
</head>
<body>
    <?php
        $name1=$name2=$fullName="";
        $nameErr1=$nameErr2=$fullNameErr="";
        $show=false;
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(empty($_POST['fname']) && empty($_POST['lname'])){
                $nameErr1 = "Enter First Name";
                $nameErr2 = "Enter Last Name";
                $show = false;
            }else if(empty($_POST['fname'])){
                $nameErr1 = "Enter First Name";
                $name2 = $_POST['lname'];
                if (!preg_match("/^[a-zA-Z]*$/",$name2)){
                    $nameErr2 = "Only letters allowed";
                    $show = false;
                    $name2="";
                }
            }else if(empty($_POST['lname'])){
                $nameErr2 = "Enter last Name";
                $name1 = $_POST['fname'];
                if (!preg_match("/^[a-zA-Z]*$/",$name1)){
                    $nameErr1 = "Only letters allowed";
                    $show = false;
                    $name1="";
                }
            }else{
                $status=true;
                $name1 = $_POST['fname'];
                $name2 = $_POST['lname'];
                if (!preg_match("/^[a-zA-Z]*$/",$name1)){
                    $nameErr1 = "Only letters allowed";
                    $status = false;
                    $show = false;
                    $name1="";
                }
                if (!preg_match("/^[a-zA-Z]*$/",$name2)){
                    $nameErr2 = "Only letters allowed";
                    $status = true;
                    $show = false;
                    $name2="";
                }
                if($status==true){
                    $fullName = $name1." ".$name2;
                    $show = true;
                }
            }
        }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>User's Login-Page</h1>
        <label for="fname">Enter First Name : </label>
        <input type="text" name="fname" placeholder="First Name" value="<?php echo $name1 ?>"><span>* <?php echo $nameErr1 ?></span></br></br>
        <label for="lname">Enter Last Name : </label>
        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $name2 ?>"><span>* <?php echo $nameErr2 ?></span></br></br>
        <label for="full-name">User Full Name : </label>
        <input type="text" name="full-name" placeholder="Full Name" readonly value="<?php echo $fullName ?>"><br><br>
        <input type="submit" onclick="checkValid()">
    </form>
    <div class="user-login">
        <?php
        if($show==true){
            echo "<h2>Welcome $fullName!!!</h2>";
        }
        ?>
    </div>
</body>
</html>