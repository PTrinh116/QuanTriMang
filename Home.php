<?php

$conn = mysqli_connect(
    'db', # service name
    'php_docker', # username
    'password', # password
    'php_docker' # db table
);

$table_name = "foods";

if ($conn->connect_error){
    die('Database error'. $conn->connect_error);
}

// Truy vấn lấy dữ liệu từ database (ví dụ, tên bảng là "foods")
$sql = "SELECT * FROM foods";
$result = $conn->query($sql);

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

        .image {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
        }

        img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .image-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .black-bar {
            display: flex;
            align-items: center;
            width: 100%;
            height: 70px;
            background-color: black;
            padding: 0 20px;
        }
        .image-overlay p:first-child {
            font-size: 100px;
            font-weight: bold;
            font-family: 'Brush Script MT', cursive;
            margin-bottom: 20px;
        }

        .food-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .food-card {
            margin: 10px;
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            width: calc(40% - 20px); /* 50% width with margins included */
            box-sizing: border-box;
        }

        .food-card img {
            width: 100%;
            height: 80%; /* Đặt chiều cao tùy ý */
            object-fit: cover;
            margin-bottom: 10px;
        }

        .food-card h3 {
            cursor: pointer;
            color: #007bff;
        }
    </style>
    <title>My Blog</title>
</head>
<body>
    <div class="image">
        <img src="https://kenh14cdn.com/thumb_w/660/2019/6/10/6-15601281150941626413269.jpg">
        
        <div class="image-overlay">
            <p>My Blog</p>
            <p style="font-size: 20px;">A place to synthesize and share delicious recipes for everyone</p>
        </div>
    </div>
    <div class="black-bar">
        <a href="Home.php" style="color: white;margin-right: 30px " class="<?php echo basename($_SERVER['PHP_SELF']) == 'Home.php' ? 'current-page' : ''; ?>">Home</a>
        <a href="admin.php" style="color: white; float: left;">Admin</a>
    </div>


    <div class="food-container">
        <?php
        // Hiển thị dữ liệu món ăn từ database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="food-card">';
                echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
                echo '<h3 onclick="openRecipe(\'' . $row["title"] . '\')">' . $row["title"] . '</h3>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <script>
        function openRecipe(title) {
            // Thay đổi đường dẫn tùy thuộc vào cách bạn quản lý trang web chi tiết món ăn
            window.location.href = 'food.php?title=' + encodeURIComponent(title);
        }
    </script>
</body>
</html>

