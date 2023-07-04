<?php
session_start();

if($_SESSION["user"] == null) {
  header("Location: index.php"); 
  exit(); 
}

if($_SESSION["who"] == 'U') {
    header("Location: main_page_user.php"); 
    exit(); 
} else {
    header("Location: main_page_admin.php"); 
    exit(); 
}

?>
