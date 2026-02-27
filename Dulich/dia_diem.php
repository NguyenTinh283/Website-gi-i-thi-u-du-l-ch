<?php
session_start();
include("config.php");

// Xử lý thêm vào hot (chỉ admin)
if (isset($_GET['hot']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $id = (int)$_GET['hot'];
    $conn->query("UPDATE dia_diem SET noi_bat = 1 WHERE id = $id");
    header("Location: dia_diem.php");
    exit;
}

// Lấy danh sách địa điểm
$result = $conn->query("SELECT * FROM dia_diem ORDER BY ten ASC");
?>

<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Địa điểm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content">
    <h2>Danh sách các địa điểm nổi tiếng nhất Cần Thơ</h2>
    <ul class="places-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <img src="<?= htmlspecialchars($row['hinh_anh']); ?>" alt="<?= htmlspecialchars($row['ten']); ?>">
                <strong><?= htmlspecialchars($row['ten']); ?></strong>
                <p><?= htmlspecialchars($row['mo_ta']); ?></p>

                <?php if (!empty($row['link_map']) && isset($_SESSION['username'])): ?>
                    <!-- ✅ Chỉ hiển thị nếu đã đăng nhập -->
                    <a href="chitiet.php?loai=dia_diem&id=<?= $row['id'] ?>" class="btn">Xem chi tiết</a>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <div class="button-group">
                        <a href="edit_diadiem.php?id=<?= $row['id']; ?>" class="btn">Sửa</a>
                        <a href="delete_diadiem.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa địa điểm này?')">Xóa</a>
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