<?php
    /****************************** 페이징 기능 *********************************/
    // 1. 현재 페이지 계산( * 없으면 1페이지, 있으면 GET)
    // $_GET에 page(URL : ?page=) 존재하는 지 검사
    // ?(참 일 때 = page존재할 때) $page = $_GET['page'] 선언
    // :(거짓 일 때 = page없을 때) $page = 1 선언
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page < 1) $page = 1; // 페이지가 1보다 작을 때 무조건 1로 고정
    
    // 2.0. 1페이지 당 글 수
    $list_size = 10;

    // 2.1. 검색 파라미터 추가
    $search_type = $_GET['search_type'] ?? 'title';
    $keyword = $_GET['keyword'] ?? '';

    // 2.2. 검색 WHERE절 만들기
    $search_where = "";
    if ($search_type == 'board_title') {
        $search_where = "WHERE board_title LIKE '%$keyword%'";
    }
    if ($search_type == 'writer_nm') {
        $search_where = "WHERE writer_nm LIKE '%$keyword%'";
    }
    
    // 3. 전체 데이터 수 조회
    $select_total_query = "SELECT COUNT(*) AS total_row FROM TB_BOARD $search_where";
    $total_result = mysqli_query($conn, $select_total_query);
    $total_row = mysqli_fetch_assoc($total_result)['total_row'];

    // 4. 총 페이지 수 계산 (전체 데이터 수 / 1페이지 당 글 수)
    $total_page = ceil($total_row / $list_size);

    // 5. 데이터 조회 (SQL LIMIT 절 적용)
    $start_row = ($page - 1) * $list_size;
    /***********************************************************************************/

    /* 페이징 네비게이션 */
    // 1. 페이지 블록계산
    $block_size = 10; // 페이지 번호를 10개씩만 표시
    
    // 현재 블록의 시작 페이지 번호
    /* 
        - 수학적 계산 : $page가 3이면 ( (3-1) / 10 ) * 10 ) + 1 = 3이다.
        - 이 경우 프로그래밍적 계산 시 int()를 처리할 때 소수점 아래를 버림(floor)
        [계산결과]
            (page - 1) : 3-1 = 2
            2 / 10 : 0.2
            int(0.2) : 소수점을 버리므로 0이 됩니다. (이 부분이 핵심입니다!)
            0 * 10 : 0 x 10 = 0
            0 + 1 : 최종결과는 1
    */
    $block_start = (int)(floor(($page - 1) / $block_size) * $block_size) + 1;
    
    // 끝 블록의 페이지
    $block_end = $block_start + $block_size - 1;
    if ($block_end > $total_page) $block_end = $total_page;

    // 2.블록 단위 이동용 페이지
    $prev_block_page = $block_start - 1;   // 이전 블록의 마지막 페이지
    $next_block_page = $block_end + 1;     // 다음 블록의 첫 페이지

    // 3.블록 단위 first/last
    $first_page = 1;
    $last_page = $total_page;

    // 4. 링크 검색조건 유지
    $searchQuery = [
        'search_type' => $search_type,
        'keyword' => $keyword
    ];
    function pageLink($page, $searchQuery) {
        $searchQuery['page'] = $page; // 클릭한 페이지로 변경
        return '?' . http_build_query($searchQuery); // 배열, 객체를 URL문자열로 변경
    }
