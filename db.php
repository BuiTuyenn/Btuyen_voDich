<?php
$host = 'localhost';
$user = 'root';  // Tên tài khoản MySQL
$password = '1234';  // Mật khẩu của tài khoản root (để trống nếu không có)
$dbname = 'student_management';  // Tên cơ sở dữ liệu


// Kết nối đến MySQL
$mysqli = new mysqli($host, $user, $password, $dbname);

// Kiểm tra kết nối
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
