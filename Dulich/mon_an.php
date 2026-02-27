<?php
session_start();
include("config.php");

// Xử lý thêm vào hot (chỉ admin)
if (isset($_GET['hot']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $id = (int)$_GET['hot'];
    $conn->query("UPDATE mon_an SET noi_bat = 1 WHERE id = $id");
    header("Location: mon_an.php");
    exit;
}

// Lấy danh sách món ăn
$result = $conn->query("SELECT * FROM mon_an ORDER BY ten ASC");

include("header.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Món ăn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content">
    <h2>Danh sách các món ăn ngon bậc nhất Cần Thơ</h2>
    <ul class="places-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <img src="<?= htmlspecialchars($row['hinh_anh']); ?>" alt="<?= htmlspecialchars($row['ten']); ?>">
                <strong><?= htmlspecialchars($row['ten']); ?></strong>
                <p><?= htmlspecialchars($row['mo_ta']); ?></p>

                <?php if (!empty($row['link_map']) && isset($_SESSION['username'])): ?>
                    <a href="chitiet.php?loai=mon_an&id=<?= $row['id'] ?>" class="btn">Xem chi tiết</a>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <div class="button-group">
                        <a href="edit_monan.php?id=<?= $row['id']; ?>" class="btn btn-edit">Sửa</a>
                        <a href="delete_monan.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa món ăn này?')">Xóa</a>
                    </div>

                    <?php if ($row['noi_bat'] != 1): ?>
                        <div class="button-group" style="margin-top: 10px;">
                            <a href="?hot=<?= $row['id']; ?>" class="btn">Thêm vào hot</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

</body>
</html>