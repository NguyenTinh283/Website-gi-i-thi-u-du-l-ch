<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}
?>

<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Quản Trị</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="admin-panel">
    <h1>Quản trị viên</h1>
    <p style="font-size: 18px; margin-bottom: 10px;">Tên đăng nhập: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
    
    <div class="admin-buttons">
        <a href="doipass.php" class="btn">Đổi mật khẩu</a>
        <a href="add_diadiem.php" class="btn">Thêm địa điểm mới</a>
        <a href="add_monan.php" class="btn">Thêm món ăn mới</a>
    </div>
</div>

</body>
</html>