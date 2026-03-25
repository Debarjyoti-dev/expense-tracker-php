<?php
include "config.php";

$error = "";
$suc = "";

if(isset($_POST["register"])){
    if (isset($_POST["register"])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!isset($_POST["check"])) {
        $error = "You must agree to the terms!";
    } elseif ($name == "" || $email == "" || $password == "") {
        $error = "Please fill all fields properly";
    } else {

        $sql = "SELECT id FROM users WHERE email='$email'";
        $ret = mysqli_query($conn, $sql);

        if (mysqli_num_rows($ret) > 0) {
            $error = "Email already exists";
        } else {

            $sql = "INSERT INTO users(name, email, password) 
                    VALUES('$name', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                $suc = "Registered successfully";
                header("Location: login.php");
                exit;
            } else {
                $error = "Registration failed";
            }
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register_page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, rgb(8, 229, 159), white, rgb(208, 208, 216));
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 10vh;
        }
        .box {
            background-color: white;
            padding: 20px;
            width: 400px;
            border: 3px solid green;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 20px;
            margin-left: 550px;
            border-radius: 12px;
        }
        h1{
           text-align: center;
           margin-top: 80px;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top: 80px;
        }

        .x {
            width: 80px;
            height: auto;
            max-width: 100%;
        }

        .card {
            border-radius: 10%;
        }

        .card h3,
        p {
            text-align: center;
            padding-left: 14px;
            padding-right: 14px;
        }

        #j {
            border-radius: 20%;
            color: black;
            width: 100%;
            max-width: 300px;
            font-size: larger;
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
            color: aliceblue;
            font-size: xx-large;
            text-align: center;
            padding-top: 2%;
        }
    </style>
</head>

<body>
<h1>Expense Tracker</h1>
    <div class="box">
        <h2>Create an Account</h2>
        <p>Register to start learning with us.</p>
        <?php if ($error != "") { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

        <form method="POST" action="">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input name="name" type="text" class="form-control" placeholder="Name" required>
                    </div>

                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="input-group mt-2">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>

                    <div class="input-group mt-2">
                        <div class="form-check">
                            <input name="check" type="checkbox">
                            I agree to the
                        </div>
                        <a href="#">Terms of service</a>
                    </div>

                    <button name="register" id="j" class="button btn-outline-warning mt-4" type="submit">
                        Register Now
                    </button>

                    <div class="input-group mt-2">
                        <p>Already have an account? <a href="login.html">Login</a></p>
                    </div>
                </form>
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