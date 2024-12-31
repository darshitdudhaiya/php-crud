<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

include("db.php");

$id = $_GET['id'];
$selectQuery = "SELECT * FROM student where id = $id";
$student =  mysqli_query($connection, $selectQuery);
$studentData = mysqli_fetch_assoc($student);

if (isset($_POST['edit'])) {
    $rollno = $_POST["rollno"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $insetQuery = "update student set email = '$email', name = '$name', rollno = $rollno WHERE id = $id";
    $result = mysqli_query($connection, $insetQuery);
    if ($result) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <form method="post">
        <label for="rollno">Rollno</label>
        <input type="text" name="rollno" value="<?= $studentData["rollno"] ?>"><br><br>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $studentData["name"] ?>"><br><br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $studentData["email"] ?>"><br><br>
        <button type="submit" name="edit">Edit</button>
    </form>
</body>

</html>