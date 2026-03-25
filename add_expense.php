<?php
session_start();
include "config.php";

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
    exit;
}

$error = "";
$suc = "";

if (isset($_POST["add"])) {

    $category = trim($_POST["category"]);
    $amount = trim($_POST["amount"]);
    $description = trim($_POST["description"]);
    $date = trim($_POST["date"]);

    if ($category == "" || $amount == "" || $date == "") {
        $error = "Please fill required fields";
    } else {

        $user_id = $_SESSION["user_id"];

        $sql = "INSERT INTO expenses(user_id, category, amount, description, date) 
                VALUES('$user_id', '$category', '$amount', '$description', '$date')";

        if (mysqli_query($conn, $sql)) {
            $suc = "Expense added successfully";
        } else {
            $error = "Failed to add expense";
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
            margin: 0;
            font-family: Arial;
            background: #f3fff6;
            align-items: center;
        }

        .box {
            background: white;
            border: 2px solid #0a8f3c;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            margin-top: 20px;
            margin-left: 550px;
        }

        h2 {
            text-align: center;
            color: #0a8f3c;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #0a8f3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #066b2c;
        }

        .msg {
            text-align: center;
            margin-top: 10px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #0a8f3c;
            text-decoration: none;
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
        .navbar {
            background: #0a8f3c;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logout {
            background: white;
            color: #0a8f3c;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar h2{
            color: white;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <h2>Expense Tracker</h2>
        <a class="logout" href="logout.php">Logout</a>
    </div>

    <div class="box">

        <h2>Add Expense</h2>

        <?php if ($error != "") { ?>
            <div class="msg error"><?php echo $error; ?></div>
        <?php } ?>

        <?php if ($suc != "") { ?>
            <div class="msg success"><?php echo $suc; ?></div>
        <?php } ?>

        <form method="POST" action="">
            <input type="text" name="category" placeholder="Category">
            <input type="number" name="amount" placeholder="Amount">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="date" name="date">

            <button name="add">Add Expense</button>
        </form>
        <div class="row">
            <a class="col-md-6" href="dashboard.php">Back to Dashboard</a>
        <a class="col-md-6" href="view_expense.php">View expense</a>
        </div>

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