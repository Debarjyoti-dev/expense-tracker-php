<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8fff0, #ffffff);
            align-items: center;
            height: 100vh;
        }

        .box {
            background: white;
            border: 2px solid #0a8f3c;
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-top: 20px;
            margin-left: 500px;
        }

        h1 {
            margin-bottom: 10px;
            color: #0a8f3c;
        }

        p {
            margin-bottom: 25px;
            color: #444;
        }

        .btn {
            display: block;            
            padding: 12px;
            margin: 10px 0;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .login {
            background: #0a8f3c;
            color: white;
        }

        .login:hover {
            background: #066b2c;
        }

        .register {
            background: white;
            color: #0a8f3c;
            border: 2px solid #0a8f3c;
        }

        .register:hover {
            background: #e8fff0;
        }
        .footer {
            margin-top: 80px;
        }

        .border p:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }

        .border {
            background-color: #16458c;
            font-size: xx-large;
            text-align: center;
            padding-top: 2%;
        }
        .border p{
            color: white;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>Expense Tracker</h1>
        <p>Manage your income and expenses easily</p>

        <a href="login.php" class="btn login">Login</a>
        <a href="register.php" class="btn register">Register</a>
    </div>
    <div class="footer">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 md-4" id="p">
                    <h4><b>About Us:</b></h4>
                    <p>We believe managing money should be simple, transparent, and stress-free.</p>
                </div>

                <div class="col-lg-4 col-md-6 col-12 md-4" id="q">
                    <h4><b>Contact Us:</b></h4>
                    <p>Email: dasdebarjyoti969@gmail.com</p>
                    <p>Phone: +91 9083046326</p>
                    <p>Address: Memari, West Bengal, India</p>
                </div>

                <div class="col-lg-4 col-md-6 col-12 md-4" id="q">
                    <h4><b>Why Choose Us:</b></h4>
                    <ul>
                        <li>User-Friendly Design</li>
                        <li>Smart Insights</li>
                        <li>Secure & Reliable</li>
                        <li>Goal-Oriented</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="border">
            <p><i class="fas fa-copyright"></i><b>2026 Expense Tracker. All rights reserved</b></p>
        </div>
    </div>

</body>

</html>