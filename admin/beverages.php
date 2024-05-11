<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #4FCA44;
            
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td.actions {
            white-space: nowrap;
        }

        .edit-btn, .delete-btn {
            display: inline-block;
            padding: 6px 12px;
            margin-right: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #f44336;
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

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 200px;
            background: #333;
            color: #fff;
            transition: all 0.3s ease-in;
            z-index: 999;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #777;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar ul li:hover {
            background: #4FCA44;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
            background: #fff;
            color: #333;
        }

        .nav-toggle {
            display: none;
        }

        .nav-toggle-label {
            position: absolute;
            top: 0;
            left: 0;
            margin-left: 15px;
            margin-top: 10px;
            cursor: pointer;
            color: #fff;
            font-size: 22px;
        }

        .nav-toggle-label span {
            display: block;
            width: 25px;
            height: 3px;
            background: #fff;
            margin-bottom: 5px;
        }

        @media (max-width: 767px) {
            .sidebar {
                width: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .nav-toggle-label {
                display: block;
            }
        }
    </style>

    <script>
        var message = "";
        var isSuccess = "";

        function confirmDelete(productName, productId) {
            if (confirm("Are you sure you want to delete the product: " + productName + "?")) {
                window.location.href = "deletebeverages.php?id=" + productId;
            }
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="adminlogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Admin Page</h1>

        <?php
        $ProductName = '';
        $Price = '';
        $message = '';
        $isSuccess = '';
        $con = new mysqli("localhost", "root", "", "shopping");
        if ($con->connect_error) {
            die("Error: " . $con->connect_error);
        }

        $sql = "SELECT * FROM beverages";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Product Name</th><th>Price</th><th>Actions</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['PROID'] . "</td>";
                echo "<td>" . $row['PRONAME'] . "</td>";
                echo "<td>" . $row['PRICE'] . "</td>";
                echo "<td class='actions'>";
                echo "<a class='edit-btn' href='beveragesupdate.php?id=" . $row['PROID'] . "'>Edit</a>";
                echo "<a class='delete-btn' onclick='confirmDelete(\"" . $row['PRONAME'] . "\", " . $row['PROID'] . ")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";

        } else {
            echo "<p>No products found.</p>";
        }

        $con->close();
        ?>

        <div id="messageContainer"></div>

        <script>
            // Display success or error messages
            function showMessage(message, isSuccess) {
                var messageContainer = document.getElementById("messageContainer");
                var className = isSuccess ? "success-message" : "error-message";
                var messageElement = document.createElement("div");
                messageElement.className = className;
                messageElement.innerText = message;
                messageContainer.appendChild(messageElement);
                setTimeout(function() {
                    messageContainer.removeChild(messageElement);
                }, 3000);
            }

            // Check if a message is passed in the URL and display it
            var urlParams = new URLSearchParams(window.location.search);
            message = urlParams.get("message");
            isSuccess = urlParams.get("success");
            if (message) {
                showMessage(message, isSuccess === "true");
                history.replaceState(null, null, window.location.pathname); // remove the message from URL
            }
        </script>
    </div>

    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <label for="nav-toggle" class="nav-toggle-label">
        <span></span>
        <span></span>
        <span></span>
    </label>

    <script>
        var navToggle = document.querySelector('.nav-toggle');
        var sidebar = document.querySelector('.sidebar');

        navToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-open');
        });
    </script>
</body>
</html>
