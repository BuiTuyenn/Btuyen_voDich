<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $birthdate = $_POST['birthdate'];
    $enrollment_year = $_POST['enrollment_year'];
    $numberphone = $_POST['numberphone'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];

    $sql = "UPDATE students SET lastname='$lastname', firstname='$firstname', birthdate='$birthdate', email='$email', diachi='$diachi', numberphone='$numberphone', enrollment_year='$enrollment_year' WHERE student_id='$student_id'";
    if ($mysqli->query($sql) === TRUE) {
        header("Location: students.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Lỗi: " . $mysqli->error . "</div>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE student_id='$id'";
    $result = $mysqli->query($sql);
    $student = $result->fetch_assoc();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sinh Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('17f1fbece1e98127aa045039b06bd709.jpg'); /* Hình nền */
            background-size: cover; /* Để hình nền phủ toàn bộ */
            background-position: center; /* Căn giữa hình nền */
            color: white; /* Màu chữ đen cho toàn bộ trang */
        }
        .container {
            padding: 40px; /* Khoảng cách bên trong */
            max-width: 500px; /* Chiều rộng tối đa */
            margin: auto; /* Căn giữa */
            margin-top: 100px; /* Khoảng cách từ trên xuống */
            background: transparent; /* Xóa nền khung */
            box-shadow: none; /* Bỏ đổ bóng */
        }
        h2 {
            color: white; /* Màu chữ tiêu đề */
        }
        .form-control {
            border-radius: 25px; /* Bo góc các ô nhập liệu */
            border: 1px solid #ccc; /* Đường viền cho ô nhập liệu */
            transition: border-color 0.3s; /* Hiệu ứng chuyển màu đường viền */
        }
        .form-control:focus {
            border-color: #007bff; /* Màu đường viền khi ô nhập liệu được chọn */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Hiệu ứng đổ bóng khi chọn */
        }
        .btn {
            border-radius: 25px; /* Bo góc nút */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sửa Thông Tin Sinh Viên</h2>
        <form action="edit_student.php" method="POST">
            <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
            <div class="form-group">
                <label for="lastname">Họ Đệm</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $student['lastname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="firstname">Tên</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $student['firstname']; ?>" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Ngày Sinh</label>
                <input type="date" class="form-control" name="birthdate" value="<?php echo $student['birthdate']; ?>" required>
            </div>
            <div class="form-group">
                <label for="numberphone">Số Điện Thoại</label>
                <input type="tel" class="form-control" name="numberphone" value="<?php echo $student['numberphone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $student['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa Chỉ</label>
                <input type="text" class="form-control" name="diachi" value="<?php echo $student['diachi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="enrollment_year">Năm Nhập Học</label>
                <input type="number" class="form-control" name="enrollment_year" value="<?php echo $student['enrollment_year']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cập Nhật</button>
        </form>
        <a href="students.php" class="btn btn-secondary btn-block mt-3">Quay lại Danh Sách Sinh Viên</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
