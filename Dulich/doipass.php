<?php
session_start();
include("config.php");

if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], ['admin', 'user'])) {
    header("Location: index.php?page=login");
    exit;
}

$showSuccessPopup = false;
$thongbao = "";
$redirectPage = $_SESSION['role'] === 'admin' ? 'admin.php' : 'user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $matkhau_hien_tai = $_POST['matkhau_hien_tai'];
    $matkhau_moi = $_POST['matkhau_moi'];
    $xac_nhan = $_POST['xac_nhan'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($matkhau_hash);
    $stmt->fetch();
    $stmt->close();

    if (!password_verify($matkhau_hien_tai, $matkhau_hash)) {
        $thongbao = "❌ Mật khẩu hiện tại không đúng.";
    } elseif ($matkhau_moi !== $xac_nhan) {
        $thongbao = "❌ Mật khẩu xác nhận không khớp.";
    } else {
        $matkhau_moi_hash = password_hash($matkhau_moi, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $matkhau_moi_hash, $username);
        $stmt->execute();
        $stmt->close();
        $showSuccessPopup = true;
    }
}
?>

<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if ($showSuccessPopup): ?>
    <div class="popup-success">✅ Đã đổi mật khẩu thành công!</div>
    <script>
        setTimeout(function () {
            window.location.href = "<?= $redirectPage ?>";
        }, 1000);
    </script>
<?php endif; ?>

<div class="form-wrapper">
    <form method="POST" class="add-form">
        <h2>Đổi mật khẩu</h2>

        <?php if ($thongbao): ?>
            <p style="color: <?= strpos($thongbao, '✅') !== false ? 'green' : 'red' ?>; font-weight: bold;">
                <?= $thongbao ?>
            </p>
        <?php endif; ?>

        <input type="password" name="matkhau_hien_tai" placeholder="Mật khẩu hiện tại" required>
        <input type="password" name="matkhau_moi" placeholder="Mật khẩu mới" required>
        <input type="password" name="xac_nhan" placeholder="Xác nhận mật khẩu mới" required>

        <button type="submit">Đổi mật khẩu</button>
        <button type="button" onclick="window.location.href='<?= $redirectPage ?>'" style="margin-top: 10px;">Hủy</button>
    </form>
</div>

</body>
</html>