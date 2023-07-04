<?php

session_start();

if(isset($_GET['logout']) && $_GET['logout'] == 'true') {
  $_SESSION["user"] = null;
}
?>

<!doctype html>
<html lang="en">
<style>

.navbar {
    padding-left: 5rem;
}

.holder {
      width: 100%;
      height: 95%;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity:0.8;
    position:fixed;
    bottom:0px;
    left:0px;
    z-index:1000;
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

   .sub_holder {
    width: 100%;
    display: flex;
    justify-content: center;
   }

   textarea,input {
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

   [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    border-color: white;
    color: white;
    border-width: 1px;
    background-color: rgba(228, 221, 229, 0.8);
    border-radius: 50%;
   }

   .holderBtn {
    align-items: center;
   }

   a {
    float: right;
    color: black;
   }

   .href {
    float: right;
    color: black;
   }

   a.href:focus {
    float: right;
    color: rgba(228, 221, 229, 0.8);
   }

   a.href:hover {
    float: right;
    color: rgba(228, 221, 229, 0.8);
   }

</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  
      <div class="holder">
        <div class="sub_holder">
  <form action="log_in.php" method="POST">
  <label for="fname">Email:</label><br>
  <input type="email" id="fname" name="user_mail" placeholder="Email" required><br><br>
  <label for="lname">Password:</label><br>
  <input type="password" id="lname" name="pswd" placeholder="Password" required><br><br>
  <div class="holderBtn">
    <input class="btn" type="submit" value="OK">
    <a class="href" href="/php/sign_in.php">Sign in</a>
  </div>
  <input type="hidden" name="extra_param" value="send_from_index">
</form>
</div>
</div>

</body>


</html>
