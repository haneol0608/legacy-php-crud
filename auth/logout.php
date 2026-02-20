<?php
session_start();
session_unset(); // all session 변수 삭제
$_SESSION = []; // 한번 더 변수 삭제(재처리)
session_destroy(); // session 파일 삭제

echo "<script>alert('로그아웃 되었습니다.'); location.href='/';</script>";