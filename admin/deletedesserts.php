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
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $con = new mysqli("localhost", "root", "", "shopping");
    if ($con->connect_error) {
        die("Error: " . $con->connect_error);
    }

    $sql = "DELETE FROM desserts WHERE PROID='$id'";
    if ($con->query($sql)) {
        echo "Deletion successful";
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();
    header("location: desserts.php");
}
?>
</body>
</html>
