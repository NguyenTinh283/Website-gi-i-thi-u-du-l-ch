<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Giới thiệu du lịch TP Cần Thơ</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<div class="header">
  <h1>Giới thiệu du lịch Thành phố Cần Thơ</h1>
  <ul class="menu">
    <li><a href="trangchu.php"><i class="fa fa-home"></i> Trang chủ</a></li>
    <li class="dropdown">
      <a href="#"><i class="fa fa-list"></i> Danh mục</a>
      <ul class="submenu">
        <li><a href="dia_diem.php">Địa điểm</a></li>
        <li><a href="mon_an.php">Món ăn</a></li>
      </ul>
    </li>
    <li><a href="hot_dia_diem.php"><i class="fa fa-fire"></i> Địa điểm Hot</a></li>
    <li><a href="hot_mon_an.php"><i class="fa fa-fire"></i> Món ăn Hot</a></li>
    <li><a href="phanhoi.php"><i class="fa fa-comment-dots"></i> Phản hồi</a></li>

    <?php if (isset($_SESSION['username'])): ?>
        <?php if ($_SESSION['role'] === 'admin'): ?>
            <li><a href="admin.php"><i class="fa fa-user"></i> Admin</a></li>
        <?php elseif ($_SESSION['role'] === 'user'): ?>
            <li><a href="user.php"><i class="fa fa-user"></i> <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
        <?php endif; ?>
        <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a></li>
    <?php else: ?>
        <li><a href="login.php"><i class="fa fa-user"></i> Tài khoản</a></li>
    <?php endif; ?>
  </ul>
</div>