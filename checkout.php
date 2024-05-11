<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $errors = [];
    $requiredFields = ['name', 'email', 'address', 'Phone_number', ];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The $field field is required.";
        }
    }

    
    if (empty($errors)) {
      
        echo "<h2>Payment Successful!</h2>";
        echo "<b><h5>Thank you for your order. It will be delivered to the  address.<b></h5";
    } else {
        
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mama's Online Grocery Shopping - Checkout</title>
    <style>
       
      .img{ background-image: url('');"
  background-repeat: no-repeat;
  background-size: cover;
      }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;

        }

        h1 {
            color:purple;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 1px;
            color:black;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 30%;
            padding: 10px;
            font-size: 16px;
            border-radius: 2px;
            border: 1px solid #ccc;
        }

        .button {
            background-color:black;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: blue;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1><I>Mama Online Grocery Shopping - Checkout</I></h1>
    
   <body class="img";>
    
   <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="name">First Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="name">last Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>
        </div>

        <div class="form-group">
            <label for="Phone Number">Phone Number:</label>
            <input type="text" name="Phone_number" id="Phone_Number" required>
        </div>

        <div class="form-group">
            <label for="Amount">Amount:</label>
            <input type="text" name="Amount" id="amount" required>
        </div>
        
        <input type="submit" value="pay Now" class="button">
    </form>
</body>
</html>