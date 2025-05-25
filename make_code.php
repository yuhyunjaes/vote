<?php
    include('second/start.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="make_code.css">
</head>
<body>
    <div id="wrap"> 
        <?php
            include('second/header.php');
        ?>

        <div class="main">
            <iframe id="preview"></iframe>
            <div class="main_container">
                <div class="select_lan"></div>
                <div id="container"></div>
            </div>
        </div>

        <div class="upload"></div>

    </div>

    <script src="https://unpkg.com/monaco-editor@latest/min/vs/loader.js"></script>
    <script src="make_code.js"></script>
</body>
</html>