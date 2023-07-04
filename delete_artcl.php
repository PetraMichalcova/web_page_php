<?php
session_start();

$id=$_GET["id"];

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "test1"; 

$conn = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM article WHERE id='$id'";
    $result = $conn->query($sql);
    $conn->close();

    header("Location: main_page_admin.php"); 

?>