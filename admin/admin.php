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
            animation: backgroundAnimation 10s ease-in-out infinite;
        }
        @keyframes backgroundAnimation {
            0% { background-image:url(b4.jpg); }
            50% { background-image:url(b2.jpg); }
            100% { background-image:url(b5.jpg);}
        }
        
        h1 {
            text-align: center;
            background-color: aquamarine;
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
            background: #496281;
        }

        .main-content {
            margin-left: 200px;
            padding: 20px;
            background: #3d5c5a;
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
            color: #1ea099;
            font-size: 22px;
        }

        .nav-toggle-label span {
            display: block;
            width: 25px;
            height: 3px;
            background: #317d91;
            margin-bottom: 5px;
            transition: transform 0.3s ease-in-out;
        }

        .nav-toggle:checked + .nav-toggle-label span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .nav-toggle:checked + .nav-toggle-label span:nth-child(2) {
            opacity: 0;
        }

        .nav-toggle:checked + .nav-toggle-label span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
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

        .category-link {
            display: inline-block;
            margin: 10px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #333;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease-in-out;
        }

        .category-link:hover {
            background-color: #eee;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="admin.php">Home</a></li>
            <li><a href="adminlogout.php">Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Category</h1>

        <div class="category-links">
            <a href="fruits.php" class="category-link">Fruits</a>
            <a href="snacks.php" class="category-link">Snacks</a>
            <a href="beverages.php" class="category-link">Beverages</a>
            <a href="desserts.php" class="category-link">Desserts</a>
        </div>
    </div>

    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <label for="nav-toggle" class="nav-toggle-label">
        <span></span>
        <span></span>
        <span></span>
    </label>
</body>
</html>
