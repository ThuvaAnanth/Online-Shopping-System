<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <script>
        function validateForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            if (email == "") {
                alert("Email is required");
                return false;
            }

            if (password == "") {
                alert("Password is required");
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
    session_start();

    $emailerr = $passworderr = "";
    if (isset($_SESSION['email'])) {
        header("location: Home1.php");
        exit();
    } elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'], $_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (isset($email) && isset($password)) {
            $con = new mysqli("localhost", "root", "", "shopping");
            if ($con->connect_error) {
                die("Not connected to the database: " . $con->connect_error);
            }

            $sql = "SELECT email, passwords FROM customer WHERE email='$email' AND passwords='$password'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $_SESSION['email'] = $email;
                header("location: Home1.php");
                exit();
            } else {
                echo '<span class="login-error">User not registered</span>';
            }
        }
    }
    ?>

    <h1>Login</h1>
    <form id="login-form-container" name="loginForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm();">
        <label class="loginform-label">Email</label><br>
        <input type="email" name="email" class="loginform-input" placeholder="abikariyan@gmail.com"> <br>

        <label class="loginform-label">Password</label><br>
        <input type="password" name="password" class="loginform-input" placeholder="123456"> <br>

        <input type="submit" name="submit" value="Login" class="loginform-submit">
    </form>
</body>
</html>
