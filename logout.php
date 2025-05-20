<?php
session_start();

unset($_SESSION['user_id']);

echo"
<script>
    alert('로그아웃이 되었습니다.');
    location = 'web.php';
</script>
";
?>