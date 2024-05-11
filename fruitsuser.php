<?php
session_start();
if (!$_SESSION['email']){
    header("location:finallogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
        body {
            background-image: url(https://www.google.com/url?sa=i&url=https%3A%2F%2Funsplash.com%2Fbackgrounds&psig=AOvVaw1_NX7r7zzu8Ot6z6SaouIJ&ust=1686474245563000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCICy76SsuP8CFQAAAAAdAAAAABAE);
            background-size: cover;
        }

        header {
            background-color: #333;
            padding: 20px;
            text-align: center;
            color: white;
            margin-bottom: 100px;
            animation: slideInDown 1s ease;
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        footer {
            background-color: #333;
            padding: 20px;
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            animation: slideInUp 1s ease;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .product-container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .product-card {
            width: 20vw;
            height: 50vh;
            border: 1px solid black;
            margin: 20px;
        }

        .product-image {
            width: 20vw;
            height: 40vh;
            transition: 5s;
        }

        .product-image-container {
            overflow: hidden;
        }

        .product-image:hover {
            transform: scale(1.4);
            transition-duration: 1.6s;
        }

        .product-text {
            text-align: center;
            color: black;
            font-weight: bolder;
        }
        
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        
        .button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        
        .button:hover {
            background-color: #45a049;
        }

        nav {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
            font-size: 18px;
        }

        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="animated-text">Fruits</h1>
        <nav>
            <a href="snacksuser.php">Snacks</a>
            <a href="beveragesuser.php">Beverages</a>
            <a href="fruitsuser.php">Fruits</a>
            <a href="dessertsuser.php">Desserts</a>
            <a href="home1.php">home</a>
        </nav>
    </header>

    <?php
    $con = new mysqli("localhost", "root", "", "shopping");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM fruits";
    $result = $con->query($sql);

    echo "<div class='product-container'>";

    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-card'>";
        echo "<div class='product-image-container'>";
        echo "<img class='product-image' src='data:image/jpeg;base64," . base64_encode($row['IMAGE']) . "' alt='Product Image'>";
        echo "</div>";
        echo "<div class='product-text'>" . $row['PRONAME'] . "<br>Price: " . $row['PRICE'] . "</div>";
        echo "<div class='button-container'>";
        echo "<button class='button'>Add to Cart</button>";
        echo "</div>";
        echo "</div>";
    }

    echo "</div>";

    $con->close();
    ?>

    <footer>
        &copy; 2023 manisangalada neegal. All rights reserved.
    </footer>
</body>
</html>
