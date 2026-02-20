<?php
    include dirname(__DIR__) . '/db/dbconnect.php';

    $board_no = $_POST['board_no'];
    $board_title = $_POST['board_title'] ?? '';
    $board_content = $_POST['board_content'] ?? '';
    $upd_dt = date('Y-m-d H:i:s');

    // 필수 데이터 체크
    if ($board_title === '' || $board_content === '') {
        exit("<script>alert('필수 데이터를 입력해주세요.'); history.back();</script>");
    }

    // Update 문
    $update_query = "UPDATE TB_BOARD SET ";
    $update_query .= "board_title = '$board_title', ";
    $update_query .= "board_content = '$board_content', ";
    $update_query .= "upd_dt = '$upd_dt' ";
    $update_query .= "WHERE board_no = '$board_no' ";

    $result = mysqli_query($conn, $update_query);
    if($result) {
        echo "<script>
            alert('공지사항 수정을 완료했습니다!');
            location.href = '../board/board_view.php?no=$board_no';
        </script>"; 
    } else {
        echo "<script>
                alert('정보를 다시 확인해주세요!!');
                location.href = '../board/board_edit.php?no=$board_no';
        </script>";
        echo '데이터 등록이 안됨!!' . mysqli_error($conn);
    }