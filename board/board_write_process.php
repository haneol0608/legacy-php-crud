<?php
    include dirname(__DIR__) . '/db/dbconnect.php';

    // Post 값
    // board_type_cd - 게시판유형코드(Default : FREE)
    // notice_yn - 공지글 여부(Default : N)
    // secret_yn - 비밀글 여부(Default : N)
    // reg_dt - 등록일시(Default : 현재날짜/시간)
    $board_title = $_POST['board_title'] ?? '';
    $writer_id = $_POST['writer_id'];
    $writer_nm = $_POST['writer_nm'];
    $board_content = $_POST['board_content'] ?? '';
    $reg_dt = date('Y-m-d H:i:s');

    // 필수 데이터 체크
    if ($board_title === '' || $board_content === '') {
        exit("<script>alert('필수 데이터를 입력해주세요.'); history.back();</script>");
    }

    // Insert 문
    $insert_query = "INSERT INTO TB_BOARD SET ";
    $insert_query .= "board_title = '$board_title', ";
    $insert_query .= "writer_id = '$writer_id', ";
    $insert_query .= "writer_nm = '$writer_nm', ";
    $insert_query .= "board_content = '$board_content' ";

    // Query문 실행
    $result = mysqli_query($conn, $insert_query);
    if($result) {
            echo "<script>
                alert('공지사항을 등록했습니다!');
                location.href = '../board/board.php';
            </script>"; 
    } else {
        echo "<script>
                alert('정보를 다시 확인해주세요!!');
                location.href = '../board/board.php';
        </script>";
        echo '데이터 등록이 안됨!!' . mysqli_error($conn);
    }
