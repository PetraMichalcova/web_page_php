<?php

session_start();

if($_SESSION["user"] == null) {
  header("Location: index.php"); 
  exit(); 
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url_for('static',filename='css/styles.css') }}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <title>Flask APP!</title>
</head>

<style>
    html, body {
      height: 100%;
      width: 100%;
  }   

    .navbar {
        padding-left: 5rem;
    }

    .holderArticle {
        display: flex;
        justify-content: center;
        padding-top: 1%;
        padding-bottom: 1%;
        width: 80%;
    }

    .holderArticleMain {
        display: flex;
        justify-content: center;
    }

    .holderForm {
        display: flex;
        justify-content: center;
        padding-top: 1%;
        padding-bottom: 1%;
    }

    .holderComments {
        display: flex;
        justify-content: center;
        padding-top: 1%;
        padding-bottom: 1%;
    }

    .holderArticle1 {
        text-align: center;
        width:100%;
        background-color: rgba(248, 249, 250, 1);
        border-radius: 4%;
    }

    .holderForm1 {
        text-align: center;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .holderComments1 {
        text-align: center;
    }

    form {
        display: block;
        width:50%;
        background-color: rgba(228, 221, 229, 0.8);
        padding: 1%;
    }

    textarea {
      border:none;
      background-color: transparent;
	    border-bottom: 2px solid  white; 
      resize: none;
      padding: 1%;
      width: 90%;
    }

    textarea:focus {
    border-bottom: 2px solid white; 
    background-color: transparent;
    resize: none;
    outline: none;
    }
    .btn {
    border-color: white;
    color: white;
    background-color: rgba(228, 221, 229, 0.8);
   }

   
    </style>

<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM article WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$title = $row['title'];
$content = $row['content'];

$sql = "SELECT * FROM comment"; 
$result = $conn->query($sql);
$rows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$comments = $rows;
$conn->close();

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
              <a class="nav-link" href="/php/main_page.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/php/index.php?logout=true" href="#">Log out</a>
            </li>
          </ul>
        </div>
      </nav>

      <script>
  var link = document.getElementById('user');

  link.addEventListener('click', function(event) {
    event.preventDefault(); 
  });
      </script>


  <div class="holderArticleMain">
<div class="holderArticle">
    <div class="holderArticle1">
 <h4><?php echo $title; ?></h4>
 <p><?php echo $content; ?></p>
    </div>
</div>
</div>

<div class="holderForm">
    <div class="holderForm1">
    <form action="add_comment.php" method="POST">
    <input type="hidden" name="id_article" value="<?php echo $id; ?>">
    <input type="hidden" name="id_author" value="">
    <textarea placeholder="Text" id="story" name="comment" 
          rows="4" cols="30"></textarea> <br> <br>
          <input class="btn" type="submit" value="Add">
  </form>
    </div>
</div>

<div class="holderComments">
    <div class="holderComments1">
 <h3>Comments:</h3>
<ul>
<?php foreach ($comments as $comment): ?>
    <li>
      <strong>User:</strong> <?php echo $comment['user_name']; ?><br>
      <strong>Comment:</strong> <?php echo $comment['text']; ?>
    </li>
    <?php endforeach; ?>
</ul>
    </div>
</div>  

    
</body>


</html>
