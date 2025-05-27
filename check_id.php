<?php
header('Content-Type: application/json');


$pdo = new PDO('mysql:host=localhost;dbname=vote;charset=utf8', 'root', '');

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$user_nickname = isset($_POST['user_nickname']) ? $_POST['user_nickname'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : ''; 

if (empty($user_id) && empty($user_nickname) && empty($email)) {
    echo json_encode(['success' => false]);
    exit;
}
if(!empty($user_id)) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE userid = ?");
    $stmt -> execute([$user_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else if(!empty($user_nickname)) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE nickname = ?");
    $stmt -> execute([$user_nickname]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
} else if(!empty($email)) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt -> execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($row) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
