<?php
session_start();
include("config.php");

// Xử lý gửi phản hồi mới của user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'them' && isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
        $username = $_SESSION['username'];
        $email = trim($_POST['email']);
        $noi_dung = trim($_POST['noi_dung']);

        if ($email && $noi_dung) {
            $stmt = $conn->prepare("INSERT INTO phan_hoi (username, email, noi_dung) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $noi_dung);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: phanhoi.php");
        exit;
    }

    if ($_POST['action'] === 'capnhat' && isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
        $id = (int)$_POST['phanhoi_id'];
        $noi_dung = trim($_POST['noi_dung']);
        $username = $_SESSION['username'];

        if ($noi_dung) {
            $stmt = $conn->prepare("UPDATE phan_hoi SET noi_dung = ? WHERE id = ? AND username = ?");
            $stmt->bind_param("sis", $noi_dung, $id, $username);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: phanhoi.php");
        exit;
    }

    if ($_POST['action'] === 'traloi' && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        $id = (int)$_POST['phanhoi_id'];
        $admin_tra_loi = trim($_POST['admin_tra_loi']);

        $stmt = $conn->prepare("UPDATE phan_hoi SET admin_tra_loi = ? WHERE id = ?");
        $stmt->bind_param("si", $admin_tra_loi, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: phanhoi.php");
        exit;
    }
}

// Xử lý xóa phản hồi
if (isset($_GET['xoa']) && isset($_SESSION['role']) && $_SESSION['role'] === 'user') {
    $id = (int)$_GET['xoa'];
    $username = $_SESSION['username'];
    $stmt = $conn->prepare("DELETE FROM phan_hoi WHERE id = ? AND username = ?");
    $stmt->bind_param("is", $id, $username);
    $stmt->execute();
    $stmt->close();
    header("Location: phanhoi.php");
    exit;
}

// Xử lý admin xóa câu trả lời
if (isset($_GET['xoatraloi']) && isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $id = (int)$_GET['xoatraloi'];
    $stmt = $conn->prepare("UPDATE phan_hoi SET admin_tra_loi = '' WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: phanhoi.php");
    exit;
}

$result = $conn->query("SELECT * FROM phan_hoi ORDER BY id DESC");
?>

<?php include("header.php"); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phản hồi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-content">

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
        <div class="phanhoi-form-wrapper">
            <form method="POST" class="phanhoi-form">
                <h2>Gửi phản hồi</h2>
                <input type="email" name="email" placeholder="Email của bạn" required>
                <textarea name="noi_dung" placeholder="Nội dung phản hồi" rows="4" required></textarea>
                <input type="hidden" name="action" value="them">
                <button type="submit" class="btn">Gửi phản hồi</button>
            </form>
        </div>
    <?php endif; ?>

    <h2>Phản hồi của mọi người</h2>
    <ul class="phanhoi-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <strong><?= htmlspecialchars($row['username']); ?></strong> (<?= htmlspecialchars($row['email']); ?>)<br>
                <p><?= nl2br(htmlspecialchars($row['noi_dung'])); ?></p>

                <?php if (!empty($row['admin_tra_loi'])): ?>
                    <div class="phanhoi-admin-reply">
                        <strong>Admin</strong><br>
                        <?= nl2br(htmlspecialchars($row['admin_tra_loi'])); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user' && $_SESSION['username'] === $row['username']): ?>
                    <div class="button-group">
                        <a href="#" class="btn" onclick="moFormCapNhat('<?= $row['id']; ?>', '<?= htmlspecialchars(addslashes($row['noi_dung'])); ?>')">Sửa</a>
                        <a href="?xoa=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Xóa phản hồi này?')">Xóa</a>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <div class="button-group">
                        <button type="button" class="btn" onclick="moFormTraLoi('<?= $row['id']; ?>', '<?= htmlspecialchars(addslashes($row['admin_tra_loi'] ?? '')); ?>')">Trả lời lại</button>

                        <?php if (!empty($row['admin_tra_loi'])): ?>
                            <a href="?xoatraloi=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc muốn xóa câu trả lời của admin không?')">Xóa</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>

</div>

<!-- Popup cập nhật user -->
<div id="form-capnhat" class="popup-form">
    <form method="POST">
        <h2>Cập nhật phản hồi</h2>
        <textarea name="noi_dung" rows="4" required></textarea>
        <input type="hidden" name="phanhoi_id" value="">
        <input type="hidden" name="action" value="capnhat">
        <button type="submit" class="btn">Cập nhật</button>
        <button type="button" onclick="dongFormCapNhat()" class="btn btn-delete">Hủy</button>
    </form>
</div>

<!-- Popup trả lời admin -->
<div id="form-traloi" class="popup-form">
    <form method="POST">
        <h2>Trả lời lại phản hồi</h2>
        <textarea name="admin_tra_loi" rows="4" required></textarea>
        <input type="hidden" name="phanhoi_id" value="">
        <input type="hidden" name="action" value="traloi">
        <button type="submit" class="btn">Gửi trả lời</button>
        <button type="button" onclick="dongFormTraLoi()" class="btn btn-delete">Hủy</button>
    </form>
</div>

<script>
function moFormCapNhat(id, noi_dung) {
    document.querySelector('#form-capnhat textarea').value = noi_dung;
    document.querySelector('#form-capnhat input[name=phanhoi_id]').value = id;
    document.getElementById('form-capnhat').style.display = 'flex';
}

function dongFormCapNhat() {
    document.getElementById('form-capnhat').style.display = 'none';
}

function moFormTraLoi(id, noi_dung) {
    document.querySelector('#form-traloi textarea').value = noi_dung;
    document.querySelector('#form-traloi input[name=phanhoi_id]').value = id;
    document.getElementById('form-traloi').style.display = 'flex';
}

function dongFormTraLoi() {
    document.getElementById('form-traloi').style.display = 'none';
}
</script>

</body>
</html>