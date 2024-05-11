<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
if(isset($_SESSION['email'])){

session_destroy();
header("location:../home.php");
}
?>

</body>
</html>