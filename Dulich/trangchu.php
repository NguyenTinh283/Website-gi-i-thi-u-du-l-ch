<?php
include("config.php");
include("header.php");

// Lấy địa điểm và món ăn, gộp lại và sắp xếp theo tên
$data = [];

$result_diadiem = $conn->query("SELECT id, ten, mo_ta, hinh_anh, 'dia_diem' AS loai FROM dia_diem");
while ($row = $result_diadiem->fetch_assoc()) {
    $data[] = $row;
}

$result_monan = $conn->query("SELECT id, ten, mo_ta, hinh_anh, 'mon_an' AS loai FROM mon_an");
while ($row = $result_monan->fetch_assoc()) {
    $data[] = $row;
}

usort($data, function ($a, $b) {
    return strcasecmp($a['ten'], $b['ten']);
});
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Danh sách Địa điểm và Món ăn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content">
    <h2>Những địa điểm nổi tiếng và các món ăn ngon tại Cần Thơ</h2>
    <ul class="places-list">
        <?php foreach ($data as $row): ?>
            <li>
                <img src="<?= htmlspecialchars($row['hinh_anh']); ?>" alt="<?= htmlspecialchars($row['ten']); ?>">
                <strong><?= htmlspecialchars($row['ten']); ?></strong>
                <p><?= htmlspecialchars($row['mo_ta']); ?></p>

                <?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin')): ?>
                    <?php $return_url = urlencode($_SERVER['REQUEST_URI']); ?>
                    <a href="chitiet.php?loai=<?= $row['loai']; ?>&id=<?= $row['id']; ?>&return_url=<?= $return_url; ?>" class="btn">Xem chi tiết</a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>