<?php
    include 'layout/header.php';
    // include dirname(__DIR__) . '/db/dbconnect.php';
    include 'db/dbconnect.php';
?>
<!-- Main Content -->
<main id="content" class="gov-content">
  <h2 class="page-title">홈</h2>

  <!-- 안내 배너 -->
  <section class="notice-banner" role="note" aria-label="안내">
    <strong class="notice-title">포트폴리오 안내</strong>
    <p class="notice-text">
      본 시스템은 레거시 PHP + jQuery 기반 CRUD 포트폴리오입니다.
      일부 기능(이전/다음 이동, 파일 업로드, 대시보드)은 UI만 제공됩니다.
    </p>
  </section>

  <!-- KPI -->
  <section class="kpi-grid" aria-label="요약 현황">
    <article class="kpi-card">
      <h3 class="kpi-title">공지사항</h3>
      <p class="kpi-value">105</p>
      <p class="kpi-sub">전체 게시글 수</p>
    </article>

    <article class="kpi-card">
      <h3 class="kpi-title">최근 등록</h3>
      <p class="kpi-value">8</p>
      <p class="kpi-sub">최근 7일 기준</p>
    </article>

    <article class="kpi-card">
      <h3 class="kpi-title">내 활동</h3>
      <p class="kpi-value">3</p>
      <p class="kpi-sub">작성/수정 합계(예시)</p>
    </article>

    <article class="kpi-card">
      <h3 class="kpi-title">시스템</h3>
      <p class="kpi-value">정상</p>
      <p class="kpi-sub">DB/세션 상태(예시)</p>
    </article>
  </section>

  <!-- 대시보드 2열 -->
  <section class="dash-grid" aria-label="대시보드">
    <!-- 최근 공지 -->
    <section class="dash-card" aria-label="최근 공지사항">
      <div class="dash-head">
        <h3 class="dash-title">최근 공지사항</h3>
        <a href="./board/board.php" class="dash-more">전체보기</a>
      </div>

      <table class="mini-table">
        <caption class="sr-only">최근 공지사항 목록</caption>
        <thead>
          <tr>
            <th scope="col" style="width:70%;">제목</th>
            <th scope="col" style="width:30%;">작성일</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a class="list-link" href="./board/board_view.php?no=105">게시글 테스트 100</a></td>
            <td class="txt-center">2026-02-08</td>
          </tr>
          <tr>
            <td><a class="list-link" href="./board/board_view.php?no=104">게시글 테스트 50</a></td>
            <td class="txt-center">2026-02-08</td>
          </tr>
          <tr>
            <td><a class="list-link" href="./board/board_view.php?no=103">문의글 99</a></td>
            <td class="txt-center">2026-02-08</td>
          </tr>
          <tr>
            <td><a class="list-link" href="./board/board_view.php?no=102">게시글 테스트 49</a></td>
            <td class="txt-center">2026-02-08</td>
          </tr>
          <tr>
            <td><a class="list-link" href="./board/board_view.php?no=101">게시글 테스트 48</a></td>
            <td class="txt-center">2026-02-08</td>
          </tr>
        </tbody>
      </table>

      <div class="dash-foot">
        <a class="btn btn-primary" href="./board/board_write.php">글쓰기</a>

        <!-- 미구현: UI만 -->
        <button class="btn btn-secondary btn-disabled" type="button" aria-disabled="true" title="미구현 기능">
          이전/다음
        </button>
      </div>
    </section>

    <!-- 빠른 메뉴/계정 요약 -->
    <aside class="dash-card" aria-label="빠른 메뉴 및 계정">
      <div class="dash-head">
        <h3 class="dash-title">빠른 메뉴</h3>
      </div>

      <div class="quick-grid" role="list">
        <a class="quick-item" role="listitem" href="./board/board.php">
          <strong>공지사항</strong>
          <span>목록 이동</span>
        </a>
        <a class="quick-item" role="listitem" href="./auth/account.php">
          <strong>계정관리</strong>
          <span>내 정보/비번 변경</span>
        </a>
        <a class="quick-item" role="listitem" href="./auth/login.php">
          <strong>로그인</strong>
          <span>세션 시작</span>
        </a>
        <a class="quick-item" role="listitem" href="./auth/sign.php">
          <strong>회원가입</strong>
          <span>계정 생성</span>
        </a>
      </div>

      <div class="sub-card" aria-label="계정 요약">
        <h4 class="sub-title">계정 요약</h4>
        <dl class="mini-dl">
          <div class="mini-dl-row">
            <dt>상태</dt>
            <dd>로그인됨(예시)</dd>
          </div>
          <div class="mini-dl-row">
            <dt>권한</dt>
            <dd>일반 사용자</dd>
          </div>
          <div class="mini-dl-row">
            <dt>최근 접속</dt>
            <dd>2026-02-08 20:10</dd>
          </div>
        </dl>

        <div class="sub-actions">
          <a href="./auth/account.php" class="btn btn-secondary">계정관리</a>
          <a href="./auth/logout.php" class="btn btn-secondary">로그아웃</a>
        </div>
      </div>
    </aside>
  </section>

  <!-- 사용 가이드 + 업로드(UI only) -->
  <section class="dash-card" aria-label="시스템 사용 가이드">
    <div class="dash-head">
      <h3 class="dash-title">시스템 사용 가이드</h3>
    </div>

    <div class="guide-grid">
      <article class="guide-item">
        <h4 class="guide-title">1) 로그인</h4>
        <p class="guide-text">상단 메뉴에서 로그인 후 공지사항 글쓰기/수정 기능을 이용합니다.</p>
      </article>
      <article class="guide-item">
        <h4 class="guide-title">2) 공지사항 CRUD</h4>
        <p class="guide-text">검색 → 목록 → 상세 → 작성/수정/삭제 흐름을 구현했습니다.</p>
      </article>
      <article class="guide-item">
        <h4 class="guide-title">3) 계정관리</h4>
        <p class="guide-text">내 정보 수정, 비밀번호 변경, 회원탈퇴 UI를 제공합니다.</p>
      </article>
    </div>

    <div class="upload-mock" role="note" aria-label="파일 업로드 안내">
      <div class="upload-head">
        <strong>파일 업로드(미구현 UI)</strong>
        <span class="pill">UI Only</span>
      </div>

      <div class="upload-row">
        <input class="form-input" type="text" value="파일 업로드는 포트폴리오에서 UI만 제공됩니다." readonly>
        <button class="btn btn-secondary btn-disabled" type="button" aria-disabled="true">파일 선택</button>
        <button class="btn btn-primary btn-disabled" type="button" aria-disabled="true">업로드</button>
      </div>

      <p class="hint">※ 실제 업로드/다운로드 처리는 제외되어 있습니다.</p>
    </div>
  </section>
</main>

<?php include 'layout/footer.php'; ?>