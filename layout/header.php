<?php
    header('Content-Type: text/html; charset=UTF-8');
    session_start();
    $login_status = !empty($_SESSION['login_status']);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gov.css">
    <title>Legacy PHP 포트폴리오</title>
</head>
<body>
    
<!-- Header -->
<header class="gov-header">
    <div class="header-inner">
        <h1 class="logo">Legacy CRUD System</h1>
        <nav class="gnb">
            <ul>
                    <li><a href="../index.php">홈</a></li>
                <?php if($login_status == 'true'): ?>
                    <li>
                        <p><?php echo $_SESSION['user_nm']; ?>님 환영합니다!</p>
                    </li>
                    <li><a href="/profile.php">포트폴리오</a></li>
                    <li><a href="../auth/logout.php">로그아웃</a></li>
                    <li><a href="../auth/account.php">계정관리</a></li>
                    <li><a href="../board/board.php">공지사항</a></li>
                    <!-- <li><a href="../business/process.php">*서류관리</a></li> -->
                <?php else: ?>
                    <li><a href="/profile.php">포트폴리오</a></li>
                    <li><a href="../auth/login.php">로그인</a></li>
                    <li><a href="../auth/sign.php">회원가입</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

