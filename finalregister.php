<!DOCTYPE html>
<html>
<head>
    <title>mamasregister</title>
    <link rel="stylesheet" type="text/css" href="registerstyle.css">
    <script>
        function validateForm() {
            var errors = "";

            var firstname = document.forms["registerForm"]["firstname"].value;
            var lastname = document.forms["registerForm"]["lastname"].value;
            var email = document.forms["registerForm"]["email"].value;
            var password = document.forms["registerForm"]["password"].value;
            var confirmpassword = document.forms["registerForm"]["confirmpassword"].value;

            if (firstname === "") {
                errors += "First name is required.\n";
            }

            if (lastname === "") {
                errors += "Last name is required.\n";
            }

            if (email === "") {
                errors += "Email is required.\n";
            }

            if (password === "") {
                errors += "Password is required.\n";
            }

            if (password !== "" && confirmpassword !== "" && password !== confirmpassword) {
                errors += "Passwords do not match.\n";
            }

            if (errors !== "") {
                alert(errors);
                return false;
            }
        }
    </script>
</head>
<body>
    <?php
    $nameerr = $nameerr2 = $emailerr = $passworderr = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'], $_POST['confirmpassword'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if (empty($firstname)) {
            $nameerr = "First name is required";
        }

        if (empty($lastname)) {
            $nameerr2 = "Last name is required";
        }

        if (empty($email)) {
            $emailerr = "Email is required";
        }

        if (empty($password)) {
            $passworderr = "Password is required";
        }
    }
    if (empty($nameerr) && empty($nameerr2) && empty($emailerr) && empty($passworderr) && $password === $confirmpassword) {
        $con = new mysqli("localhost", "root", "", "shopping");
        if ($con->connect_error) {
            die("Not connected to the database: " . $con->connect_error);
        }

        $select = "SELECT email FROM customer WHERE email='$email'";
        $show = $con->query($select);

        if ($show->num_rows > 0) {
            echo '<span class="register-error">User already registered</span>';
        } else {
            $sql = "INSERT INTO customer(firstname, lastname, email, passwords) VALUES('$firstname', '$lastname', '$email', '$password')";
            if ($con->query($sql)) {
                echo "Registered successfully";
                $_SESSION['email'] = $email;
                header("location:finallogin.php");
                exit();
            } else {
                echo "Error during registration: " . $con->error;
            }
        }
    }
    ?>

    <h1>REGISTER HERE</h1>
    <form id="register-form-container" name="registerForm" onsubmit="return validateForm()" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label>First name</label><br>
        <input type="text" name="firstname" class="register-form-input"> <br>
        <span class="register-error"><?php echo $nameerr; ?></span><br>

        <label>Last name</label><br>
        <input type="text" name="lastname" class="register-form-input"> <br>
        <span class="register-error"><?php echo $nameerr2; ?></span><br>

        <label>Email</label><br>
        <input type="email" name="email" class="register-form-input"> <br>
        <span class="register-error"><?php echo $emailerr; ?></span><br>

        <label>Password</label><br>
        <input type="password" name="password" class="register-form-input"> <br>
        <span class="register-error"><?php echo $passworderr; ?></span><br>

        <label>Confirm password</label><br>
        <input type="password" name="confirmpassword" class="register-form-input"> <br>

        <input type="submit" name="register" value="Register" class="register-form-submit"> 
    </form>
</body>
</html>
