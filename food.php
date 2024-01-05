<?php
$conn = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "foods";

if ($conn->connect_error) {
    die('Database error'. $conn->connect_error);
}

// Lấy thông tin chi tiết về món ăn dựa trên tên món ăn được truyền từ trang chính
if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $sql = "SELECT * FROM foods WHERE title = '$title'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $foodTitle = $row['title'];
        $foodImage = $row['image_url'];
    } else {
        // Redirect hoặc xử lý khi không tìm thấy món ăn
        header("Location: error_page.php");
        exit();
    }
} else {
    // Redirect hoặc xử lý khi không có tham số title
    header("Location: error_page.php");
    exit();
}

$conn->close();
?>

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

        .food-detail {
            margin: 20px;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .food-detail img {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-bottom: 10px;
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
    <title><?php echo $foodTitle; ?></title>
</head>
<body>
    <div class="black-bar">
        <a href="Home.php" style="color: white;margin-right: 30px ">Home</a>
        <a href="admin.php" style="color: white; float: left;">Admin</a>
    </div>
    <div class="food-detail">
        <img src="<?php echo $foodImage; ?>" alt="<?php echo $foodTitle; ?>">
        <h1><?php echo $foodTitle; ?></h1>
        <!-- Thêm các thông tin khác về món ăn nếu cần -->
    </div>
</body>
</html>
