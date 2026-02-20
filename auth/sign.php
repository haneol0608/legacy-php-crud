<?php
    include dirname(__DIR__) . '/layout/header.php';
    include dirname(__DIR__) . '/db/dbconnect.php';
?>

<main id="content" class="gov-content">
    <h2 class="page-title">회원가입</h2>
    <section class="join-wrap" aria-label="로그인 영역">
        <p class="help-text">아이디와 비밀번호를 입력해주세요.</p>
        <form class="join-box" action="/auth/sign_process.php" method="post">

            <fieldset class="fieldset">
                <legend class="legend">기본 정보</legend>

                <div class="form-row">
                <label for="user_name" class="form-label">
                    이름 <span class="req" aria-hidden="true">*</span>
                </label>
                <input type="text" id="user_name" name="user_nm" class="form-input" required />
                </div>

                <div class="form-row">
                <label for="user_id" class="form-label">
                    아이디 <span class="req" aria-hidden="true">*</span>
                </label>
                <div class="input-group">
                    <input
                    type="text"
                    id="user_id"
                    name="user_id"
                    class="form-input"
                    autocomplete="username"
                    required
                    />
                    <button type="button" class="btn btn-secondary btn-inline">중복확인</button>
                </div>
                <p class="hint">영문/숫자 4~20자</p>
                </div>

                <div class="form-row">
                <label for="user_pw" class="form-label">
                    비밀번호 <span class="req" aria-hidden="true">*</span>
                </label>
                <input
                    type="password"
                    id="user_pw"
                    name="user_pw"
                    class="form-input"
                    autocomplete="new-password"
                    required
                />
                <p class="hint">영문/숫자/특수문자 조합 8자 이상 권장</p>
                </div>

                <div class="form-row">
                <label for="user_pw2" class="form-label">
                    비밀번호 확인 <span class="req" aria-hidden="true">*</span>
                </label>
                <input
                    type="password"
                    id="user_pw2"
                    name="user_pw2"
                    class="form-input"
                    autocomplete="new-password"
                    required
                />
                </div>
            </fieldset>

            <!-- 연락처 -->
            <fieldset class="fieldset">
                <legend class="legend">연락처</legend>

                <div class="form-row">
                <label for="email" class="form-label">
                    이메일 <span class="req" aria-hidden="true">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email_addr"
                    class="form-input"
                    autocomplete="email"
                    required
                />
                </div>

                <div class="form-row">
                <label for="phone" class="form-label">휴대전화</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone_no"
                    class="form-input"
                    placeholder="010-0000-0000"
                    autocomplete="tel"
                />
                </div>
            </fieldset>

            <div class="btn-area">
                <button type="submit" class="btn btn-primary">가입하기</button>
                <a href="/" class="btn btn-secondary">취소</a>
            </div>
        </form>
    </section>
</main>

<?php include dirname(__DIR__) . '/layout/footer.php'; ?>