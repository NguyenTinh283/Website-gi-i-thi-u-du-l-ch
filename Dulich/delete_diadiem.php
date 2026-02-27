<?php
session_start();
include("config.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: dia_diem.php");
    exit;
}

$id = intval($_GET['id']);

// 1. Xóa các file ảnh từ thư mục (nếu có)
$stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_dia_diem = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $duong_dan = $row['duong_dan'];
    if ($duong_dan && file_exists($duong_dan)) {
        unlink($duong_dan);
    }
}
$stmt->close();

// 2. Xóa ảnh khỏi bảng `hinh_anh`
$stmt = $conn->prepare("DELETE FROM hinh_anh WHERE id_dia_diem = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// 3. (Nếu có video hoặc bảng phụ khác, cũng phải xóa)
// Ví dụ: DELETE FROM video WHERE id_dia_diem = ?

// 4. Cuối cùng, xóa địa điểm
$stmt = $conn->prepare("DELETE FROM dia_diem WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: dia_diem.php");
exit;
?>