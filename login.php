<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST["login"])) {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email == "" || $password == "") {
        $error = "Properly fill your details";
    } else {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $ret = mysqli_query($conn, $sql);

        if (mysqli_num_rows($ret) == 0) {
            $error = "Email is not registered";
        } else {

            $row = mysqli_fetch_assoc($ret);

            if ($password != $row["password"]) {
                $error = "Incorrect password";
            } else {

                $_SESSION["user_id"] = $row["id"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["name"]=$row["name"];

                header("location:dashboard.php");
                exit;
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
    <title>Login_page</title>
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
       
        p {
            text-align: center;
            padding-left: 42px;
        }

        #j {
            border-radius: 12px;
            padding: 12px;
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
        <h2>Login</h2>
        <p>Welcome back! Please login to your account</p>
        <?php if ($error != "") { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

        <form method="post" action="">
            <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
            <input class="form-control mt-2" type="password" name="password" placeholder="Password">
            <div class="form-check">
                <input type="checkbox" name="check"> Remember me
            </div>
        </div>
        <button name="login" id="j" class="button btn-outline-warning mt-2" type="submit">
                            Login
                        </button>
                        <div class="input-group mt-2">
                            <p>Don't have an account? <a href="regester.php">Register Now</a></p>
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