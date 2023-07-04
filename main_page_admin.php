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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <title>Flask APP!</title>
    </head>
    <style>

.txt-color {
    color: #4A525D;
}

.main-heading {
    font-weight: 300;
    font-size: large;
}

.img-div {
    min-height: 250px;
    background-color: #E8ECEF;
}

.img-content {
    height: 60px;
}

.fw-300 {
    font-weight: 300;
}

.card-date {
    font-size: small;
}

.border-custom {
    border-color: #E8ECEF;
}

.txt-color-2 {
    color: #FEF2F2;
}

.txt-color-3 {
    color: #3F4751;
}

.txt-color-4 {
    color: #F53163;
}

.txt-color-5 {
    color: #606F84;
}

.div-bg {
    background-image: url('https://i.ibb.co/tHVW3PB/Group-3959-8.png');
    height: 100vh;
    width: 100%;
    background-size: cover;
}

.div-bg-2 {
    background-image: url('https://i.ibb.co/9Z8LH61/Slider-6.png');
    height: 100vh;
    width: 100%;
    background-size: cover;
}

.div-footer {
    background-color: #B6666F;
    min-height: 8em;
}

.mt-text {
    margin-top: 15em;
}

.txt-chuducky {
    font-weight: 100;
}

.btn-fufiary {
    color: #3F4751;
    background-color: #FEF2F2;
    min-width: 10em;
}

.btn-fufiary {
    color: #3F4751;
    background-color: red;
    min-width: 10em;
}

a {
    text-decoration: none;
    color: rgba(228, 221, 229, 0.8);
}

a:hover {
    text-decoration: none;
    color: black;
}

.navbar {
    padding-left: 5rem;
}

.page-item.active .page-link {
background-color: rgba(228, 221, 229, 0.8);
}

a.page-link {
 color: rgba(228, 221, 229, 0.8); 
}

span.page-link {
  color: rgba(228, 221, 229, 0.8); 
}

span {
 color: rgba(228, 221, 229, 0.8);
}

.page-item disabled {
  color: rgba(228, 221, 229, 0.8);
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

    $sql = "SELECT * FROM article"; 
    $result = $conn->query($sql);

    $rows = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    $articles = $rows;
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
                      <a class="nav-link" href="/php/main_page.php">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link" href="/php/add_article.php">Add</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/php/index.php?logout=true" href="#">Log out</a>
                    </li>
                  </ul>
                </div>
              </nav>
    
          
    <div class="container container-fluid my-5">
        <div class="container container-fluid">

        </div>
        <h1 class="text-center txt-color">Articles</h1>
        <div class="container col-offset-2 col-8">
            <h5 class="text-center mt-4 mb-5 txt-color main-heading">
                Brief overview of added articles about anything. We hope you find the topics interesting and valuable.
            </h5>
        </div>
        <div>

        </div>
        <div class="container container-fluid">
    <div class="row">
        <?php foreach ($articles as $article): ?>
        <div class="col-sm-12 col-md-6 col-xl-4 txt-color">
            <div class="card mb-3 rounded-3">
                <div class="d-flex justify-content-center align-items-center img-div">
                    <img class="img-content" src="https://img.freepik.com/premium-psd/landscape-magazine-book-mockup-top-view_258438-546.jpg?w=1060" alt="Card image cap">
                </div>
                <div class="card-body txt-color p-4">
                    <p class="card-date fw-300 mt-2 mb-1"><?php echo $article['date']; ?></p>
                    
                    <a href="opnd_article.php?id=<?php echo urlencode($article['id']); ?>">
                        <?php echo $article['title']; ?>
                    </a>
                    
                    <a href="update_artcl.php?id=<?php echo urlencode($article['id']); ?>">
                              <i class='fa fa-pencil'></i>
                            </a>

                            <a href="delete_artcl.php?id=<?php echo urlencode($article['id']); ?>">
                              <i class="fa fa-trash"></i>
                            </a>
                            

                    <p class="card-text fw-300"><?php echo $article['title']; ?></p>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 pe-0">
                            <div class="d-flex flex-row-reverse">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</div>


  
</body>


</html>

