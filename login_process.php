<?php
$conn = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

if ($conn->connect_error) {
    die('Database error'. $conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Lấy thông tin từ form đăng nhập
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    // Truy vấn SQL để kiểm tra tên đăng nhập trong bảng user
    $check_username_query = "SELECT * FROM user WHERE username='$entered_username'";
    $check_username_result = $conn->query($check_username_query);

    if ($check_username_result->num_rows > 0) {
        // Tên đăng nhập đã tồn tại, kiểm tra mật khẩu
        $row = $check_username_result->fetch_assoc();
        $stored_password = $row['password'];

        if ($entered_password === $stored_password) {
            // Mật khẩu khớp, đăng nhập thành công, chuyển hướng đến trang quản lý món ăn
            header("Location: admin_manage.php");
            exit();
        } else {
            // Mật khẩu không khớp, hiển thị thông báo lỗi và không thực hiện đăng nhập
            echo "Invalid password!";
        }
    } else {
        // Tên đăng nhập chưa tồn tại, thêm tài khoản mới
        $add_user_query = "INSERT INTO user (username, password) VALUES ('$entered_username', '$entered_password')";
        if ($conn->query($add_user_query)) {
            // Thêm tài khoản thành công, đăng nhập và chuyển hướng đến trang quản lý món ăn
            header("Location: admin_manage.php");
            exit();
        } else {
            // Lỗi khi thêm tài khoản mới
            echo "Error adding user: " . $conn->error;
        }
    }
}

$conn->close();
?>