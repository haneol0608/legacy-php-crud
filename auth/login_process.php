<?php
    include dirname(__DIR__) . '/db/dbconnect.php';
    
    // Post -> user_id, user_pw
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];

    // HTML required 대체!!
    // if($user_id === '' || $user_pw === '') {
    //     exit("<script>alert('아이디와 비밀번호를 입력해주세요!!'); history.back();</script>");
    // }
    
    // ID 존재여부 체크
    $select_id_query = "SELECT * FROM TB_USER WHERE user_id = '$user_id' LIMIT 1 ";
    $id_result = mysqli_query($conn, $select_id_query);
    $id_row = mysqli_num_rows($id_result);
    if($id_row > 0) { // ID 존재 시 조건문 (-> 비밀번호 받기)
        $row = mysqli_fetch_assoc($id_result);
        $user_hash_pw = $row['user_pw']; // DB 저장된 비번

        // Form 받은 비밀번호, DB Hash 된 비밀번호 체크
        if(password_verify($user_pw, $user_hash_pw)) {
            session_start(); // 서버세션 시작
            $_SESSION['login_status'] = 'true'; // Login 상태
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_nm'] = $row['user_nm'];
            $_SESSION['reg_dt'] = $row['reg_dt'];
            $_SESSION['upd_dt'] = $row['upd_dt'];

            exit("<script>alert('로그인 완료!'); location.href='/';</script>");
        }
    }
    exit("<script>alert('아이디 또는 비밀번호가 올바르지 않습니다.'); history.back();</script>");