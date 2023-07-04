<?php
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

session_start();

if (session_status() === PHP_SESSION_NONE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} 

$title = $_POST['title'];
$content = $_POST['content'];
$selected = $_POST["value"];
$date = date('Y-m-d');

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO article (title, author_id, date, content, category) VALUES ('$title', '{$_SESSION['user']}', '$date', '$content', '$selected')";
$result = $conn->query($sql);
$conn->close();

header('Location: http://localhost/php/main_page.php');
exit;


?>