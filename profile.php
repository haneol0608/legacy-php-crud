<?php
    include 'layout/header.php';
    include 'db/dbconnect.php';
?>
<main id="content" class="gov-content">
  <h2 class="page-title">포트폴리오 소개</h2>

  <!-- 히어로/요약 -->
  <section class="pf-hero" aria-label="프로젝트 요약">
    <div class="pf-hero-head">
      <h3 class="pf-title">Legacy CRUD System</h3>
      <p class="pf-sub">
        레거시 PHP + jQuery 기반으로 인증/계정관리/게시판 CRUD를 구현한 포트폴리오 프로젝트입니다.
      </p>
    </div>

    <dl class="pf-meta">
      <div class="pf-meta-row">
        <dt>기간</dt>
        <dd>2026.01 ~ 2026.02 (예시)</dd>
      </div>
      <div class="pf-meta-row">
        <dt>역할</dt>
        <dd>기획 · 화면설계 · DB 설계 · CRUD 구현</dd>
      </div>
      <div class="pf-meta-row">
        <dt>구현 범위</dt>
        <dd>로그인/회원가입/계정관리(내 정보·비번 변경·탈퇴), 공지사항(검색·목록·상세·작성·수정·삭제)</dd>
      </div>
      <div class="pf-meta-row">
        <dt>비고</dt>
        <dd><span class="pill">이전/다음</span> <span class="pill">파일 업로드</span> 기능은 UI만 제공</dd>
      </div>
    </dl>

    <div class="pf-actions">
      <a class="btn btn-primary" href="/board/board.php">공지사항 바로가기</a>
      <a class="btn btn-secondary" href="/auth/account.php">계정관리 바로가기</a>
    </div>
  </section>

  <!-- 핵심 기능 -->
  <section class="pf-section" aria-label="핵심 기능">
    <h3 class="pf-h3">핵심 기능</h3>

    <div class="pf-grid">
      <article class="pf-card">
        <h4 class="pf-card-title">인증</h4>
        <ul class="pf-list">
          <li>로그인/로그아웃</li>
          <li>세션 기반 인증 흐름</li>
          <li>접근 권한(페이지 진입 제어)</li>
        </ul>
      </article>

      <article class="pf-card">
        <h4 class="pf-card-title">계정관리</h4>
        <ul class="pf-list">
          <li>내 정보 수정</li>
          <li>비밀번호 변경</li>
          <li>회원탈퇴(확인 절차)</li>
        </ul>
      </article>

      <article class="pf-card">
        <h4 class="pf-card-title">공지사항 CRUD</h4>
        <ul class="pf-list">
          <li>검색(제목/작성자)</li>
          <li>목록/상세/작성/수정/삭제</li>
          <li>조회수 증가(상세 진입)</li>
        </ul>
      </article>

      <article class="pf-card">
        <h4 class="pf-card-title">UI/접근성</h4>
        <ul class="pf-list">
          <li>공공기관 톤(표/폼/버튼)</li>
          <li>라벨/캡션/포커스 처리</li>
          <li>반응형 기본 대응</li>
        </ul>
      </article>
    </div>
  </section>

  <!-- 기술 스택 -->
  <section class="pf-section" aria-label="기술 스택">
    <h3 class="pf-h3">기술 스택</h3>

    <div class="stack">
      <span class="tag">PHP (Legacy)</span>
      <span class="tag">MySQL</span>
      <span class="tag">HTML5</span>
      <span class="tag">CSS3</span>
      <span class="tag">JavaScript</span>
      <span class="tag">jQuery</span>
    </div>

    <div class="pf-note" role="note">
      <strong>설계 포인트</strong>
      <p>
        화면은 include 기반 레이아웃(header/footer)을 사용하고,
        처리 로직은 별도 process 파일로 분리하여 유지보수성을 높였습니다.
      </p>
    </div>
  </section>

  <!-- 구현 포인트(코드 없이 설명) -->
  <section class="pf-section" aria-label="구현 포인트">
    <h3 class="pf-h3">구현 포인트</h3>

    <div class="pf-accordion">
      <details open>
        <summary>1) 인증/권한 흐름</summary>
        <div class="pf-detail">
          <p>비로그인 사용자는 로그인 페이지로 유도하고, 로그인 후에는 세션 정보를 기반으로 메뉴/페이지 접근을 제어합니다.</p>
        </div>
      </details>

      <details>
        <summary>2) CRUD 흐름(공지사항)</summary>
        <div class="pf-detail">
          <p>검색 → 목록 → 상세 → 작성/수정/삭제의 흐름을 구현하고, 상세 진입 시 조회수 처리 로직을 포함합니다.</p>
        </div>
      </details>

      <details>
        <summary>3) 계정관리 UX</summary>
        <div class="pf-detail">
          <p>내 정보/비밀번호 변경/탈퇴를 탭으로 분리하여 사용성을 높였고, 오류 발생 시 해당 탭을 유지할 수 있도록 URL 해시 기반 전환을 고려했습니다.</p>
        </div>
      </details>

      <details>
        <summary>4) 미구현 기능 처리(UI Only)</summary>
        <div class="pf-detail">
          <p>이전/다음, 파일 업로드는 버튼 비활성 처리 및 안내문구로 명시해 포트폴리오 범위를 명확히 했습니다.</p>
        </div>
      </details>
    </div>
  </section>

  <!-- 화면 목록(바로가기) -->
  <section class="pf-section" aria-label="화면 목록">
    <h3 class="pf-h3">화면 구성</h3>

    <div class="screen-grid" role="list">
      <a class="screen-item" role="listitem" href="/auth/login.php">
        <strong>로그인</strong><span>login.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/auth/sign.php">
        <strong>회원가입</strong><span>sign.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/auth/account.php">
        <strong>계정관리</strong><span>account.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/board/board.php">
        <strong>공지사항 목록</strong><span>board.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/board/board_write.php">
        <strong>게시글 작성</strong><span>board_write.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/board/board_view.php?no=1">
        <strong>게시글 상세</strong><span>board_view.php</span>
      </a>
      <a class="screen-item" role="listitem" href="/board/board_edit.php?no=1">
        <strong>게시글 수정</strong><span>board_edit.php</span>
      </a>
      <a class="screen-item is-disabled" role="listitem" href="#" aria-disabled="true">
        <strong>파일 업로드</strong><span>UI Only</span>
      </a>
    </div>
  </section>
</main>

<?php include 'layout/footer.php'; ?>
