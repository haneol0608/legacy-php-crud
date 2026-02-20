<?php
    include dirname(__DIR__) . '/layout/header.php';
    include dirname(__DIR__) . '/db/dbconnect.php';
?>

<main id="content" class="gov-content">
    <h2 class="page-title">로그인</h2>
    <section class="login-wrap" aria-label="로그인 영역">
        <p class="help-text">아이디와 비밀번호를 입력해주세요.</p>
        <form class="login-box" action="/auth/login_process.php" method="post">
            <div class="form-row">
                <label for="user_id" class="form-label">아이디</label>
                <input type="text" name="user_id" class="form-input" autocomplete="username" required>
            </div>
            <div class="form-row">
                <label for="user_pw" class="form-label">비밀번호</label>
                <input type="password" name="user_pw" class="form-input" autocomplete="current-password" required>
            </div>
            <div class="form-row">
                <button type="submit" class="btn btn-primary">로그인</button>
            </div>
        </form>
    </section>
</main>


<?php include dirname(__DIR__) . '/layout/footer.php'; ?>