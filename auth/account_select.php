<?php 
    include dirname(__DIR__) . '/db/dbconnect.php';

    $login_id = $_SESSION['user_id'] ?? '';
    if ($_SESSION['user_id'] === '') {
        exit("<script>alert('로그인이 필요합니다.'); location.href='/auth/login.php';</script>");
    }

    $select_query = "SELECT * FROM TB_USER WHERE user_id = '$login_id' ";
    $result = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result);

    if(!$row) {
        // 계정이 없으면 Session 초기화 후 이동
        session_destroy();
        exit("<script>alert('계정 정보를 찾을 수 없습니다. 다시 로그인 해주세요.'); location.href='/auth/login.php';</script>");
    }

    $user_nm = $row['user_nm'];
    $email_addr = $row['email_addr'];
    $phone_no = $row['phone_no'];