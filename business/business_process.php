<?php
include dirname(__DIR__) . '/db/dbconnect.php';

$business_process = $_POST['business_process'];
$board_no = $_POST['board_no'];

if ($business_process == 'view_cnt') return view_cnt($conn, $board_no);

function view_cnt($conn, $board_no) {
    $update_query = "UPDATE TB_BOARD SET ";
    $update_query .= "view_cnt = view_cnt + 1 ";
    $update_query .= "WHERE board_no = '$board_no' ";

    $update_result = mysqli_query($conn, $update_query);
    if($update_result) {
        // echo "<script>
        //     alert('조회수 증가를 완료했습니다!');
        //     location.href = '../board/board_view.php?no=$board_no';
        // </script>"; 
    } else {
        // echo "<script>
        //         alert('조회수 증가를 다시 확인해주세요!!');
        //         location.href = '../board/board_edit.php?no=$board_no';
        // </script>";
        echo '데이터 등록이 안됨!!' . mysqli_error($conn);
    }
}

