<?php
include dirname(__DIR__) . '/layout/header.php';
include dirname(__DIR__) . '/db/dbconnect.php';

// no를 받아서 DB 조회하기 
$board_no = isset($_GET['no']) ? (int)$_GET['no'] : 0;

// board_no 게시판 데이터 조회
$select_query = "SELECT * FROM TB_BOARD WHERE board_no = '$board_no' ";
$result = mysqli_query($conn, $select_query);
$row = mysqli_fetch_assoc($result);

$board_no = $row['board_no'];
$board_title = $row['board_title'];
$writer_nm = $row['writer_nm'];
$reg_dt = $row['reg_dt'];
$view_cnt = $row['view_cnt'];
$board_content = $row['board_content'];

$files = [
  ['name' => '첨부파일_예시.pdf', 'url' => '/upload/sample.pdf', 'size' => '320KB']
];

// 권한 예시(실제론 세션/권한 로직으로 제어)
$can_edit = true;
?>

<main id="content" class="gov-content">
  <h2 class="page-title">공지사항</h2>

  <!-- 게시글 헤더 -->
  <section class="view-box" aria-label="게시글 상세">
    <header class="view-head">
      <h3 class="view-title"><?php echo htmlspecialchars($board_title, ENT_QUOTES); ?></h3>

      <dl class="meta">
        <div class="meta-item">
          <dt>작성자</dt>
          <dd><?php echo htmlspecialchars($writer_nm, ENT_QUOTES); ?></dd>
        </div>
        <div class="meta-item">
          <dt>작성일</dt>
          <dd><?php echo htmlspecialchars($reg_dt, ENT_QUOTES); ?></dd>
        </div>
        <div class="meta-item">
          <dt>조회</dt>
          <dd><?php echo (int)$view_cnt; ?></dd>
        </div>
      </dl>
    </header>

    <!-- 첨부파일 -->
    <div class="attach" aria-label="첨부파일">
      <strong class="attach-label">첨부파일</strong>
      <?php if (!empty($files)) : ?>
        <ul class="attach-list">
          <?php foreach ($files as $f) : ?>
            <li>
              <a class="attach-link" href="<?php echo htmlspecialchars($f['url'], ENT_QUOTES); ?>">
                <?php echo htmlspecialchars($f['name'], ENT_QUOTES); ?>
              </a>
              <span class="attach-size">(<?php echo htmlspecialchars($f['size'], ENT_QUOTES); ?>)</span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else : ?>
        <p class="attach-empty">첨부파일이 없습니다.</p>
      <?php endif; ?>
    </div>

    <!-- 본문 -->
    <article class="view-body" aria-label="게시글 본문">
      <?php echo nl2br(htmlspecialchars($board_content, ENT_QUOTES)); ?>
    </article>
  </section>

  <!-- 하단 버튼 -->
  <div class="view-footer">
    <div class="left-area">
      <a href="/board/board.php" class="btn btn-secondary">목록</a>
    </div>

    <div class="right-area">
      <?php if ($can_edit) : ?>
        <a href="/board/board_edit.php?no=<?php echo (int)$board_no; ?>" class="btn btn-secondary">수정</a>
        
        <form action="/board/board_delete.php" method="post" class="inline-form"
              onsubmit="return confirm('정말 삭제하시겠습니까?');">
          <input type="hidden" name="board_no" value="<?php echo (int)$board_no; ?>">
          <button type="submit" class="btn btn-danger">삭제</button>
        </form>
      <?php endif; ?>
    </div>
  </div>

  <!-- 이전글/다음글 (옵션) -->
  <nav class="view-nav" aria-label="이전글 다음글">
    <div class="nav-row">
      <span class="nav-label">이전글</span>
      <a href="#" class="nav-link">이전 글 제목 예시</a>
    </div>
    <div class="nav-row">
      <span class="nav-label">다음글</span>
      <a href="#" class="nav-link">다음 글 제목 예시</a>
    </div>
  </nav>
</main>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>