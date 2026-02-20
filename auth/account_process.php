<?php
    include dirname(__DIR__) . '/db/dbconnect.php';

    $account_status = $_POST['account_status'] ?? '';

    if($account_status == '계정정보 수정') {
        $user_id = $_POST['user_id'];
        $user_nm = $_POST['user_nm'];
        $email_addr = $_POST['email_addr'];
        $phone_no = $_POST['phone_no'];
        $upd_dt = date('Y-m-d H:i:s');

        // 필수 데이터 체크
        if ($user_nm === '' || $email_addr === '') {
            exit("<script>alert('필수 데이터를 입력해주세요.'); history.back();</script>");
        }
        // 형식 체크
        if (!preg_match('/^[가-힣]{2,5}$/u', $user_nm)) {
            exit('<script>alert("이름은 한글 2~5자만 입력 가능합니다."); history.back();</script>');
        }
        if (!filter_var($email_addr, FILTER_VALIDATE_EMAIL)) {
            exit("<script>alert('이메일 형식이 올바르지 않습니다.'); history.back();</script>");
        }

        $update_query = "UPDATE TB_USER SET ";
        $update_query .= "user_nm = '$user_nm', ";
        $update_query .= "email_addr = '$email_addr', ";
        $update_query .= "phone_no = '$phone_no', ";
        $update_query .= "upd_dt = '$upd_dt' ";
        $update_query .= "WHERE user_id = '$user_id' ";

        $result = mysqli_query($conn, $update_query);
        if($result) {
            echo "<script>
                alert('내 정보 수정을 완료했습니다!');
                location.href = '../auth/account.php';
            </script>"; 
        } else {
            echo "<script>
                    alert('정보를 다시 확인해주세요!!');
                    location.href = '../auth/account.php';
            </script>";
            echo '데이터 등록이 안됨!!' . mysqli_error($conn);
        }
    }
    
    if($account_status == '비밀번호 수정') {
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];
        $user_pw2 = $_POST['user_pw2'];
        $user_pw3 = $_POST['user_pw3'];
        $upd_dt = date('Y-m-d H:i:s');

        // 필수 데이터 체크
        if ($user_pw === '' || $user_pw2 === ''|| $user_pw3 === '') {
            exit("<script>alert('필수 데이터를 입력해주세요.'); history.back();</script>");
        }

        // 새 비밀번호와 비밀번호 확인 일치 체크
        if ($user_pw2 !== $user_pw3) {
            exit("<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>");
        } else {
            $user_pw2 = password_hash($_POST['user_pw2'], PASSWORD_DEFAULT);
        }

        // 현재 비밀번호 체크
        $select_pw_query = "SELECT * FROM TB_USER WHERE user_id = '$user_id' LIMIT 1 ";
        $pw_result = mysqli_query($conn, $select_pw_query);
        $pw_row = mysqli_num_rows($pw_result);
        if($pw_row > 0) {
            $row = mysqli_fetch_assoc($pw_result);
            $user_hash_pw = $row['user_pw'];

            // Post 비밀번호, DB Hash 된 비밀번호 체크
            if(password_verify($user_pw, $user_hash_pw)) { // 일치 시 Update쿼리 실행
                $update_query = "UPDATE TB_USER SET ";
                $update_query .= "user_pw = '$user_pw2', ";
                $update_query .= "upd_dt = '$upd_dt' ";
                $update_query .= "WHERE user_id = '$user_id' ";
            
                $result = mysqli_query($conn, $update_query);
                if($result) {
                    echo "<script>
                        alert('내 비밀번호 수정을 완료했습니다!');
                        location.href = '../auth/account.php';
                    </script>"; 
                } else {
                    echo "<script>
                            alert('비밀번호를 다시 확인해주세요!!');
                            location.href = '../auth/account.php';
                    </script>";
                    echo '데이터 등록이 안됨!!' . mysqli_error($conn);
                }
            } else {
                exit("<script>alert('저장된 비밀번호가 일치하지 않습니다.'); history.back();</script>");
            }
        }

    }

    if($account_status == '회원탈퇴') {
        $user_id = $_POST['user_id'];
        $user_pw = $_POST['user_pw'];
        $confirm_withdraw = $_POST['confirm_withdraw'];

        // 비밀번호 체크
        if ($user_pw === '') {
            exit("<script>alert('비밀번호를 입력해주세요.'); history.back();</script>");
        }
        // 안내사항 체크
        if ($confirm_withdraw === '') {
            exit("<script>alert('안내사항을 확인해주세요.'); history.back();</script>");
        }
        
        // Hidden Post한 아이디 유/무확인
        $select_withdraw_query = "SELECT * FROM TB_USER WHERE user_id = '$user_id' ";
        $result_withdraw = mysqli_query($conn, $select_withdraw_query);
        $row_withdraw = mysqli_num_rows($result_withdraw);
        if($row_withdraw > 0) {
            $row = mysqli_fetch_assoc($result_withdraw);
            $user_hash_pw = $row['user_pw'];

            // Post한 비밀번호와 DB 저장된 비밀번호 확인
            if(password_verify($user_pw, $user_hash_pw)) {
                // 삭제문 ( * 아이디는 중복이 안되게 설정함!! )
                $delete_query = "DELETE FROM TB_USER WHERE user_id = '$user_id' ";
                $result = mysqli_query($conn, $delete_query);
                if($result) {
                    session_start();
                    session_destroy();
                    echo "<script>
                        alert('내 계정삭제를 완료했습니다!');
                        location.href = '/index.php';
                    </script>"; 
                    exit;
                } else {
                    echo "<script>
                            alert('비밀번호를 다시 확인해주세요!!');
                            location.href = '../auth/account.php';
                    </script>";
                    echo '데이터 등록이 안됨!!' . mysqli_error($conn);
                }
            } else {
                exit("<script>alert('해당 계정의 비밀번호가 일치하지 않습니다.'); history.back();</script>");
            }
        }
    }