<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapperr">
    <form method="POST" action="xulydangnhap.php" class="login-form">
        <h2>Đăng nhập</h2>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button type="submit">Đăng nhập</button>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </form>
</div>

</body>
</html>