<?php
session_start();
include("config.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php?page=login");
    exit;
}

function generateUniqueFilename($originalName) {
    return "uploads/" . time() . "_" . uniqid() . "_" . basename($originalName);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten = $_POST['ten'];
    $dia_chi = $_POST['dia_chi'];
    $mo_ta = $_POST['mo_ta'];
    $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'];
    $link_map = $_POST['link_map'];

    if (!is_dir("uploads")) mkdir("uploads");

    // Ảnh đại diện
    $hinh_dai_dien = "";
    if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === 0) {
        $hinh_dai_dien = generateUniqueFilename($_FILES['hinh_anh']['name']);
        move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $hinh_dai_dien);
    }

    // Thêm vào bảng dia_diem trước để lấy ID
    $stmt = $conn->prepare("INSERT INTO dia_diem (ten, dia_chi, mo_ta, mo_ta_chi_tiet, link_map, hinh_anh) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $ten, $dia_chi, $mo_ta, $mo_ta_chi_tiet, $link_map, $hinh_dai_dien);
    $stmt->execute();
    $id_dia_diem = $stmt->insert_id;
    $stmt->close();

    // Hình ảnh phụ (nhiều)
    if (!empty($_FILES['hinh_phu']['name'][0])) {
        foreach ($_FILES['hinh_phu']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['hinh_phu']['error'][$key] === 0) {
                $filename = generateUniqueFilename($_FILES['hinh_phu']['name'][$key]);
                move_uploaded_file($tmp_name, $filename);
                $stmt = $conn->prepare("INSERT INTO hinh_anh (id_dia_diem, duong_dan, loaihinh) VALUES (?, ?, 'image')");
                $stmt->bind_param("is", $id_dia_diem, $filename);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Video (nhiều)
    if (!empty($_FILES['video']['name'][0])) {
        foreach ($_FILES['video']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['video']['error'][$key] === 0) {
                $filename = generateUniqueFilename($_FILES['video']['name'][$key]);
                move_uploaded_file($tmp_name, $filename);
                $stmt = $conn->prepare("INSERT INTO hinh_anh (id_dia_diem, duong_dan, loaihinh) VALUES (?, ?, 'video')");
                $stmt->bind_param("is", $id_dia_diem, $filename);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    header("Location: admin.php");
    exit;
}
?>

<?php include("header.php"); ?>
<div class="form-wrapper">
    <form method="POST" enctype="multipart/form-data" class="add-form">
        <h2>Thêm địa điểm mới</h2>

        <label>Ảnh đại diện:</label>
        <input type="file" name="hinh_anh" accept="image/*" required>

        <label>Hình ảnh khác:</label>
        <input type="file" name="hinh_phu[]" accept="image/*" multiple>

        <label>Video:</label>
        <input type="file" name="video[]" accept="video/*" multiple>

        <input type="text" name="ten" placeholder="Tên địa điểm" required>
        <input type="text" name="dia_chi" placeholder="Địa chỉ" required>
        <textarea name="mo_ta" placeholder="Mô tả" rows="3" required></textarea>
        <textarea name="mo_ta_chi_tiet" placeholder="Mô tả chi tiết" rows="5"></textarea>
        <input type="text" name="link_map" placeholder="Link Google Map">
        
        <button type="submit">Thêm địa điểm</button>
        <button type="button" onclick="window.location.href='admin.php'" style="margin-top: 10px;">Hủy</button>
    </form>
</div>