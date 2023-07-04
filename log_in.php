<?php
session_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if(isset($_SESSION["user"]) && isset($_SESSION["pswd"]) && isset($_SESSION["who"])) {
    header("Location: main_page (2).php");   
} else {
    
$mail = $_POST['user_mail'];
$pswd = $_POST['pswd'];

$sql = "SELECT * FROM users WHERE email = '$mail' and password = '$pswd'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
        if($row) {
            $_SESSION["user"] = $row['email'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["who"] = $row['who'];

            header("Location: main_page.php");  
            }
}

?>
