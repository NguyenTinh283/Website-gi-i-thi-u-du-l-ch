<?php
session_start();
include("config.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: mon_an.php");
    exit;
}

$id = intval($_GET['id']);

// 1. Xóa các file ảnh từ thư mục (nếu có)
$stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_mon_an = ?");
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
$stmt = $conn->prepare("DELETE FROM hinh_anh WHERE id_mon_an = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// 3. (Nếu có bảng `video` hoặc bảng phụ liên quan món ăn, xóa ở đây nếu cần)
// Ví dụ:
// $stmt = $conn->prepare("DELETE FROM video WHERE id_mon_an = ?");
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $stmt->close();

// 4. Xóa món ăn khỏi bảng `mon_an`
$stmt = $conn->prepare("DELETE FROM mon_an WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: mon_an.php");
exit;
?>