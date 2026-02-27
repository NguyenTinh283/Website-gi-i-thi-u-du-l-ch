<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: index.php?page=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Người Dùng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include("header.php"); ?>

<div class="user-panel">
    <h1>Hi: <?= htmlspecialchars($_SESSION['username']) ?></h1>
    <p>Email: <?= isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'Không có email' ?></p>

    <div class="user-buttons">
        <a href="doipass.php" class="btn">Đổi mật khẩu</a>
    </div>
</div>

</body>
</html>