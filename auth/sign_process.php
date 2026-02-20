<?php
    include dirname(__DIR__) . '/db/dbconnect.php';
    
    $user_nm = $_POST['user_nm'];
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $user_pw2 = $_POST['user_pw2'];
    $email_addr = $_POST['email_addr'];
    $phone_no = $_POST['phone_no'];
    $reg_dt = date('Y-m-d H:i:s');
    
    // 필수 데이터 체크
    if ($user_nm === '' || $user_id === '' || $user_pw === '' || $email_addr === '') {
        exit("<script>alert('필수 데이터를 입력해주세요.'); history.back();</script>");
    }
    // 비밀번호 일치 체크
    if ($user_pw !== $user_pw2) {
        exit("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
    } else {
        $user_pw = password_hash($_POST['user_pw'], PASSWORD_DEFAULT);
    }
    // 형식 체크 (-> 아이디 규칙, 이메일 형식)
    if (!preg_match('/^[a-zA-Z0-9]{4,20}$/', $user_id)) {
        exit("<script>alert('아이디는 영문/숫자 4~20자입니다.'); history.back();</script>");
    }
    if (!filter_var($email_addr, FILTER_VALIDATE_EMAIL)) {
        exit("<script>alert('이메일 형식이 올바르지 않습니다.'); history.back();</script>");
    }
    // 아이디 중복체크
    $select_id_query = "SELECT * FROM TB_USER WHERE user_id = '$user_id' LIMIT 1 ";
    $id_result = mysqli_query($conn, $select_id_query);
    $id_row = mysqli_num_rows($id_result);
    if($id_row > 0) {
        exit("<script>alert('이미 사용 중인 아이디입니다.'); history.back();</script>");
    }
    // 이메일 중복체크
    $select_email_query = "SELECT * FROM TB_USER WHERE email_addr = '$email_addr' LIMIT 1 ";
    $email_result = mysqli_query($conn, $select_email_query);
    $email_row = mysqli_num_rows($email_result);
    if($email_row > 0) {
        exit("<script>alert('이미 사용 중인 이메일입니다.'); history.back();</script>");
    }

    // Insert 문
    $insert_query = "INSERT INTO TB_USER SET ";
    $insert_query .= "user_nm = '$user_nm', ";
    $insert_query .= "user_id = '$user_id', ";
    $insert_query .= "user_pw = '$user_pw', ";
    $insert_query .= "email_addr = '$email_addr', ";
    $insert_query .= "phone_no = '$phone_no', ";
    $insert_query .= "reg_dt = '$reg_dt' ";

    // Query문 실행
    $result = mysqli_query($conn, $insert_query);
    if($result) {
            echo "<script>
                alert('회원가입을 완료했습니다!');
                location.href = '../auth/sign.php';
            </script>"; 
    } else {
        echo "<script>
                alert('정보를 다시 확인해주세요!!');
                location.href = '../auth/sign.php';
        </script>";
        echo '데이터 등록이 안됨!!' . mysqli_error($conn);
    }