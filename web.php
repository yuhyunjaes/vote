<?php
    include('second/start.php');
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
                <a href="#" class="side_menu_body_menu_box">
                    <p>코드 갤러리</p>
                </a>
                <a href="#" class="side_menu_body_menu_box">
                    <p>이야기방</p>
                </a>
                <a href="#" class="side_menu_body_menu_box">
                    <p>작업실</p>
                </a>
                <a href="#" class="side_menu_body_menu_box">
                    <p>마이페이지</p>
                </a>
            </div>
        </div>

        <?php
            include('second/header.php');
        ?>

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