<?php
session_start();
include("config.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$loai = isset($_GET['loai']) ? $_GET['loai'] : 'dia_diem';

if ($loai === 'mon_an') {
    $stmt = $conn->prepare("SELECT * FROM mon_an WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$data) {
        echo "Không tìm thấy món ăn.";
        exit;
    }

    $img_stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_mon_an = ? AND loaihinh = 'image'");
    $img_stmt->bind_param("i", $id);
    $img_stmt->execute();
    $images = $img_stmt->get_result();
    $img_stmt->close();

    $video_stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_mon_an = ? AND loaihinh = 'video'");
    $video_stmt->bind_param("i", $id);
    $video_stmt->execute();
    $videos = $video_stmt->get_result();
    $video_stmt->close();

    $back_link = 'mon_an.php';
} else {
    $stmt = $conn->prepare("SELECT * FROM dia_diem WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$data) {
        echo "Không tìm thấy địa điểm.";
        exit;
    }

    $img_stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_dia_diem = ? AND loaihinh = 'image'");
    $img_stmt->bind_param("i", $id);
    $img_stmt->execute();
    $images = $img_stmt->get_result();
    $img_stmt->close();

    $video_stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_dia_diem = ? AND loaihinh = 'video'");
    $video_stmt->bind_param("i", $id);
    $video_stmt->execute();
    $videos = $video_stmt->get_result();
    $video_stmt->close();

    $back_link = 'dia_diem.php';
}
?>

<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['ten']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-content">
    <h2><?= htmlspecialchars($data['ten']) ?></h2>

    <?php if (!empty($data['dia_chi'])): ?>
        <p><strong>Địa chỉ:</strong> <?= htmlspecialchars($data['dia_chi']) ?></p>
    <?php endif; ?>

    <p><strong>Mô tả ngắn:</strong><br><?= nl2br(htmlspecialchars($data['mo_ta'])) ?></p>

    <?php if (!empty($data['mo_ta_chi_tiet'])): ?>
        <div class="mo-ta-chi-tiet">
            <h3>Chi tiết:</h3>
            <p><?= nl2br(htmlspecialchars($data['mo_ta_chi_tiet'])) ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($data['link_map'])): ?>
        <p><a href="<?= htmlspecialchars($data['link_map']) ?>" target="_blank" class="btn">Xem bản đồ</a></p>
    <?php endif; ?>

    <h3>Hình ảnh</h3>
    <?php if ($images->num_rows > 0): ?>
        <div class="gallery-container">
            <button class="gallery-button" onclick="scrollGallery(-1)">&#8592;</button>
            <div class="gallery-images" id="gallery">
                <?php while ($img = $images->fetch_assoc()): ?>
                    <img src="<?= $img['duong_dan'] ?>" onclick="openLightbox(this.src)">
                <?php endwhile; ?>
            </div>
            <button class="gallery-button" onclick="scrollGallery(1)">&#8594;</button>
        </div>
    <?php else: ?>
        <p>Không có hình ảnh.</p>
    <?php endif; ?>

    <div id="lightbox" onclick="closeLightbox()">
        <img id="lightbox-img" src="" alt="Xem ảnh lớn">
    </div>

    <div class="video-container">
        <h3>Video</h3>
        <?php if ($videos->num_rows > 0): ?>
            <?php while ($vid = $videos->fetch_assoc()): ?>
                <div style="text-align: center;">
                    <video controls>
                        <source src="<?= htmlspecialchars($vid['duong_dan']) ?>" type="video/mp4">
                        Trình duyệt không hỗ trợ video.
                    </video>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Không có video cho mục này.</p>
        <?php endif; ?>
    </div>

    <div class="button-group">
        <a href="javascript:history.back()" class="btn">← Quay lại</a>
        <a href="trangchu.php" class="btn">Về trang chủ</a>
    </div>
</div>

<script>
function scrollGallery(direction) {
    const gallery = document.getElementById("gallery");
    const scrollAmount = 300;
    gallery.scrollBy({
        left: direction * scrollAmount,
        behavior: "smooth"
    });
}

function openLightbox(src) {
    document.getElementById("lightbox-img").src = src;
    document.getElementById("lightbox").style.display = "flex";
}

function closeLightbox() {
    document.getElementById("lightbox").style.display = "none";
}
</script>

</body>
</html>