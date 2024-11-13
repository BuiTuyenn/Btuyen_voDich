<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <style>
        /* CSS cho modal */
        .modal-content {
            background-color: #343a40; /* Màu nền modal */
            color: white; /* Màu chữ */
        }
        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2); /* Viền dưới modal header */
        }
        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.2); /* Viền trên modal footer */
        }
        .form-control {
            background-color: #495057; /* Màu nền ô nhập liệu */
            color: white; /* Màu chữ trong ô nhập liệu */
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5); /* Màu placeholder */
        }
        .btn-primary {
            background-color: #007bff; /* Màu nút */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Màu khi hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5 table-container">
    <div>
    <div class="right">
        <h2>Danh Sách Sinh Viên</h2>
        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addStudentModal">Thêm Sinh Viên</button>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Mã Sinh Viên</th>
                    <th>Họ Đệm</th>
                    <th>Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Năm Nhập Học</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody id="studentList">
                <?php
                require 'db.php';
                $sql = "SELECT * FROM students";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['student_id']}</td>
                            <td>{$row['lastname']}</td>
                            <td>{$row['firstname']}</td>
                            <td>{$row['birthdate']}</td>
                            <td>{$row['numberphone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['diachi']}</td>
                            <td>{$row['enrollment_year']}</td>
                            <td>
                                <a href='edit_student.php?id={$row['student_id']}' class='btn btn-warning btn-sm'>Sửa</a>
                                <a href='delete_student.php?id={$row['student_id']}' class='btn btn-danger btn-sm'>Xóa</a>
                            </td>
                          </tr>";
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- Modal Thêm Sinh Viên -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Thêm Sinh Viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_student.php" method="POST">
                        <div class="form-group">
                            <label for="student_id">Mã Sinh Viên</label>
                            <input type="text" class="form-control" name="student_id" placeholder="Nhập mã sinh viên" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Họ Đệm</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Nhập họ đệm" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">Tên</label>
                            <input type="text" class="form-control" name="firstname" placeholder="Nhập tên" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Ngày Sinh</label>
                            <input type="date" class="form-control" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="numberphone">Số Điện Thoại</label>
                            <input type="number" class="form-control" name="numberphone" placeholder="Nhập số điện thoại" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
                        </div>
                        <div class="form-group">
                            <label for="diachi">Địa Chỉ</label>
                            <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ" required>
                        </div>
                        <div class="form-group">
                            <label for="enrollment_year">Năm Nhập Học</label>
                            <input type="number" class="form-control" name="enrollment_year" placeholder="Nhập năm nhập học" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
