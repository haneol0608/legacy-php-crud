<?php
    include dirname(__DIR__) . '/db/dbconnect.php';

    $board_no = $_POST['board_no'];
    
    // Delete문
    $delete_query = "DELETE FROM TB_BOARD WHERE board_no = '$board_no' ";
    $result = mysqli_query($conn, $delete_query);
    if($result) {
        echo "<script>
            alert('공지사항 삭제를 완료했습니다!');
            location.href = '../board/board.php';
        </script>"; 
    } else {
        echo "<script>
                alert('정보를 다시 확인해주세요!!');
                location.href = '../board/board.php';
        </script>";
        echo '데이터 등록이 안됨!!' . mysqli_error($conn);
    }