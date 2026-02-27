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

// Lấy dữ liệu hiện tại
$stmt = $conn->prepare("SELECT * FROM dia_diem WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    echo "Không tìm thấy địa điểm.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = trim($_POST['ten']);
    $dia_chi = trim($_POST['dia_chi']);
    $mo_ta = trim($_POST['mo_ta']);
    $mo_ta_chi_tiet = trim($_POST['mo_ta_chi_tiet']);
    $link_map = trim($_POST['link_map']);
    $new_avatar_path = $row['hinh_anh'];

    // Nếu có ảnh đại diện mới
    if (!empty($_FILES['hinh_anh']['name'])) {
        if (file_exists($row['hinh_anh'])) {
            unlink($row['hinh_anh']); // Xóa ảnh cũ
        }
        $file = $_FILES['hinh_anh'];
        $filename = time() . "_" . basename($file['name']);
        $path = "uploads/" . $filename;
        move_uploaded_file($file['tmp_name'], $path);
        $new_avatar_path = $path;
    }

    // Cập nhật bảng dia_diem
    $stmt = $conn->prepare("UPDATE dia_diem SET ten = ?, dia_chi = ?, mo_ta = ?, mo_ta_chi_tiet = ?, link_map = ?, hinh_anh = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $ten, $dia_chi, $mo_ta, $mo_ta_chi_tiet, $link_map, $new_avatar_path, $id);
    $stmt->execute();
    $stmt->close();

    // XÓA ảnh phụ và video cũ trước khi thêm mới
    $stmt = $conn->prepare("SELECT duong_dan FROM hinh_anh WHERE id_dia_diem = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($img = $result->fetch_assoc()) {
        if (file_exists($img['duong_dan'])) {
            unlink($img['duong_dan']);
        }
    }
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM hinh_anh WHERE id_dia_diem = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Cập nhật ảnh phụ mới
    if (!empty($_FILES['hinh_phu']['name'][0])) {
        foreach ($_FILES['hinh_phu']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['hinh_phu']['error'][$key] === 0) {
                $filename = "uploads/" . time() . "_" . basename($_FILES['hinh_phu']['name'][$key]);
                move_uploaded_file($tmp_name, $filename);
                $stmt = $conn->prepare("INSERT INTO hinh_anh (id_dia_diem, duong_dan, loaihinh) VALUES (?, ?, 'image')");
                $stmt->bind_param("is", $id, $filename);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Cập nhật video mới
    if (!empty($_FILES['video']['name'][0])) {
        foreach ($_FILES['video']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['video']['error'][$key] === 0) {
                $filename = "uploads/" . time() . "_" . basename($_FILES['video']['name'][$key]);
                move_uploaded_file($tmp_name, $filename);
                $stmt = $conn->prepare("INSERT INTO hinh_anh (id_dia_diem, duong_dan, loaihinh) VALUES (?, ?, 'video')");
                $stmt->bind_param("is", $id, $filename);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    header("Location: dia_diem.php");
    exit;
}

include("header.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa địa điểm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-wrapper">
    <form method="POST" enctype="multipart/form-data" class="add-form">
        <h2>Cập nhật địa điểm</h2>

        <label>Ảnh đại diện hiện tại:</label>
        <img src="<?= htmlspecialchars($row['hinh_anh']) ?>" width="200" style="margin-bottom: 10px;"><br>

        <label>Thay đổi ảnh đại diện:</label>
        <input type="file" name="hinh_anh" accept="image/*">

        <label>Thêm hình ảnh khác:</label>
        <input type="file" name="hinh_phu[]" accept="image/*" multiple>

        <label>Thêm video:</label>
        <input type="file" name="video[]" accept="video/*" multiple>

        <label>Tên địa điểm:</label>
        <input type="text" name="ten" value="<?= htmlspecialchars($row['ten']) ?>" required>

        <label>Địa chỉ:</label>
        <input type="text" name="dia_chi" value="<?= htmlspecialchars($row['dia_chi']) ?>" required>

        <label>Mô tả ngắn:</label>
        <textarea name="mo_ta" rows="3" required><?= htmlspecialchars($row['mo_ta']) ?></textarea>

        <label>Mô tả chi tiết:</label>
        <textarea name="mo_ta_chi_tiet" rows="5"><?= htmlspecialchars($row['mo_ta_chi_tiet']) ?></textarea>

        <label>Link bản đồ:</label>
        <input type="text" name="link_map" value="<?= htmlspecialchars($row['link_map']) ?>">

        <button type="submit">Cập nhật</button>
        <button type="button" onclick="window.location.href='dia_diem.php'" style="margin-top: 10px;">Hủy</button>
    </form>
</div>
</body>
</html>