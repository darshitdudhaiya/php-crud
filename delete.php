<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include("db.php");

$id = $_GET['id'];

$delete = "delete from student where id = $id";
$deleteData = mysqli_query($connection, $delete);
if ($deleteData) {
    header("Location: index.php");
} else {
    echo "<script>alert('Something went wrong');</script>";
}
