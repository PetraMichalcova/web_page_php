<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
} 

$id_article = $_POST['id_article'];
$comment = $_POST['comment'];


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name FROM users WHERE email='{$_SESSION['user']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$name = $row['name'];

$sql = "INSERT INTO comment (article_id, user_id, user_name, text) VALUES ('$id_article', '{$_SESSION['user']}', '$name', '$comment')";
$result = $conn->query($sql);
$conn->close();

header('Location: opnd_article.php?id=' . $id_article);
exit;
?>