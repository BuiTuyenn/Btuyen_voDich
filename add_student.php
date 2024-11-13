<?php
session_start(); // Bắt đầu session
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $username = $_SESSION['username']; // Lấy username từ session

    // Kiểm tra xem username có tồn tại trong bảng users không
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $resultCheck = $stmt->get_result();

    if ($resultCheck->num_rows > 0) {
        // Nếu tồn tại, thêm sinh viên vào bảng students
        $sqlInsert = "INSERT INTO students (student_id, lastname, firstname, birthdate, numberphone, email, diachi, enrollment_year) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtInsert = $mysqli->prepare($sqlInsert);

        // Lấy các trường thông tin sinh viên từ POST
        $lastname = $_POST['lastname']; // Lấy họ đệm từ form
        $firstname = $_POST['firstname'];
        $birthdate = $_POST['birthdate'];
        $numberphone = $_POST['numberphone'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $enrollment_year = $_POST['enrollment_year'];

        // Bind các tham số
        $stmtInsert->bind_param("isssssss", $student_id, $lastname, $firstname, $birthdate, $numberphone, $email, $diachi, $enrollment_year);
        
        if ($stmtInsert->execute()) {
            // Chuyển hướng về trang danh sách sinh viên
            header("Location: students.php");
            exit(); // Dừng việc thực thi mã
        } else {
            echo "Lỗi: " . $stmtInsert->error;
        }
        $stmtInsert->close();
    } else {
        echo "Người dùng không tồn tại.";
    }
    $stmt->close();
}

$conn->close();




