<?php
session_start();

$id=$_POST["artcl_id"];
$title=$_POST["title"];
$content=$_POST["content"];

echo $title;
echo $content;

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);

    $sql = "UPDATE article SET title='$title', content='$content' WHERE id='$id'";
    $result = $conn->query($sql);
    $conn->close();

    header("Location: main_page_admin.php"); 

?>