<?php
    include dirname(__DIR__) . '/layout/header.php';
    include dirname(__DIR__) . '/db/dbconnect.php';
    include dirname(__DIR__) . '/auth/account_process.php';
    include dirname(__DIR__) . '/auth/account_select.php';
?>

<main id="content" class="gov-content">
  <h2 class="page-title">계정관리</h2>

  <!-- 상단 요약 -->
  <section class="panel" aria-label="계정 요약">
    <div class="panel-row">
      <div class="panel-item">
        <span class="label">아이디</span>
        <strong class="value"><?php echo $_SESSION['user_id']; ?></strong>
      </div>
      <div class="panel-item">
        <span class="label">이름</span>
        <strong class="value"><?php echo $_SESSION['user_nm']; ?></strong>
      </div>
      <div class="panel-item">
        <span class="label">가입일</span>
        <strong class="value"><?php echo $_SESSION['reg_dt']; ?></strong>
      </div>
      <div class="panel-item">
        <span class="label">수정일</span>
        <strong class="value"><?php echo $_SESSION['upd_dt'] ?? '수정기록X'; ?></strong>
      </div>
    </div>
    <p class="hint">개인정보 보호를 위해 공용 PC 사용 시 로그아웃을 권장합니다.</p>
  </section>

  <!-- 탭 -->
  <div class="gov-tabs" role="tablist" aria-label="계정관리 메뉴">
    <button class="tab is-active" type="button" role="tab" aria-selected="true" aria-controls="tab-profile" id="tabbtn-profile">내 정보</button>
    <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="tab-password" id="tabbtn-password">비밀번호 변경</button>
    <button class="tab" type="button" role="tab" aria-selected="false" aria-controls="tab-withdraw" id="tabbtn-withdraw">회원탈퇴</button>
  </div>

  <!-- 내 정보 -->
  <section id="tab-profile" class="tab-panel is-active" role="tabpanel" aria-labelledby="tabbtn-profile">
    <form class="form-box" action="/auth/account_process.php" method="post" novalidate>
      <h3 class="section-title">내 정보 수정</h3>
      <input type="hidden" name="account_status" value="계정정보 수정">

      <div class="form-alert" role="alert" aria-live="polite"></div>

      <div class="form-row">
        <label class="form-label" for="user_id">아이디</label>
        <input class="form-input" id="user_id" name="user_id" type="text" value="<?php echo $_SESSION['user_id']; ?>" readonly />
        <p class="hint">아이디는 변경할 수 없습니다.</p>
      </div>

      <div class="form-row">
        <label class="form-label" for="user_nm">이름 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="user_nm" name="user_nm" type="text" value="<?php echo $user_nm; ?>" required />
      </div>

      <div class="form-row">
        <label class="form-label" for="email_addr">이메일 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="email_addr" name="email_addr" type="email_addr" value="<?php echo $email_addr; ?>" autocomplete="email" required />
      </div>

      <div class="form-row">
        <label class="form-label" for="phone_no">휴대전화</label>
        <input class="form-input" id="phone_no" name="phone_no" type="tel" value="<?php echo $phone_no; ?>" autocomplete="tel" />
      </div>

      <div class="btn-area">
        <button class="btn btn-primary" type="submit">저장</button>
        <button class="btn btn-secondary" type="reset">초기화</button>
      </div>
    </form>
  </section>

  <!-- 비밀번호 변경 -->
  <section id="tab-password" class="tab-panel" role="tabpanel" aria-labelledby="tabbtn-password" hidden>
    <form class="form-box" action="/auth/account_process.php" method="post" novalidate>
      <h3 class="section-title">비밀번호 변경</h3>
      <input type="hidden" name="account_status" value="비밀번호 수정">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

      <div class="form-alert" role="alert" aria-live="polite"></div>

      <div class="form-row">
        <label class="form-label" for="user_pw">현재 비밀번호 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="user_pw" name="user_pw" type="password" autocomplete="current-password" required />
      </div>

      <div class="form-row">
        <label class="form-label" for="user_pw2">새 비밀번호 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="user_pw2" name="user_pw2" type="password" autocomplete="new-password" required />
        <p class="hint">영문/숫자/특수문자 조합 8자 이상 권장</p>
      </div>

      <div class="form-row">
        <label class="form-label" for="user_pw3">새 비밀번호 확인 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="user_pw3" name="user_pw3" type="password" autocomplete="new-password" required />
      </div>

      <div class="btn-area">
        <button class="btn btn-primary" type="submit">변경</button>
      </div>
    </form>
  </section>

  <!-- 회원탈퇴 -->
  <section id="tab-withdraw" class="tab-panel" role="tabpanel" aria-labelledby="tabbtn-withdraw" hidden>
    <form class="form-box" action="/auth/account_process.php" method="post" novalidate>
      <h3 class="section-title">회원탈퇴</h3>
      <input type="hidden" name="account_status" value="회원탈퇴">
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

      <div class="notice-box" role="note" aria-label="탈퇴 안내">
        <ul class="bullets">
          <li>탈퇴 시 계정 정보가 삭제되며 복구할 수 없습니다.</li>
          <li>관련 법령에 따라 일부 기록은 일정 기간 보관될 수 있습니다.</li>
        </ul>
      </div>

      <div class="form-row">
        <label class="form-label" for="user_pw">비밀번호 확인 <span class="req" aria-hidden="true">*</span></label>
        <input class="form-input" id="user_pw" name="user_pw" type="password" autocomplete="current-password" required />
      </div>

      <div class="form-row">
        <label class="chk">
          <input type="checkbox" name="confirm_withdraw" value="Y" required />
          <span>안내 사항을 확인했으며, 탈퇴에 동의합니다. <span class="req" aria-hidden="true">*</span></span>
        </label>
      </div>

      <div class="btn-area">
        <button class="btn btn-danger" type="submit">탈퇴하기</button>
      </div>
    </form>
  </section>

</main>

<!-- 탭 action -->
<script>
  (function () {
    const tabs = document.querySelectorAll('.gov-tabs .tab');
    const panels = document.querySelectorAll('.tab-panel');

    function activate(tab) {
      tabs.forEach(t => {
        const selected = (t === tab);
        t.classList.toggle('is-active', selected);
        t.setAttribute('aria-selected', selected ? 'true' : 'false');
      });

      panels.forEach(p => {
        const isTarget = (p.id === tab.getAttribute('aria-controls'));
        p.classList.toggle('is-active', isTarget);
        p.hidden = !isTarget;
      });
    }

    tabs.forEach(tab => tab.addEventListener('click', () => activate(tab)));
  
    // 클릭 시: 탭 열고 URL 해시 저장 (history에 남기기 위해 location.hash 사용)
    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        activate(tab);
        const panelId = tab.getAttribute('aria-controls');
        location.hash = panelId; // 예: #tab-password
      });
    });

    // 페이지 로드 시: 해시가 있으면 해당 탭 자동 활성화
    const hash = (location.hash || '').replace('#', '');
    if (hash) {
      const targetTab = document.querySelector(`.gov-tabs .tab[aria-controls="${hash}"]`);
      if (targetTab) activate(targetTab);
    }
  })();
</script>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>

