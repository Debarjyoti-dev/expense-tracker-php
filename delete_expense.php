<?php
session_start();
include "config.php";

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
    exit;
}

if (!isset($_GET["id"])) {
    header("location:view_expense.php");
    exit;
}

$user_id = $_SESSION["user_id"];
$id = $_GET["id"];

$sql = "SELECT * FROM expenses WHERE id='$id' AND user_id='$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    header("location:view_expense.php");
    exit;
}

$delete_sql = "DELETE FROM expenses WHERE id='$id' AND user_id='$user_id'";
mysqli_query($conn, $delete_sql);

header("location:view_expense.php");
exit;
?>