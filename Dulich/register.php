<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-wrapperr">
    <form method="POST" action="xulydangky.php" class="register-form">
        <h2>Đăng ký</h2>
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Đăng ký</button>
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </form>
</div>

</body>
</html>