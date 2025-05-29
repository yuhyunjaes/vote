<?php
    include('second/start.php');

    if($id === 0) {
        echo"
        <script>
            alert('로그인이 필요한 페이지 입니다.');
            location = 'signin.php';
        </script>
        ";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="make_code.css">
    <link rel="stylesheet" href="boot/bootstrap.css">
    <link rel="stylesheet" href="assets/fontawesome-free-6.7.2-web/css/all.min.css">
</head>
<body>
    <div id="wrap"> 
        <?php
            include('second/header.php');
        ?>

        <div class="main">
            <iframe id="preview"></iframe>
            <div class="main_container">
                <div class="select_lan">
                    <div id="language">
                      <button class="lan" value="javascript">JavaScript</button>
                      <button class="lan" value="html">HTML</button>
                      <button class="lan" value="css">CSS</button>
                    </div>
                </div>
                <div id="container"></div>
            </div>
        </div>

        <div class="upload">
            <div class="upload_box">
                <form action="upload_code_check.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo"$id";?>">

                    <input id="html_code" type="hidden" name="html_code">
                    <input id="css_code" type="hidden" name="css_code">
                    <input id="js_code" type="hidden" name="js_code">

                    <div class="sub_mit_box">
                        <button onclick="form3()" id="code_box" class="bg-primary" type="button"><i class="fa-solid fa-upload"></i> <span>저장된 코드 불러오기</span></button>
                        <button onclick="form4()" type="button" class="bg-danger" id="delete_data_box"><i class="fa-solid fa-trash"></i> <span>저장된 코드 삭제</span></button>
                        <button onclick="form1()" class="bg-primary" id="save_Code" type="button"><i class="fa-solid fa-floppy-disk"></i><span>코드 저장</span></button>
                        <button onclick="form2()" id="upload_Code" type="submit"><i class="fa-solid fa-download"></i><span>코드 업로드</span></button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
    <script src="make_code.js"></script>
</body>
</html>