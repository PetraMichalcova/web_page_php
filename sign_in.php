<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


     <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $database = "test1"; 

        $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
        }

        $name=$_POST['fn'];
        $mail=$_POST['user_mail'];
        $pswd=$_POST['pswd'];

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$mail', '$pswd')";
        $result = $conn->query($sql);
        $conn->close();

    }
?>

<style>
html, body {
    height: 100%;
    width: 100%;
  }  

.holder {
      width: 100%;
      height: 95%;
      display: flex;
      justify-content: center;
      align-items: center;
    }
   
   form {
    justify-content: center;
    background-color: white;
    padding: 5%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    border-radius: 120px;
    border: solid;
    border-color:  rgba(228, 221, 229, 0.8);
   }

   .subholder {
    width: 100%;
    display: flex;
    justify-content: center;
   }

   input {
    border:none;
    background-color: transparent;
	  border-bottom: 2px solid  rgba(228, 221, 229, 0.8); 
    resize: none;
   }

   input {
    border-bottom: 2px solid  rgba(228, 221, 229, 0.8); 
    background-color: transparent;
    resize: none;
    outline: none;
}

   input:focus {
    border-bottom: 2px solid  rgba(228, 221, 229, 0.8); 
    background-color: transparent;
    resize: none;
    outline: none;
}


   .btn {
    border-color: white;
    color: white;
    border-width: 1px;
    background-color: rgba(228, 221, 229, 0.8);
    border-radius: 50%;
    height: 50px;
    width: 50px;
   }


</style>

<body>
  
  <div class="holder">
    <div class="subholder">
<form method="POST" action="sign_in.php">
  <input type="text" id="fname" name="fn" placeholder="First name" minlength="2" required><br><br>
  <input type="email" id="fname" name="user_mail" placeholder="Email" required><br><br>
  <input type="password" id="lname" name="pswd" placeholder="Password" required><br><br>
  <input class="btn" type="submit" value="OK">
</form>
  </div>
</div>

</body>


</html>
