<?php
session_start();
include "config.php";

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
    exit;
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM expenses WHERE user_id='$user_id' ORDER BY date DESC";
$result = mysqli_query($conn, $sql);

$total_sql = "SELECT SUM(amount) as total FROM expenses WHERE user_id='$user_id'";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total = $total_row["total"] ?? 0;
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
        }

        .container {
            padding: 20px;
        }

        h2 {
            color: #0a8f3c;
            text-align: center;
        }

        .total-box {
            background: white;
            border: 2px solid #0a8f3c;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #0a8f3c;
            color: white;
        }

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }

        .delete {
            background: red;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #0a8f3c;
            font-weight: bold;
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

    <div class="container">

        <h2>Your Expenses</h2>

        <div class="total-box">
            Total Expense: ₹<?php echo $total; ?>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                        <a class="btn delete" href="delete_expense.php?id=<?php echo $row["id"]; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>

        </table>

        <a class="back" href="dashboard.php">Back to Dashboard</a>

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