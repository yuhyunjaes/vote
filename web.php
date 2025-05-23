<?php
session_start();

$id = 0;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="web.css">
</head>
<body>
    <div id="wrap">

        <input type="radio" name="side_menu" id="side_menu">
        <input type="radio" name="side_menu" id="close_side_menu">

        <div class="side_menu">
            <div class="side_menu_header">
                <div class="side_control">
                    <div class="side_logo_box">
                        <a href="web.php" class="side_logo">
                            <img src="image/logo.png" alt="">
                        </a>
                    </div>
                    <div class="side_close_box">
                        <label class="close_side_menu" for="close_side_menu"></label>
                    </div>
                </div>
                <div class="side_btn">
                    <div class="side_a_box">
                        <a href="signin.php">로그인</a>
                    </div>
                    <div class="side_a_box">
                        <a href="signup.php">회원가입</a>
                    </div>
                </div>
            </div>
            <div class="side_menu_bin"></div>
            <div class="side_menu_body">
                <div class="side_menu_body_menu_box"></div>
                <div class="side_menu_body_menu_box"></div>
                <div class="side_menu_body_menu_box"></div>
                <div class="side_menu_body_menu_box"></div>
            </div>
        </div>

        <div class="real_header">
            <header>
                <div class="logo">
                    <a class="logo_box" href="web.php"><img src="image/logo.png" alt=""></a>
                    <label for="side_menu" class="side_menu_bar">
                        <div></div>
                        <div></div>
                        <div></div>
                    </label>
                </div>
                <nav class="menu_box">
                    <ul class="menu">
                        <li>
                            <a href="#">코드 갤러리</a>
                        </li>
                        <li>
                            <a href="#">이야기방</a>
                        </li>
                        <li>
                            <a href="#">작업실</a>
                        </li>
                        <li>
                            <a href="#">마이페이지</a>
                        </li>
                    </ul>
                </nav>
                <div class="login_box">
                    <div class="login_btn_box">
                        <a style="<?php if($id === 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="signin.php">로그인</a>
                        <a style="<?php if($id === 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="signup.php">회원가입</a>

                        <p style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>"><?php echo$id?><span style="font-weight: 400;">님</span></p>
                        <a style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="logout.php">로그아웃</a>
                    </div>
                </div>
            </header>
        </div>
        <div class="main_screen">
            <div class="main1">
                <div class="main_text_box">
                    <h1>당신의<br> 아이디어를 코드로,<br> 코드를 결과로.</h1>
                    <p>프론트엔드 코드 실험실. 당신만의 화면을 구현해보세요.</p>
                    <div class="main_bt_box">
                        <button>코드 구경하기</button>
                        <button>코드 올리기</button>
                    </div>
                </div>
            </div>
            <div class="main2">
                <div class="main2_con">
                    <h1>< <span class="main2_text_ani"></span> <span class="main2_text_ani_stick"></span>></h1>
                </div>
            </div>
        </div>
    </div>
    <script src="web.js"></script>
</body>
</html>