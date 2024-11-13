<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE student_id='$id'";
if ($mysqli->query($sql) === TRUE) {
    header("Location: students.php");
    exit();
} else {
    echo "Lỗi: " . $mysqli->error;
}
$mysqli->close();
?>
