<?php
$conn = mysqli_connect("localhost", "root", "", "vote");

$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : null;
$user_nickname = isset($_POST['user_nickname']) ? $_POST['user_nickname'] : null;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$user_password = isset($_POST['user_password']) ? $_POST['user_password'] : null;
$user_email = isset($_POST['user_email']) ? $_POST['user_email'] : null;

if($user_name !== null || $user_nickname !== null || $user_id !== null ||$user_password !== null ||$user_email !== null) {
    if(!empty($user_name) && !empty($user_nickname) && !empty($user_id) && !empty($user_password) && !empty($user_email)) {

        $nick_sql = "SELECT * FROM users WHERE nickname = '$user_nickname'";
        $nick_result = mysqli_query($conn, $nick_sql);
        if(mysqli_num_rows($nick_result) > 0) {
            echo"
            <script>
                alert('이미 존재하는 닉네임입니다.');
                history.back();
            </script>
            ";    
        }

        $id_sql = "SELECT * FROM users WHERE userid = '$user_id'";
        $id_result = mysqli_query($conn, $id_sql);
        if(mysqli_num_rows($id_result) > 0) {
            echo"
            <script>
                alert('이미 존재하는 아이디입니다.');
                history.back();
            </script>
            ";    
        }

        $ema_sql = "SELECT * FROM users WHERE email = '$user_email'";
        $ema_result = mysqli_query($conn, $ema_sql);
        if(mysqli_num_rows($ema_result) > 0) {
            echo"
            <script>
                alert('이미 존재하는 이메일입니다.');
                history.back();
            </script>
            ";    
        }

        $salt = bin2hex(random_bytes(32));
        $hash_password = hash('sha256', $user_password . $salt);

        $sql = "INSERT INTO users (user_name, nickname, userid, hash_password, salt, email) VALUES ('$user_name', '$user_nickname', '$user_id', '$hash_password', '$salt', '$user_email')";
        $result = mysqli_query($conn, $sql);
        if($result !== false) {
            echo"
            <script>
                alert('회원가입이 완료되었습니다.');
                location = 'signin.php';
            </script>
            ";    
        }
    } else {
        echo"
        <script>
            alert('빈칸을 확인해 주세요.');
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
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div id="wrap">
        <div class="loading_container">
            <div class="loading_box"></div>
        </div>

        <form action="signup.php" method="POST" id="forr">
            <a href="web.php" class="logo">
                <img src="image/logo.png" alt="">
            </a>
            <input type="text" id="user_name" name="user_name" placeholder=" 이름을 입력해 주세요.">
            <div class="check">
                <input type="text" id="user_nickname" name="user_nickname" placeholder=" 닉네임을 입력해 주세요.">
                <button class="nick_bt" onclick="nick_chck()" type="button">중복확인</button>
                <button type="button" class="nick_read" style="display: none;" >변경불가</button>
            </div>
            <div class="check">
                <input type="text" id="user_id" name="user_id" placeholder=" 아이디를 입력해 주세요. (5자리 이상)">
                <button type="button" class="id_num" onclick="id_check()">중복확인</button>
                <button type="button" class="id_read" style="display: none;" >변경불가</button>
            </div>

            <div class="pass_box">
                <input maxlength="16" type="password" id="user_password" name="user_password" placeholder=" 비밀번호를 입력해 주세요. (최대 16자리)">
                <button type="button" onclick="show1()" class="show_btn1"></button>
            </div>

            <div class="pass_box">
                <input maxlength="16" type="password" id="re_user_password" name="re_user_password" placeholder=" 비밀번호를 다시 입력해 주세요. (최대 16자리)">
                <button type="button" class="show_btn2"></button>
            </div>

            <div class="re_text_box">
                <p class="re_text_box_text"></p>
            </div>

            <div class="check">
                <input type="email" id="user_email" name="user_email" placeholder=" 이메일을 입력해 주세요.">
                <button onclick="email_send()" class="ch_bt" type="button">인증요청</button>
                <button type="button" style="display: none;" class="timer_bt"></button>
                <button class="email_all_check" style="display: none;" type="button">인증완료</button>
            </div>

            <div style="display: none;" id="che_codee" class="check">
                <input type="number" name="che_code" id="che_code" placeholder="인증번호를 입력해 주세요.">
                <button onclick="email_suc()" type="button">인증하기</button>
            </div>

            <input type="submit" value="회원가입하기">
            <div class="new_box"><a href="signin.php">로그인</a>|<a href="">비밀번호 찾기</a></div>
        </form>
    </div>
    <script src="signup.js"></script>
</body>
</html>