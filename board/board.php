<?php
    include dirname(__DIR__) . '/layout/header.php';
    include dirname(__DIR__) . '/db/dbconnect.php';
    include dirname(__DIR__) . '/board/board_page.php';
?>

<?php
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
  ?>

<main id="content" class="gov-content">
  <h2 class="page-title">공지사항</h2>

  <!-- 검색 영역 -->
  <section class="search-box" aria-label="게시판 검색">
    <form action="/board/board.php" method="get">
      <div class="search-row">
        <select name="search_type" class="form-select">
          <option value="board_title" <?php echo $search_type == 'board_title' ? 'selected' : '' ?>>제목</option>
          <option value="writer_nm" <?php echo $search_type == 'writer_nm' ? 'selected' : '' ?>>작성자</option>
        </select>

        <input type="text" name="keyword" value="<?php echo $keyword ?? ''; ?>" class="form-input" placeholder="검색어를 입력하세요">

        <button type="submit" class="btn btn-primary">검색</button>
      </div>
    </form>
  </section>

  <!-- 게시판 테이블 -->
  <table class="gov-table">
    <caption>공지사항 게시판 목록</caption>
    <thead>
      <tr>
        <th scope="col" style="width: 8%;">번호</th>
        <th scope="col">제목</th>
        <th scope="col" style="width: 12%;">작성자</th>
        <th scope="col" style="width: 12%;">작성일</th>
        <th scope="col" style="width: 10%;">조회</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $display_no = $total_row - $start_row;
        $select_query = "SELECT * FROM TB_BOARD {$search_where} ORDER BY reg_dt DESC LIMIT $start_row, $list_size ";
        $result = mysqli_query($conn, $select_query);
        while($row = mysqli_fetch_assoc($result)) {
            $board_no = $row['board_no'];
            $board_title = $row['board_title'];
            $writer_nm = $row['writer_nm'];
            $reg_dt = $row['reg_dt'];
            $view_cnt = $row['view_cnt'];
      ?>
      <tr>
        <td class="txt-center"><?php echo $display_no--; ?></td>
        <td class="txt-left">
          <a href="/board/board_view.php?no=<?php echo $board_no; ?>" onclick="view_cnt(event, <?php echo $board_no; ?>);" class="board-link"><?php echo $board_title; ?></a>
        </td>
        <td class="txt-center"><?php echo $writer_nm; ?></td>
        <td class="txt-center"><?php echo $reg_dt; ?></td>
        <td class="txt-center"><?php echo $view_cnt; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- 하단 버튼 -->
  <div class="board-footer">
    <div class="left-area">
      <span class="total">전체 <strong><?php echo $total_row; ?></strong>건</span>
    </div>
    <div class="right-area">
      <a href="/board/board_write.php" class="btn btn-primary">글쓰기</a>
    </div>
  </div>

  <nav class="paging" aria-label="게시판 페이지 이동">
    <!-- 첫 페이지 -->
    <?php if ($page > 1): ?>
      <a href="?page=<?php echo pageLink($first_page, $searchQuery); ?>" class="page first" aria-label="첫 페이지">«</a>
    <?php else: ?>
      <a href="#" class="page first is-disabled" aria-label="첫 페이지">«</a>
    <?php endif; ?>

    <!-- 이전 블록 -->
    <?php if ($prev_block_page >= 1): ?>
      <a href="<?php echo pageLink($prev_block_page, $searchQuery); ?>" class="page prev" aria-label="이전 페이지">‹</a>
    <?php else: ?>
      <a href="#" class="page prev is-disabled" aria-label="이전 페이지">‹</a>
    <?php endif; ?>

    <!-- 페이지 번호(블록 범위만) -->
    <?php for ($i = $block_start; $i <= $block_end; $i++): ?>
      <a
        href="<?php echo pageLink($i, $searchQuery); ?>"
        class="page <?php echo ($i == $page) ? 'active' : ''; ?>"
        <?php echo ($i == $page) ? 'aria-current="page"' : ''; ?>
      >
        <?php echo $i; ?>
      </a>
    <?php endfor; ?>

    <!-- 다음 블록 -->
    <?php if ($next_block_page <= $total_page): ?>
      <a href="<?php echo pageLink($next_block_page, $searchQuery); ?>" class="page next" aria-label="다음 페이지">›</a>
    <?php else: ?>
      <a href="#" class="page next is-disabled" aria-label="다음 페이지">›</a>
    <?php endif; ?>

    <!-- 마지막 페이지 -->
    <?php if ($page < $total_page): ?>
      <a href="<?php echo pageLink($last_page, $searchQuery); ?>" class="page last" aria-label="마지막 페이지">»</a>
    <?php else: ?>
      <a href="#" class="page last is-disabled" aria-label="마지막 페이지">»</a>
    <?php endif; ?>
  </nav>
</main>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>