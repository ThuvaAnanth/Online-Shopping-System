<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $image = file_get_contents($_FILES['image']['tmp_name']);

    $con = new mysqli("localhost", "root", "", "shopping");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $stmt = $con->prepare("UPDATE snacks SET PRONAME=?, PRICE=?, IMAGE=? WHERE PROID=?");
    $stmt->bind_param("ssss", $name, $price, $image, $id);

    if ($stmt->execute()) {
        echo "<div class='success-message'>Update successful</div>";
    } else {
        echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $con->close();
}

$id = '';
$name = '';
$price = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $con = new mysqli("localhost", "root", "", "shopping");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $stmt = $con->prepare("SELECT * FROM snacks WHERE PROID=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['PRONAME'];
        $price = $row['PRICE'];
    }

    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #4CAF55;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 400px;
            margin: 0 auto;
        }

        input[type="text"], input[type="file"], input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .success-message, .error-message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .success-message {
            background-color: #DFF2BF;
            color: #4F8A10;
        }

        .error-message {
            background-color: #FFBABA;
            color: #D8000C;
        }
    </style>
</head>
<body>
    <h1>Product Management - Update Snacks</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        if (empty($_FILES['image']['tmp_name'])) {
            echo "<div class='error-message'>Please select an image</div>";
        } else {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];

            $image = file_get_contents($_FILES['image']['tmp_name']);

            $con = new mysqli("localhost", "root", "", "shopping");

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $stmt = $con->prepare("UPDATE snacks SET PRONAME=?, PRICE=?, IMAGE=? WHERE PROID=?");
            $stmt->bind_param("ssss", $name, $price, $image, $id);

            if ($stmt->execute()) {
                echo "<div class='success-message'>Update successful</div>";
            } else {
                echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
            $con->close();
        }
    }
    ?>

    <form method="post" action="snacksupdate.php" enctype="multipart/form-data">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" value="<?php echo $id; ?>" readonly>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">

        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>">

        <label for="image">Image:</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
