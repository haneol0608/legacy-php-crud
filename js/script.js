function view_cnt(e, board_no) {
    e.preventDefault();

    var business_process = 'view_cnt';
    var board_no = board_no;

    $.ajax({
        url: '/business/business_process.php',
        type: 'POST',
        data: {
            board_no: board_no,
            business_process: business_process,
        },
        success: function (data) {
            // alert(data);
            // console.log(data);
            location.href = '/board/board_view.php?no=' + board_no;
        },
        error: function (data) {
            // alert(data);
            // console.log(data);
            location.href = '/board/board_view.php?no=' + board_no;
        }
    });
}
