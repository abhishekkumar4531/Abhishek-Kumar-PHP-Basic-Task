<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image-Form</title>
  <script type="text/javascript">
    function validForm(){
      var val = document.getElementById("name").value;
    }
  </script>
</head>
<body>
  <form action="user.php" method="post" enctype="multipart/form-data">
    Enter your name : <input type="text" name="name" required id="name" value="Ale"><br><br>
    Upload your img : <input type="file" name="img" id="img" required><br><br>
    <button onclick="validForm()">Submit</button>
  </form>
</body>
</html>