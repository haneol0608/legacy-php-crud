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
?>

<main id="content" class="gov-content">
  <h2 class="page-title">공지사항</h2>

  <section class="write-box" aria-label="게시글 수정">
    <header class="write-head">
      <h3 class="section-title">게시글 수정</h3>
      <p class="help-text">
        필수 항목(<span class="req" aria-hidden="true">*</span>)을 입력해 주세요.
      </p>
    </header>

    <form class="form-box" action="/board/board_edit_process.php" method="post" enctype="multipart/form-data" novalidate>
      <input type="hidden" name="board_no" value="<?php echo $board_no; ?>" />

      <!-- 서버에서 에러/성공 메시지 출력 위치 -->
      <div class="form-alert" role="alert" aria-live="polite"></div>

      <div class="form-row">
        <label class="form-label" for="title">제목 <span class="req" aria-hidden="true">*</span></label>
        <input
          class="form-input"
          id="title"
          name="board_title"
          type="text"
          maxlength="200"
          required
          value="<?php echo $board_title; ?>"
        />
        <p class="hint">최대 200자까지 입력 가능합니다.</p>
      </div>

      <div class="form-row">
        <label class="form-label" for="writer">작성자</label>
        <input
          class="form-input"
          id="writer"
          name="writer_nm"
          type="text"
          readonly
          value="<?php echo $writer_nm; ?>"
        />
      </div>

      <div class="form-row">
        <label class="form-label" for="content">내용 <span class="req" aria-hidden="true">*</span></label>
        <textarea class="form-textarea" id="content" name="board_content" rows="12" required>
            <?php echo $board_content; ?>
        </textarea>
        <p class="hint">개인정보(주민번호/계좌번호 등) 입력에 주의해 주세요.</p>
      </div>

      <!-- 기존 첨부파일 -->
      <fieldset class="fieldset">
        <legend class="legend">기존 첨부파일</legend>

        <!-- 첨부파일이 있을 때 -->
        <ul class="attach-edit-list" aria-label="기존 첨부파일 목록">
          <li class="attach-edit-item">
            <label class="chk">
              <input type="checkbox" name="del_files[]" value="<!-- 파일ID 또는 파일명 -->" />
              <span>삭제</span>
            </label>

            <a class="attach-link" href="#" target="_blank" rel="noopener">
              첨부파일_예시.pdf
            </a>
            <span class="attach-size">(320KB)</span>
          </li>

          <li class="attach-edit-item">
            <label class="chk">
              <input type="checkbox" name="del_files[]" value="<!-- 파일ID 또는 파일명 -->" />
              <span>삭제</span>
            </label>

            <a class="attach-link" href="#" target="_blank" rel="noopener">
              안내문_예시.hwp
            </a>
            <span class="attach-size">(1.2MB)</span>
          </li>
        </ul>

        <!-- 첨부파일이 없을 때 -->
        <!-- <p class="attach-empty">첨부파일이 없습니다.</p> -->

        <p class="hint">삭제할 파일에 체크 후 저장하면 해당 파일이 삭제됩니다.</p>
      </fieldset>

      <!-- 새 첨부파일 추가 -->
      <fieldset class="fieldset">
        <legend class="legend">첨부파일 추가</legend>

        <div class="form-row">
          <label class="form-label" for="files">파일 선택</label>
          <input class="form-file" id="files" name="files[]" type="file" multiple />
          <p class="hint">최대 N개 / 파일당 최대 NMB (서버 정책에 맞게 안내 문구 수정)</p>
        </div>

        <!-- 선택 파일 목록(클라이언트 표시용) -->
        <div class="file-list" aria-label="선택된 파일 목록">
          <p class="file-empty">선택된 파일이 없습니다.</p>
          <ul class="file-items" hidden></ul>
        </div>
      </fieldset>

      <div class="btn-area">
        <button class="btn btn-primary" type="submit">저장</button>
        <a class="btn btn-secondary" href="/board/board_view.php?no=<?php echo $board_no; ?>">취소</a>
      </div>
    </form>
  </section>
</main>

<script>
  // 새로 선택한 파일 목록 표시 (선택 사항)
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
</script>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>