<?php
session_start();
$conn = new mysqli("localhost", "root", "", "vote");

$id = 0;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    echo"
        <script>
            localStorage.setItem('user_id', '$id');
        </script>
    ";
} else {
    echo"
        <script>
            localStorage.removeItem('user_id');
        </script>
    ";
}
?>