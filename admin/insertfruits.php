<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['sub'], $_GET['name'], $_GET['id'], $_GET['price'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];

    $conn = mysqli_connect("localhost", "root", "", "shopping");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO fruits (PROID, PRONAME, PRICE) VALUES ('$id', '$name', '$price')";

    if($conn->query($sql)){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id">

    <label for="name">Name:</label>
    <input type="text" name="name" id="name">

    <label for="price">Price:</label>
    <input type="text" name="price" id="price">

    <input type="submit" name="sub" value="Submit">
</form>
</body>
</html>
