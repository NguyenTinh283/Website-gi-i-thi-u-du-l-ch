<?php
session_start();
include("config.php");

// Xử lý xóa khỏi hot (chỉ admin mới được phép)
if (isset($_GET['remove_hot']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $id = (int)$_GET['remove_hot'];
    $conn->query("UPDATE mon_an SET noi_bat = 0 WHERE id = $id");
    header("Location: hot_mon_an.php");
    exit;
}

// Lấy danh sách món ăn hot
$result = $conn->query("SELECT * FROM mon_an WHERE noi_bat = 1 ORDER BY ten ASC");
?>
<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Món ăn Hot</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content">
    <h2>Các món ăn hot nhất tại Cần Thơ</h2>

    <?php if ($result->num_rows === 0): ?>
        <p>Không có món ăn nào nổi bật.</p>
    <?php else: ?>
        <ul class="places-list">
            <?php while($row = $result->fetch_assoc()): ?>
                <li>
                    <img src="<?= htmlspecialchars($row['hinh_anh']); ?>" alt="<?= htmlspecialchars($row['ten']); ?>">
                    <strong><?= htmlspecialchars($row['ten']); ?></strong>
                    <p><?= nl2br(htmlspecialchars($row['mo_ta'])); ?></p>

                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="chitiet.php?loai=mon_an&id=<?= $row['id']; ?>" class="btn">Xem chi tiết</a>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <div class="button-group">
                            <a href="hot_mon_an.php?remove_hot=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa khỏi hot?')">Xóa khỏi hot</a>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>