<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="../loginnn/style.css">
    <style>
        .social-buttons {
            display: flex;
            justify-content: space-between; /* Đặt khoảng cách giữa các nút */
            margin-top: 10px; /* Khoảng cách trên */
        }
        .social-buttons button {
            flex: 1; /* Để nút chiếm toàn bộ chiều rộng */
            margin: 0 5px; /* Khoảng cách giữa các nút */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Đăng Nhập</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Tên Tài Khoản" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Mật Khẩu" required>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Ghi Nhớ Mật Khẩu</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            <p class="mt-2">Bạn chưa có tài khoản? <a href="register.php" class="toggle-link">Đăng Ký tại đây</a></p>
        </form>

        <div class="text-center mt-4">
            <p>Hoặc đăng nhập bằng:</p>
            <div class="social-buttons">
                <button class="btn btn-danger">Google</button>
                <button class="btn btn-primary">Facebook</button>
            </div>
        </div>

        <?php
        require_once("./db.php");
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require 'db.php';
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: students.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Mật khẩu không đúng!</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Tài khoản không tồn tại!</div>";
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
