<?php
session_start();
include("config.php");
include("header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        hienThongBao("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu!");
        exit;
    }

    // ✅ Truy vấn thêm trường email
    $stmt = $conn->prepare("SELECT username, password, role, email FROM users WHERE username = ?");
    if (!$stmt) {
        die("Lỗi truy vấn: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email']; // ✅ Gán email vào session

            if ($user['role'] === 'admin') {
                header("Location: admin.php");
                exit;
            } elseif ($user['role'] === 'user') {
                header("Location: user.php");
                exit;
            } else {
                hienThongBao("Không xác định được quyền của tài khoản!");
                exit;
            }
        } else {
            hienThongBao("Sai mật khẩu!");
            exit;
        }
    } else {
        hienThongBao("Tài khoản không tồn tại!");
        exit;
    }

    $stmt->close();
}

$conn->close();

// Hàm hiển thị thông báo và nút quay lại
function hienThongBao($thongbao) {
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Thông báo đăng nhập</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="error-box">
            <h2><?php echo htmlspecialchars($thongbao); ?></h2>
            <button onclick="window.location.href='login.php'">Quay lại đăng nhập</button>
        </div>
    </body>
    </html>
    <?php
}
?>