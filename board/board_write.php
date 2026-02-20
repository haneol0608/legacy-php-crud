<?php
    include dirname(__DIR__) . '/layout/header.php';
    include dirname(__DIR__) . '/db/dbconnect.php';
?>

<main id="content" class="gov-content">
  <h2 class="page-title">공지사항</h2>

  <section class="write-box" aria-label="게시글 작성">
    <header class="write-head">
      <h3 class="section-title">게시글 작성</h3>
      <p class="help-text">
        필수 항목(<span class="req" aria-hidden="true">*</span>)을 입력해 주세요.
      </p>
    </header>

    <form class="form-box" action="/board/board_write_process.php" method="post" enctype="multipart/form-data" novalidate>
      <!-- 서버에서 에러 메시지 출력 위치 -->
      <div class="form-alert" role="alert" aria-live="polite"></div>

      <div class="form-row">
        <label class="form-label" for="board_title">제목 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="board_title" name="board_title" type="text" maxlength="200" required />
        <p class="hint">최대 200자까지 입력 가능합니다.</p>
      </div>

      <div class="form-row">
        <label class="form-label" for="writer_nm">작성자</label>
        <input class="form-input" id="writer_nm" name="writer_nm" type="text" readonly value="<?php echo $_SESSION['user_nm']; ?>" />
        <input type="hidden" name="writer_id" name="write_id" value="<?php echo $_SESSION['user_id']; ?>">
        <p class="hint">작성자는 로그인 정보 기준으로 자동 입력됩니다.</p>
      </div>

      <div class="form-row">
        <label class="form-label" for="board_content">내용 <span class="req" aria-hidden="true">*</span></label>
        <textarea class="form-textarea" id="board_content" name="board_content" rows="12" required></textarea>
        <p class="hint">개인정보(주민번호/계좌번호 등) 입력에 주의해 주세요.</p>
      </div>

      <fieldset class="fieldset">
        <legend class="legend">첨부파일</legend>

        <div class="form-row">
          <label class="form-label" for="files">파일 선택</label>
          <input class="form-file" id="files" name="files[]" type="file" multiple />
          <p class="hint">
            최대 N개 / 파일당 최대 NMB 
          </p>
        </div>

        <!-- 선택 파일 목록(클라이언트 표시용) -->
        <div class="file-list" aria-label="선택된 파일 목록">
          <p class="file-empty">선택된 파일이 없습니다.</p>
          <ul class="file-items" hidden></ul>
        </div>
      </fieldset>

      <div class="btn-area">
        <button class="btn btn-primary" type="submit">등록</button>
        <a class="btn btn-secondary" href="/board/board.php">취소</a>
      </div>
    </form>
  </section>
</main>

<!-- <script>
  // 선택한 파일 목록 표시 (선택 사항)
  (function () {
    const input = document.getElementById('files');
    const empty = document.querySelector('.file-empty');
    const list = document.querySelector('.file-items');

    if (!input || !empty || !list) return;

    input.addEventListener('change', function () {
      const files = Array.from(input.files || []);
      list.innerHTML = '';

      if (files.length === 0) {
        empty.hidden = false;
        list.hidden = true;
        return;
      }

      files.forEach(f => {
        const li = document.createElement('li');
        li.textContent = f.name + ' (' + Math.round(f.size / 1024) + 'KB)';
        list.appendChild(li);
      });

      empty.hidden = true;
      list.hidden = false;
    });
  })();
</script> -->

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>