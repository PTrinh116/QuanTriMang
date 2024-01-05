<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            margin: 100px auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .black-bar {
            display: flex;
            align-items: center;
            width: 100%;
            height: 70px;
            background-color: black;
            padding: 0 20px;
        }
    </style>
    <title>Đăng Nhập Admin</title>
</head>
<body>
    <div class="black-bar">
        <a href="Home.php" style="color: white;margin-right: 30px " >Home</a>
        <a href="admin.php" style="color: white; float: left;"class="<?php echo basename($_SERVER['PHP_SELF']) == 'Home.php' ? 'current-page' : ''; ?>">Admin</a>
    </div>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form action="login_process.php" method="post">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>




