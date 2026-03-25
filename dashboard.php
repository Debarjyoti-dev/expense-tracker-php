<?php
session_start();
include "config.php";

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT SUM(amount) as total FROM expenses WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$total = $row["total"] ?? 0;

$recent_sql = "SELECT * FROM expenses WHERE user_id='$user_id' ORDER BY date DESC LIMIT 5";
$recent_result = mysqli_query($conn, $recent_sql);
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
            font-family: Arial, sans-serif;
            background: #f3fff6;
        }

        .navbar {
            background: #0a8f3c;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            padding: 25px;
        }

        .card {
            background: white;
            border: 2px solid #0a8f3c;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin-right: 10px;
            margin-top: 10px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-green {
            background: #0a8f3c;
            color: white;
        }

        .btn-outline {
            background: white;
            color: #0a8f3c;
            border: 2px solid #0a8f3c;
        }

        .logout {
            background: white;
            color: #0a8f3c;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #0a8f3c;
            color: white;
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

    <div class="navbar">
        <h2>Expense Tracker Dashboard</h2>
        <a class="logout" href="logout.php">Logout</a>
    </div>

    <div class="container">

        <div class="card">
            <h3>Welcome</h3>
            <p><?php echo $_SESSION["name"]; ?></p>
        </div>

        <div class="card">
            <h3>Quick Actions</h3>
            <a class="btn btn-green" href="add_expense.php">Add Expense</a>
            <a class="btn btn-outline" href="view_expense.php">View Expenses</a>
        </div>

        <div class="card">
            <h3>Summary</h3>
            <h2>Total Expense: ₹<?php echo $total; ?></h2>
        </div>

        <div class="card">
            <h3>Recent Expenses</h3>

            <table>
                <tr>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($recent_result)) { ?>
                    <tr>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                    </tr>
                <?php } ?>

            </table>

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