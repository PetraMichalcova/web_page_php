<?php
session_start();

if ($_SESSION["user"] == "") {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    html, body {
    height: 100%;
    width: 100%;
  }   

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
    width:100%;
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

   .btn {
    border-color: white;
    color: white;
    border-width: 3px;
    background-color: rgba(228, 221, 229, 0.8);
    border-radius: 50%;
    height: 55px;
    width: 55px;
   }

   textarea,input {
    border:none;
    background-color: transparent;
	  border-bottom: 2px solid  rgba(228, 221, 229, 0.8); 
    resize: none;
   }

   textarea:focus {
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

   label {
    color: white;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
   }

   .nholderHIDE {
    width: 25%;
    height: 8%;
    background-color:  rgba(228, 221, 229, 0.8);
    border: solid;
    border-color: white;
    border-width: 3px;
    display: flex;
    justify-content: center;
    border-radius: 25%;
   } 
    
        </style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <a class="navbar-brand" href="#">
                <img src="https://icon2.cleanpng.com/20180420/lyq/kisspng-computer-icons-blog-article-5ad9d86712a992.2335630015242261510765.jpg" width="30" height="30" alt="">
              </a>
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="/php/main_page.php">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="/php/add_article.php" href="#">Add</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/php/index.php?logout=true" href="#">Log out</a>
                    </li>
                  </ul>
                </div>
              </nav>
    


<body>
    
<div class="holder">
  <div class="sub_holder">
  <form method="POST" action="subm_add_article.php">
       <input type="text" name="title" placeholder="Name of Article"><br>  
       <textarea placeholder="Text" id="story" name="content" 
          rows="7" cols="30"></textarea> <br>
          <select name="value">
            <option value="men">Men</option>
            <option value="women">Women</option>
          </select>
        <br>
        <br>
        <input class="btn" type="submit" value="OK">
      </form>
    </div>
</div>
  
</body>


</html>
