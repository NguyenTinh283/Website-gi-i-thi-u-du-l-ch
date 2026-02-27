<?php
session_start();
include("config.php");
include("header.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Hiển thị giao diện sau khi đăng ký thành công
        ?>
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <title>Đăng ký thành công</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="success-box">
                <h2>Đã đăng ký thành công!</h2>
                <button onclick="window.location.href='login.php'">Đăng nhập ngay</button>
            </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        $stmt->close();
        $conn->close();
        header("Location: register.php?error=tontai");
        exit;
    }
}
?>