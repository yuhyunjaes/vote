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
                            <a href="make_code.php">작업실</a>
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

                        <?php
                            if($id !== 0) {
                                $nick_select_sql = "SELECT * FROM users WHERE userid = '$id'";
                                $nick_select_result = mysqli_query($conn, $nick_select_sql);
                                $nick_select_row = mysqli_fetch_assoc($nick_select_result);
                            }
                        ?>
                        <p style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>"><?php if($id !== 0) {echo$nick_select_row['nickname'];}?><span style="font-weight: 400;">님</span></p>
                        <a style="<?php if($id !== 0) {echo 'display: block;';} else {echo 'display: none;';}?>" href="logout.php">로그아웃</a>
                    </div>
                </div>
            </header>
        </div>