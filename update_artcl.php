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
  
.navbar {
        padding-left: 5rem;
    }

.holder {
    width: 100%;
    height: 95%;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0.8;
    position: fixed;
    width: 100%;
    bottom: 0px;
    left: 0px;
    z-index: 1000;
}

.sub_holder {
  width:25%;
  display: flex;
  justify-content: center;
  background-color: rgba(228, 221, 229, 0.8);
  border-radius: 25%;
}

  textarea,input {
    border:none;
    background-color: transparent;
	  border-bottom: 2px solid  white; 
    resize: none;
    color:white;
    font-weight: lighter;
   }

   textarea:focus {
    border-bottom: 2px solid  white; 
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
   
   form {
    padding: 10%;
   }
   
</style>

<?php
$article_id = $_GET['id'];

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    $sql = "SELECT * FROM article WHERE id='$article_id'"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content']

?>

<body>

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
            <a class="nav-link" href="/main_page_admin">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/chart" href="#">Chart</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/log_out">Log out</a>
          </li>
        </ul>
      </div>
    </nav>


      <div class="holder">
        <div class="sub_holder">
        <form method="POST" action="update_artcl_subm.php">
            <br> <input class="inp" type="text" name="title" value="<?php echo $title; ?>"><br>  <br>
             <textarea class="ta" placeholder="Text" id="story" name="content" value="<?php echo $content; ?>"
                rows="7" cols="30"></textarea> <br> <br>
              <input class="btn" type="submit" value="OK"> <br> <br>
              <input type="hidden" type="text" id="id" name="artcl_id" value="<?php echo $article_id; ?>"> 
            </form>
          </div>
      </div>

      <script>
        var textarea = document.getElementById("story");
        textarea.value = "<?php echo $content; ?>";
    </script>

    </body>


    </html>