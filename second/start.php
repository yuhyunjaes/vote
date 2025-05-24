<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "vote");

$id = 0;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
}
?>