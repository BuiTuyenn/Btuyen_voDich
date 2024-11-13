<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Đăng Ký Tài Khoản</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Tên Tài Khoản" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Xác Nhận Mật Khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Ký</button>
            <p class="mt-2">Bạn đã có tài khoản? <a href="login.php" class="toggle-link">Đăng Nhập tại đây</a></p>
        </form>

        <?php
        require_once('./db.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require 'db.php';
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Kiểm tra xem username đã tồn tại chưa
            $sqlCheck = "SELECT * FROM users WHERE username='$username'";
            $resultCheck = $mysqli->query($sqlCheck);

            if ($resultCheck->num_rows > 0) {
                echo "<div class='alert alert-danger'>Tên tài khoản đã tồn tại!</div>";
            } else {
                if ($password === $confirm_password) {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                    
                    if ($mysqli->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Đăng ký thành công!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Lỗi: " . $comysqlinn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Mật khẩu không khớp!</div>";
                }
            }
            $mysqli->close();
        }
        ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('fade-in');

            document.querySelectorAll('.toggle-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định
                    document.body.classList.remove('fade-in');
                    document.body.classList.add('fade-out');

                    // Chờ cho hiệu ứng fade-out kết thúc trước khi chuyển trang
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 500); // Thời gian trùng với thời gian fade-out
                });
            });
        });
    </script>
</body>
</html>
