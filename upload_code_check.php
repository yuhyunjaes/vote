<?php
    include('second/start.php');

    if($id === 0) {
        echo"
        <script>
            alert('로그인이 필요한 페이지 입니다.');
            location = 'signin.php';
        </script>
        ";
        exit;
    }

    $html = isset($_POST['html_code']) ? $_POST['html_code']:null;
    $css = isset($_POST['css_code']) ? $_POST['css_code']:null;
    $js = isset($_POST['js_code']) ? $_POST['js_code']:null;

    if(empty($html) || empty($css) && empty($js)) {
        echo"
        <script>
            alert('HTML과 CSS코드는 반드시 코드가 있어야 합니다.');
            history.back();
        </script>
        ";
        exit;
    }
    $stmt = $conn -> prepare("INSERT INTO web_file (user_id, html, css, js) VALUES (?, ?, ?, ?)");
    $stmt -> bind_param('ssss', $id, $html, $css, $js);
    
    if ($stmt->execute()) {
        echo "
            <script>
                alert('코드가 정상적으로 업로드 되었습니다.');
                location = 'make_code.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('코드 등록에 실패 하였습니다.');
                history.back();
            </script>
        ";
    }
    

?>