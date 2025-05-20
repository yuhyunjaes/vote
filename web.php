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
                            <a href="#">전체 투표</a>
                        </li>
                        <li>
                            <a href="#">투표 만들기</a>
                        </li>
                        <li>
                            <a href="#">내 투표</a>
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

                        <a style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="#"><?php echo$id?></a>
                        <a style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="logout.php">로그아웃</a>
                    </div>
                </div>
            </header>
        </div>
        <div class="main_screen">
            <div class="main1">
                <div class="main_text_box">
                    <h1>모두의 선택<br>지금 시작해보세요.</h1>
                    <p>당신의 질문, 모두의 선택. 찍어봐요에서 답을 찾아보세요.</p>
                    <div class="main_bt_box">
                        <button>투표하러 가기</button>
                        <button>투표 만들기</button>
                    </div>
                </div>
            </div>
            <div class="main2">
                <img src="image/pngtree-balance-icon-png-image_1770312.jpg" alt="">
            </div>
        </div>
    </div>
</body>
</html>