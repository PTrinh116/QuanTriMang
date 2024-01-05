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

if (isset($_POST['food_title']) && isset($_POST['food_image_url'])) {
    $food_title = $_POST['food_title'];
    $food_image_url = $_POST['food_image_url'];

    // Thêm dữ liệu vào bảng foods
    $sql = "INSERT INTO foods (title, image_url) VALUES ('$food_title', '$food_image_url')";
    $conn->query($sql);

    $conn->close();
    // Chuyển hướng về trang quản lý món ăn sau khi thêm
    header("Location: admin_manage.php");
    exit();
}
?>