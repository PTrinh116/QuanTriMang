
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .black-bar {
            display: flex;
            align-items: center;
            width: 100%;
            height: 70px;
            background-color: black;
            padding: 0 20px;
        }
    </style>
    <title>Admin Manage</title>
</head>
<body>
    <div class="black-bar">
        <a href="Home.php" style="color: white;margin-right: 30px " >Home</a>
        <a href="admin.php" style="color: white; float: left;">Admin</a>
    </div>
    <div class="manage-container">
        <h2>ADD FOOD</h2>
        <form action="add_food.php" method="post">
            <input type="text" name="food_title" placeholder="Food Title" required>
            <input type="text" name="food_image_url" placeholder="Food Image URL" required>
            <button type="submit">Add Food</button>
        </form>
    </div>
</body>
</html>
