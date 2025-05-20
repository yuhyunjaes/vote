<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "vote");

$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : null;

if($user_id !== null || $user_password !== null) {
    if(!empty($user_id) && !empty($user_password)) {
        $id_sql = "SELECT * FROM users WHERE userid = '$user_id'";
        $id_result = mysqli_query($conn, $id_sql);
        if(mysqli_num_rows($id_result) > 0) {
                $id_row = mysqli_fetch_assoc($id_result);
                $hash_passowrd = hash('sha256', $user_password . $id_row['salt']);
                if($hash_passowrd === $id_row['hash_password']) {
                    $_SESSION['user_id'] = $user_id;
                    echo"
                    <script>
                        alert('로그인이 되었습니다.');
                        location = 'web.php';
                    </script>
                    ";        
                } else {
                    echo"
            <script>
                alert('아이디 또는 비밀번호를 확인해주세요.');
                history.back();
            </script>
            ";
                }
        } else {
            echo"
            <script>
                alert('아이디 또는 비밀번호를 확인해주세요.');
                history.back();
            </script>
            ";
        }
        
    } else {
        echo"
        <script>
            alert('빈칸을 확인해주세요.');
            history.back();
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>
    <div id="wrap">
        <form action="signin.php" method="POST">
            <a href="web.php" class="logo">
                <img src="image/logo.png" alt="">
            </a>
            <input type="text" id="user_id" name="user_id" placeholder=" 아이디를 입력해 주세요.">
            <input type="password" id="user_password" name="user_password" placeholder=" 비밀번호를 입력해 주세요.">
            <input type="submit" value="로그인하기">
            <div class="new_box"><a href="signup.php">회원가입</a>|<a href="">비밀번호 찾기</a></div>
        </form>
    </div>
</body>
</html>