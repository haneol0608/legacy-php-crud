<?php
    $host = 'localhost';
    $user = 'root';
    $password = 's0072266@@';
    $database = 'project1';

    // DB 연결
    $conn = mysqli_connect($host, $user, $password, $database);

    // DB 연결체크
    if (!$conn) {
        die('DB 연결이 안되어있어요!: ' . mysqli_connect_error() );
    }